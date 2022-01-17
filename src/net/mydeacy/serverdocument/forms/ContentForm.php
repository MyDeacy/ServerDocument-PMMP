<?php

namespace net\mydeacy\serverdocument\forms;

use net\mydeacy\serverdocument\elements\interfaces\TextFile;
use net\mydeacy\serverdocument\util\ElementLoader;
use pocketmine\form\Form;
use pocketmine\player\Player;

class ContentForm implements Form {

	const BACK_BUTTON = "Close";
	const LINE = "\n\n";

	/**
	 * @var TextFile
	 */
	private TextFile $fileElement;

	/**
	 * @var ElementLoader
	 */
	private ElementLoader $manager;

	public function __construct(TextFile $fileElement, ElementLoader $manager) {
		$this->fileElement = $fileElement;
		$this->manager = $manager;
	}

	public function handleResponse(Player $player, $data) :void {
		if (!isset($data)) {
			return;
		}
		$player->sendForm(new ExplorerForm($this->fileElement->getDirectory(), $this->manager));
	}

	public function jsonSerialize() {
		$form = (new SimpleForm())
			->setTitle($this->fileElement->getTitle())
			->setContent($this->fileElement->getContent() . self::LINE)
			->addButton(self::BACK_BUTTON);
		return $form->getFormData();
	}
}