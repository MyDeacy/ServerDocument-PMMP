<?php

namespace net\mydeacy\serverdocument\forms;

class SimpleForm {

	/**
	 * @var string[]
	 */
	private array $formData = [];

	public function __construct() {
		$this->formData = [
			"type"    => "form",
			"title"   => "",
			"content" => "",
			"buttons" => []
		];
	}

	public function setTitle(string $title) :static {
		$this->formData["title"] = $title;
		return $this;
	}

	public function setContent(string $text) :static {
		$this->formData["content"] = $text;
		return $this;
	}

	public function addButton(string $text, $image = null) :static {
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