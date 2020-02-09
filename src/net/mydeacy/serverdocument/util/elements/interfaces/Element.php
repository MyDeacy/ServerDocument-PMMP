<?php

namespace net\mydeacy\serverdocument\util\elements\interfaces;

interface Element {

	/**
	 * @return string
	 */
	function getButtonImage() :string;

	/**
	 * @return string
	 */
	function getTitle() :string;

	/**
	 * @return Directory|null
	 */
	function getDirectory() :?Directory;
}