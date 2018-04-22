<?php

declare(strict_types=1);

namespace Potatoe\command;

use Potatoe\Core;
use pocketmine\utils\TextFormat as C;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;

class BaseCommand extends Command implements PluginIdentifiableCommand{

    /** @var Core $plugin */
    private $plugin;

    public function __construct(Core $plugin, $name, $description, $usageMessage, $aliases){
        parent::__construct($name, $description, $usageMessage, $aliases);
        $this->plugin = $plugin;
    }

    public function getPlugin() : Plugin{
        return $this->plugin;
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) : bool{
        if($sender->hasPermission($this->getPermission())){
            $result = $this->onExecute($sender, $args);
            if(is_string($result)){
                $sender->sendMessage($result);
            }
            return true;
        }else{
            $sender->sendMessage(C::BOLD . C::BLUE . "Error> " . C::RESET . C::GRAY . "Such command, No Permission");
        }
        return false;
    }
}
