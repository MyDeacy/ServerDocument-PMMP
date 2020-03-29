<?php

namespace net\mydeacy\serverdocument\util;

use net\mydeacy\serverdocument\elements\interfaces\Directory;

interface ElementManager {

	/**
	 * @param Directory|null $directory
	 *
	 * @return array
	 */
	public function getFilesByDirectory(?Directory $directory) :array;
}