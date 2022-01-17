<?php

namespace net\mydeacy\serverdocument\elements;

use net\mydeacy\serverdocument\elements\interfaces\Directory;

class DirectoryElement extends ElementBase implements Directory {

	public function __construct(string $title, ?Directory $directory) {
		parent::__construct($title, self::BUTTON_IMAGE, $directory);
	}
}