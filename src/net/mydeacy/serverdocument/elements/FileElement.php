<?php

namespace net\mydeacy\serverdocument\elements;

use net\mydeacy\serverdocument\elements\interfaces\Directory;
use net\mydeacy\serverdocument\elements\interfaces\TextFile;

class FileElement extends ElementBase implements TextFile {

	/**
	 * @var string
	 */
	private string $content;

	public function __construct(string $title, string $content, ?Directory $directory) {
		parent::__construct($title, self::BUTTON_IMAGE, $directory);
		$this->content = $content;
	}

	function getContent() :string {
		return $this->content;
	}
}