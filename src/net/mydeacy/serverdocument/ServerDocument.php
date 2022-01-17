<?php

namespace net\mydeacy\serverdocument;

use Exception;
use net\mydeacy\serverdocument\forms\ExplorerForm;
use net\mydeacy\serverdocument\util\ElementLoader;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;

class ServerDocument extends PluginBase {

	const PUBLIC_DIR = "public";
	const EXECUTE_CONSOLE = "cannot execute commands from the console.";
	const READ_ERROR = "Reading of the file failed.";

	/**
	 * @var ElementLoader
	 */
	private ElementLoader $manager;

	public function onEnable() :void {
		try {
			$this->manager = new ElementLoader($this->getDataFolder() . self::PUBLIC_DIR);
		} catch (Exception $e) {
			$this->getLogger()->critical(self::READ_ERROR);
		}
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) :bool {
		if ($sender instanceof Player) {
			$sender->sendForm(new ExplorerForm(null, $this->manager));
		} else {
			$sender->sendMessage(self::EXECUTE_CONSOLE);
		}
		return true;
	}
}