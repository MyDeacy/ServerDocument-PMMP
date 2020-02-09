<?php

namespace net\mydeacy\serverdocument\util;

use net\mydeacy\serverdocument\util\elements\DirectoryElement;
use net\mydeacy\serverdocument\util\elements\FileElement;
use net\mydeacy\serverdocument\util\elements\interfaces\Directory;
use net\mydeacy\serverdocument\util\elements\interfaces\Element;
use net\mydeacy\serverdocument\util\elements\interfaces\TextFile;

class ElementManagerImpl implements ElementManager {

	/**
	 * @var Element[]
	 */
	private $elements = [];

	/**
	 * ElementManagerImpl constructor.
	 *
	 * @param string $baseDir
	 */
	public function __construct(string $baseDir) {
		if (!file_exists($baseDir)) {
			mkdir($baseDir, 0744, true);
		}
		$this->loadElements(null, $baseDir);
		arsort($this->elements);
		uasort($this->elements, function($a, $b) {
			return $a instanceof Directory && $b instanceof TextFile ? -1 : 1;
		});
	}

	/**
	 * @inheritDoc
	 */
	public function getFilesByDirectory(?Directory $directory) :array {
		$list = [];
		foreach ($this->elements as $element) {
			if ($element->getDirectory() === $directory) {
				$list[] = $element;
			}
		}
		return $list;
	}

	/**
	 * @param Directory|null $directory
	 */
	private function loadElements(?Directory $directory, string $dir) :void {
		if (!isset($directory)) {
			$this->elements = [];
		}
		$dir .= (isset($directory) ? $directory->getTitle() . "/" : "/");
		$files = scandir($dir);
		foreach ($files as $fileName) {
			if ($fileName === "." || $fileName === "..") {
				continue;
			}
			$fullPath = $dir . $fileName;
			if (is_file($fullPath) && pathinfo($fullPath)["extension"] ?? "" === "txt") {
				$content = preg_replace('/(\r\n|\r|\n)/s', "\n", file_get_contents($fullPath));
				$this->elements[] = new FileElement(pathinfo($fullPath)["filename"], $content, $directory);
			} elseif (is_dir($fullPath)) {
				$directoryElement = new DirectoryElement($fileName, $directory);
				$this->elements[] = $directoryElement;
				$this->loadElements($directoryElement, $dir);
			}
		}
	}
}