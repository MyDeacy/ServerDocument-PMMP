<?php

namespace net\mydeacy\serverdocument\util;

use net\mydeacy\serverdocument\elements\interfaces\Directory;
use net\mydeacy\serverdocument\elements\interfaces\Element;

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
		$this->loadElements(null, $baseDir, new ElementFactoryImpl());
		arsort($this->elements);
		uasort($this->elements, function($a, $b) {
			return $a instanceof Directory && !$b instanceof Directory ? -1 : 1;
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
	 * @param string $dir
	 * @param ElementFactory $factory
	 */
	private function loadElements(?Directory $directory, string $dir, ElementFactory $factory) :void {
		if (!isset($directory)) {
			$this->elements = [];
		}
		$dir .= (isset($directory) ? $directory->getTitle() . "/" : "/");
		$files = scandir($dir);
		foreach ($files as $fileName) {
			if ($fileName === "." || $fileName === "..") {
				continue;
			}
			$element = $factory->createElement($fileName, $dir, $directory);
			if ($element === null) {
				continue;
			}
			$this->elements[] = $element;
			if ($element instanceof Directory) {
				$this->loadElements($element, $dir, $factory);
			}
		}
	}
}