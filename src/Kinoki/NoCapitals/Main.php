<?php

namespace Kinoki\NoCapitals;
use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;

class Main extends PluginBase implements Listener {
    private static $instance;
    public function onLoad() {
        self::$instance = $this;
    }
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onChat(PlayerChatEvent $event) {
        $player = $event->getPlayer();
        if (!$player->hasPermission("nocapitals.bypass")) {
            $msg = $event->getMessage();
            $event->setMessage(mb_strtolower($msg, "UTF-8"));
        }
    }
    public static function getInstance() : self {
        return self::$instance;
    }
}