<?php

declare(strict_types=1);

namespace blockdevice;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;

use pocketmine\event\player\PlayerLoginEvent;
// use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\utils\TextFormat;

// use pocketmine\event\server\DataPacketReceiveEvent;
// use pocketmine\network\mcpe\protocol\types\DeviceOS;

class eventos implements Listener
{
    public function __construct(private Main $plugin)
    {
    }

    // public function PlayerLoginEvent(PlayerPreLoginEvent $e): void
    // {
    //     $device = $e->getPlayer()->getPlayerInfo()->getExtraData()["DeviceOS"];
    //     if ($device === 2) {
    //         $this->plugin->getLogger()->info('Jugador conectado al servidor' . $e->getPlayer()->getName());
    //         $this->plugin->getLogger()->info('Local del jugador' . $e->getPlayer()->getPlayerInfo()->getLocale());
    //         $this->plugin->getLogger()->info('Exbox UIX' . $e->getPlayer()->getXuid());

    //         $this->plugin->getLogger()->info('Device: ' . $device);
    //         $e->getPlayer()->transfer('bedrock.bosscraft.net', 19132, "Conectando con Servidor");
    //     } else {
    //         $e->getPlayer()->kick(TextFormat::toHTML("<h1>IOS Server</1>") . TextFormat::DARK_RED . TextFormat::ITALIC . 'Por favor aceda desde un dipositivo IOS (Iphone)');
    //     }
    // }

    //Cuando el jugador inicia
    public function PlayerLoginEvent(PlayerLoginEvent $e): void
    {
        $device = $e->getPlayer()->getPlayerInfo()->getExtraData()["DeviceOS"];
        if ($device != 2) {
            $e->getPlayer()->kick(TextFormat::WHITE . "Por favor aceda desde un dipositivo IOS (Iphone)");
        }
    }

    //Al unirce el jugador

    public function PlayerJoinEvent(PlayerJoinEvent $e): void
    {
        // $device = $e->getPlayer()->getPlayerInfo()->getExtraData()["DeviceOS"];
        // $this->plugin->getLogger()->info('Jugador conectado al servidor' . $e->getPlayer()->getName());
        // $this->plugin->getLogger()->info('Local del jugador' . $e->getPlayer()->getPlayerInfo()->getLocale());
        // $this->plugin->getLogger()->info('Exbox UIX' . $e->getPlayer()->getXuid());
        // $this->plugin->getLogger()->info('Device: ' . $device);

        $e->getPlayer()->transfer('bedrock.bosscraft.net', 19132, "Conectando con el Servidor");
    }

    // public function DataPacketReceiveEvent(DataPacketReceiveEvent $event): void
    // {
    //     $packet = $event->getPacket();
    //     $player = $event->getPlayer();

    //     echo $player->norma

    //     // $this->plugin->getLogger()->info("Numero de Dipositivo: " . $event->getPacket()->getDeviceModel());
    // }

    /**
     * This runs after all other priorities. We mustn't cancel the event at MONITOR priority, we can only observe the
     * result.
     *
     * @priority MONITOR
     */
    public function PlayerChatEvent(PlayerChatEvent $event): void
    {
        $player = $event->getPlayer();
        $this->plugin->getServer()->broadcastMessage("Nuevo mensaje de: " . $player->getDisplayName() . ' ' . $event->getMessage());
    }

    /**
     * @param PlayerGameModeChangeEvent $event
     *
     * @priority NORMAL
     */
    public function chargeGamemode(PlayerGameModeChangeEvent $event): void
    {
        $this->plugin->getServer()->broadcastMessage($event->getPlayer()->getDisplayName() . " Cambio el modo de juego");
    }
}
