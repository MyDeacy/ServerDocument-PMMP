<?php

namespace net\mydeacy\serverdocument\elements;

use net\mydeacy\serverdocument\elements\interfaces\CommandFile;
use net\mydeacy\serverdocument\elements\interfaces\Directory;

class CommandElement extends ElementBase implements CommandFile {

	/**
	 * @var string
	 */
	private $command;

	/**
	 * CommandElement constructor.
	 *
	 * @param string $title
	 * @param string $command
	 * @param Directory|null $directory
	 */
	public function __construct(string $title, string $command, ?Directory $directory) {
		parent::__construct($title, self::BUTTON_IMAGE, $directory);
		$this->command = $command;
	}

	/**
	 * @inheritDoc
	 */
	function getCommand() :string {
		return $this->command;
	}
}