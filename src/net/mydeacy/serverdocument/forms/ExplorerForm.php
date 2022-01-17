<?php

namespace net\mydeacy\serverdocument\forms;

use net\mydeacy\serverdocument\elements\interfaces\CommandFile;
use net\mydeacy\serverdocument\elements\interfaces\Directory;
use net\mydeacy\serverdocument\elements\interfaces\Element;
use net\mydeacy\serverdocument\elements\interfaces\TextFile;
use net\mydeacy\serverdocument\util\ElementLoader;
use pocketmine\form\Form;
use pocketmine\player\Player;
use pocketmine\Server;

class ExplorerForm implements Form {

	const FORM_TITLE = "§lServerDocument";
	const BACK_BUTTON = " << Back";

	/**
	 * @var Element[]
	 */
	private array $elements = [];

	/**
	 * @var Directory|null
	 */
	private ?Directory $directory;

	/**
	 * @var ElementLoader
	 */
	private ElementLoader $manager;

	/**
	 * @var bool
	 */
	private bool $isBaseDir;

	public function __construct(?Directory $directory, ElementLoader $manager) {
		$this->directory = $directory;
		$this->isBaseDir = !isset($directory);
		$this->elements = $manager->getFilesByDirectory($directory);
		$this->manager = $manager;
	}

	public function handleResponse(Player $player, $data) :void {
		if (!isset($data)) {
			return;
		}
		$select = (int)($this->isBaseDir ? $data : $data - 1);
		if ($select === -1 && !$this->isBaseDir) {
			$beforeDir = $this->isBaseDir ? null : $this->directory->getDirectory();
			$player->sendForm(new ExplorerForm($beforeDir, $this->manager));
		} else {
			$element = $this->elements[$select];
			if ($element instanceof TextFile) {
				$player->sendForm(new ContentForm($element, $this->manager));
			} elseif ($element instanceof Directory) {
				$player->sendForm(new ExplorerForm($element, $this->manager));
			} elseif ($element instanceof CommandFile) {
				Server::getInstance()->dispatchCommand($player, $element->getCommand());
			}
		}
	}

	public function jsonSerialize() {
		$form = new SimpleForm();
		$head = $this->isBaseDir ? "/" : $this->directory->getTitle();
		$form->setTitle(self::FORM_TITLE)
		     ->setContent($head);
		if (!$this->isBaseDir) {
			$form->addButton(self::BACK_BUTTON);
		}
		foreach ($this->elements as $element) {
			$form->addButton($element->getTitle(), $element->getButtonImage());
		}
		return $form->getFormData();
	}
}