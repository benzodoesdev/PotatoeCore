<?php

declare(strict_types=1);

namespace Potatoe\message;

use Potatoe\Core;

use pocketmine\Server;
use pocketmine\scheduler\PluginTask;
use pocketmine\utils\TextFormat as C;

class Broadcast extends PluginTask{

    public function onRun(int $currentTick) : void{
        /** @var array $input */
        $input = [
            "§l§9Tip> §r§7Message 1",
            "§l§9Tip> §r§7Message 2",
            "§l§9Tip> §r§7Message 3"
        ];
        $details = array_rand($input);
        Server::getInstance()->broadcastMessage(C::GRAY . $input[$details]);
    }
}