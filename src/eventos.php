<?php

/*
 *
 *  ____  __    _____   ___  _  _      ____   ____  _  _  ____   ___  ____  ___ 
 * (  - \(  )  (  _  ) / __)( )/ )    (  _ \ ( ___)( \/ )(_  _) / __)( ___)/ __)
 *  ) _ < )(__  )(_)( ( (__  )  (      )(_) ) )__)  \  /  _)(_ ( (__  )__) \__ \
 * (____/(____)(_____) \___)(_)\_)    (____/ (____)  \/  (____) \___)(____)(___/
 * 
 *                 Developed by Yolfri Bautista
 *                      2022 Thanks to pmmp 
 * 
 *   This is a security plugin, to protect your server from 
 * devices that contain many Hackers like (Android)
 * 
 *   Simply go to the plugin settings and add "true" to 
 * the device you want to lock. 
 * 
 * @author Yolfry Bautista <info@ypw.com.do>
 * @license MIT
*/

declare(strict_types=1);

namespace blockdevice;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerLoginEvent;
use pocketmine\utils\TextFormat;

class eventos implements Listener
{
    public function __construct(private Main $plugin)
    {
    }

    public function kick($event)
    {

        $devicesBlock = $this->plugin->devicesBlock;
        $text = $this->plugin->text;

        $event->getPlayer()->kick(
            TextFormat::WHITE . $text['kick'] . '  ' . TextFormat::AQUA .
                $text['aDevices'] . ' ' . TextFormat::ITALIC . TextFormat::GREEN .
                (!$devicesBlock["AMAZON"] ? "AMAZON, " : null) .
                (!$devicesBlock["ANDROID"] ? "ANDROID, " : null) .
                (!$devicesBlock["DEDICATED"] ? "DEDICATED, " : null) .
                (!$devicesBlock["GEAR_VR"] ? "GEAR_VR, " : null) .
                (!$devicesBlock["HOLOLENS"] ? "HOLOLENS, " : null) .
                (!$devicesBlock["IOS"] ? "IOS, " : null) .
                (!$devicesBlock["NINTENDO"] ? "NINTENDO, " : null) .
                (!$devicesBlock["OSX"] ? "OSX, " : null) .
                (!$devicesBlock["PLAYSTATION"] ? "PLAYSTATION, " : null) .
                (!$devicesBlock["TVOS"] ? "TVOS, " : null) .
                (!$devicesBlock["UNKNOWN"] ? "UNKNOWN, " : null) .
                (!$devicesBlock["WIN32"] ? "WIN32, " : null) .
                (!$devicesBlock["WINDOWS_10"] ? "WINDOWS_10, " : null) .
                (!$devicesBlock["WINDOWS_PHONE"] ? "WINDOWS_PHONE, " : null) .
                (!$devicesBlock["XBOX"] ? "XBOX, " : null)
        );
    }

    //Cuando el jugador inicia
    public function PlayerLoginEvent(PlayerLoginEvent $e): void
    {
        $device = $e->getPlayer()->getPlayerInfo()->getExtraData()["DeviceOS"];

        //ANDROID
        if ($device == 1 && $this->plugin->devicesBlock["ANDROID"]) {
            $this->kick($e);
        }
        //IOS
        if ($device == 2 && $this->plugin->devicesBlock["IOS"]) {
            $this->kick($e);
        }

        //OSX
        if ($device == 3 && $this->plugin->devicesBlock["OSX"]) {
            $this->kick($e);
        }

        //AMAZON
        if ($device == 4 && $this->plugin->devicesBlock["AMAZON"]) {
            $this->kick($e);
        }

        //GEAR_VR
        if ($device == 5 && $this->plugin->devicesBlock["GEAR_VR"]) {
            $this->kick($e);
        }

        //HOLOLENS
        if ($device == 6 && $this->plugin->devicesBlock["HOLOLENS"]) {
            $this->kick($e);
        }

        //WINDOWS_10
        if ($device == 7 && $this->plugin->devicesBlock["WINDOWS_10"]) {
            $this->kick($e);
        }

        //WIN32
        if ($device == 8 && $this->plugin->devicesBlock["WIN32"]) {
            $this->kick($e);
        }

        //DEDICATED
        if ($device == 9 && $this->plugin->devicesBlock["DEDICATED"]) {
            $this->kick($e);
        }
        //TVOS
        if ($device == 10 && $this->plugin->devicesBlock["TVOS"]) {
            $this->kick($e);
        }
        //PLAYSTATION
        if ($device == 11 && $this->plugin->devicesBlock["PLAYSTATION"]) {
            $this->kick($e);
        }
        //NINTENDO
        if ($device == 12 && $this->plugin->devicesBlock["NINTENDO"]) {
            $this->kick($e);
        }
        //XBOX
        if ($device == 13 && $this->plugin->devicesBlock["XBOX"]) {
            $this->kick($e);
        }
        //WINDOWS_PHONE
        if ($device == 14 && $this->plugin->devicesBlock["WINDOWS_PHONE"]) {
            $this->kick($e);
        }
        //UNKNOWN
        if ($device == -1 && $this->plugin->devicesBlock["UNKNOWN"]) {
            $this->kick($e);
        }
    }
}
