<?php

namespace net\mydeacy\serverdocument\util;

use net\mydeacy\serverdocument\elements\interfaces\Directory;
use net\mydeacy\serverdocument\elements\interfaces\Element;

interface ElementFactory {

	/**
	 * @param string $fileName
	 * @param string $dir
	 * @param Directory|null $directory
	 *
	 * @return Element|null
	 */
	function createElement(string $fileName, string $dir, ?Directory $directory) :?Element;
}