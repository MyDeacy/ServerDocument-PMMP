<?php

namespace net\mydeacy\serverdocument\forms;

class SimpleForm {

	/**
	 * @var string[]
	 */
	private $formData = [];

	public function __construct() {
		$this->formData = [
			"type"    => "form",
			"title"   => "",
			"content" => "",
			"buttons" => []
		];
	}

	public function setTitle(String $title) {
		$this->formData["title"] = $title;
		return $this;
	}

	public function setContent(String $text) {
		$this->formData["content"] = $text;
		return $this;
	}

	public function addButton(String $text, $image = null) {
		if ($image !== null) {
			$this->formData["buttons"][] = [
				"text"  => $text,
				"image" => [
					"type" => "path",
					"data" => $image
				]
			];
		} else {
			$this->formData["buttons"][] = [
				"text" => $text
			];
		}
		return $this;
	}

	public function getFormData() :array {
		return $this->formData;
	}
}