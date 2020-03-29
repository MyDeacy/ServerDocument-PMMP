<?php

namespace net\mydeacy\serverdocument\elements;

use net\mydeacy\serverdocument\elements\interfaces\Directory;

abstract class ElementBase {

	/**
	 * @var string
	 */
	private $buttonImage;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var Directory|null
	 */
	private $directory;

	/**
	 * ElementBase constructor.
	 *
	 * @param string $title
	 * @param string $buttonImage
	 * @param Directory|null $directory
	 */
	public function __construct(string $title, string $buttonImage, ?Directory $directory) {
		$this->buttonImage = $buttonImage;
		$this->title = $title;
		$this->directory = $directory;
	}

	/**
	 * @return string
	 */
	public final function getButtonImage() :string {
		return $this->buttonImage;
	}

	/**
	 * @return string
	 */
	public final function getTitle() :string {
		return $this->title;
	}

	/**
	 * @return Directory|null
	 */
	public final function getDirectory() :?Directory {
		return $this->directory;
	}
}