<?php

namespace net\mydeacy\serverdocument\elements\interfaces;

interface CommandFile extends Element {

	const BUTTON_IMAGE = "textures/blocks/command_block.png";

	/**
	 * @return string
	 */
	function getCommand() :string;
}