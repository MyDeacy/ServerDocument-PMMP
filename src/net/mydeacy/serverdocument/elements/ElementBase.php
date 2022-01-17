<?php

namespace net\mydeacy\serverdocument\elements;

use net\mydeacy\serverdocument\elements\interfaces\Directory;

abstract class ElementBase {

	/**
	 * @var string
	 */
	private string $buttonImage;

	/**
	 * @var string
	 */
	private string $title;

	/**
	 * @var Directory|null
	 */
	private ?Directory $directory;

	public function __construct(string $title, string $buttonImage, ?Directory $directory) {
		$this->buttonImage = $buttonImage;
		$this->title = $title;
		$this->directory = $directory;
	}

	public final function getButtonImage() :string {
		return $this->buttonImage;
	}

	public final function getTitle() :string {
		return $this->title;
	}

	public final function getDirectory() :?Directory {
		return $this->directory;
	}
}