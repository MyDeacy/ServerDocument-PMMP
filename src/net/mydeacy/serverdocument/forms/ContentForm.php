<?php

namespace net\mydeacy\serverdocument\forms;

use net\mydeacy\serverdocument\util\ElementManager;
use net\mydeacy\serverdocument\elements\interfaces\TextFile;
use pocketmine\form\Form;
use pocketmine\Player;

class ContentForm implements Form {

	const BACK_BUTTON = "Close";
	const LINE = "\n\n";

	/**
	 * @var TextFile
	 */
	private $fileElement;

	/**
	 * @var ElementManager
	 */
	private $manager;

	/**
	 * ContentForm constructor.
	 *
	 * @param TextFile $fileElement
	 * @param ElementManager $manager
	 */
	public function __construct(TextFile $fileElement, ElementManager $manager) {
		$this->fileElement = $fileElement;
		$this->manager = $manager;
	}

	/**
	 * @inheritDoc
	 */
	public function handleResponse(Player $player, $data) :void {
		if (!isset($data)) {
			return;
		}
		$player->sendForm(new ExplorerForm($this->fileElement->getDirectory(), $this->manager));
	}

	/**
	 * @inheritDoc
	 */
	public function jsonSerialize() {
		$form = (new SimpleForm())
			->setTitle($this->fileElement->getTitle())
			->setContent($this->fileElement->getContent() . self::LINE)
			->addButton(self::BACK_BUTTON);
		return $form->getFormData();
	}
}