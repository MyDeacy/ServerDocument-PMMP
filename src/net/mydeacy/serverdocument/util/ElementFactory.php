<?php

namespace net\mydeacy\serverdocument\util;

use net\mydeacy\serverdocument\elements\CommandElement;
use net\mydeacy\serverdocument\elements\DirectoryElement;
use net\mydeacy\serverdocument\elements\FileElement;
use net\mydeacy\serverdocument\elements\interfaces\Directory;
use net\mydeacy\serverdocument\elements\interfaces\Element;
use pocketmine\utils\Config;

class ElementFactory {

	public function createElement(string $fileName, string $dir, ?Directory $directory) :?Element {
		$element = null;
		$fullPath = $dir . $fileName;
		if (is_file($fullPath)) {
			switch (pathinfo($fullPath)["extension"] ?? "") {
				case "txt":
					$content = preg_replace('/(\r\n|\r|\n)/s', "\n", file_get_contents($fullPath));
					$element = new FileElement(pathinfo($fullPath)["filename"], $content, $directory);
					break;
				case "yml":
					$element = $this->createByYaml($fullPath, $directory);
					break;
			}
		} elseif (is_dir($fullPath)) {
			$element = new DirectoryElement($fileName, $directory);
		}
		return $element;
	}

	private function createByYaml(string $fullPath, ?Directory $directory) :Element {
		$config = new Config($fullPath, CONFIG::YAML);
		switch ($config->get("type", "")) {
			case "command":
				$command = $config->get("cmd-body", "");
				$element = new CommandElement(pathinfo($fullPath)["filename"], $command, $directory);
				break;
			default:
				$element = null;
		}
		return $element;
	}
}