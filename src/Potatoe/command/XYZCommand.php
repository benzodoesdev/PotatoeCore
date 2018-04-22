<?php

declare(strict_types=1);

namespace Potatoe\command;

use Potatoe\Core;

use pocketmine\command\CommandSender;
use pocketmine\Player;

class XYZCommand extends BaseCommand{

    /** @var Core $plugin */
    private $plugin;

    public function __construct(Core $plugin){
        $this->plugin = $plugin;
        parent::__construct($plugin, "xyz", "Check Your XYZ", "/xyz", ["xyz"]);
    }

    public function execute(CommandSender $sender, $commandLabel, array $args) : bool{
        if($sender instanceof Player){
            if(!isset($args[0])){
                $sender->sendMessage("§l§9Coords>§r§7 You're Standing At\n§7 X - " . round($sender->getX()) . "\n§7 Y - " . round($sender->getY()) . "\n§7 Z - " . round($sender->getZ()));
            }
        }else{
            $sender->sendMessage(Core::USE_IN_GAME);
            return false;
        }
        return true;
    }
}
