<?php

namespace net\mydeacy\serverdocument\util\elements;

use net\mydeacy\serverdocument\util\elements\interfaces\Directory;
use net\mydeacy\serverdocument\util\elements\interfaces\TextFile;

class FileElement extends ElementBase implements TextFile {

	/**
	 * @var string
	 */
	private $content;

	/**
	 * FileElement constructor.
	 *
	 * @param string $title
	 * @param string $content
	 * @param Directory|null $directory
	 */
	public function __construct(string $title, string $content, ?Directory $directory) {
		parent::__construct($title, self::BUTTON_IMAGE, $directory);
		$this->content = $content;
	}

	/**
	 * @inheritDoc
	 */
	function getContent() :string {
		return $this->content;
	}
}