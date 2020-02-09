<?php

namespace net\mydeacy\serverdocument\util\elements\interfaces;

interface TextFile extends Element {

	const BUTTON_IMAGE = "textures/items/book_written.png";

	/**
	 * @return string
	 */
	function getContent() :string;
}
