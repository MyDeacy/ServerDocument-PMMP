<?php

namespace net\mydeacy\serverdocument\util\elements;

use net\mydeacy\serverdocument\util\elements\interfaces\Directory;

class DirectoryElement extends ElementBase implements Directory {

	/**
	 * DirectoryElement constructor.
	 *
	 * @param string $title
	 * @param Directory|null $directory
	 */
	public function __construct(string $title, ?Directory $directory) {
		parent::__construct($title, self::BUTTON_IMAGE, $directory);
	}
}