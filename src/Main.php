<?php

/*
 *
 *   ____  __    _____   ___  _  _      ____   ____  _  _  ____   ___  ____  ___ 
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



use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase
{
    public $devicesBlock;
    public $text;
    public function onLoad(): void
    {
        $this->getLogger()->info(TextFormat::GREEN . 'Loading... ' . TextFormat::AQUA . 'BlockDevices');
    }


    public function onEnable(): void
    {
        $this->saveDefaultConfig();

        //Config Devices 
        $this->devicesBlock = $this->getConfig()->get("devicesBlock",  [
            "AMAZON" => false,
            "ANDROID" => false,
            "DEDICATED" => false,
            "GEAR_VR" => false,
            "HOLOLENS" => false,
            "IOS" => false,
            "NINTENDO" => false,
            "OSX" => false,
            "PLAYSTATION" => false,
            "TVOS" => false,
            "UNKNOWN" => false,
            "WIN32" => false,
            "WINDOWS_10" => false,
            "WINDOWS_PHONE" => false,
            "XBOX" => false,
        ]);

        //Config Text
        $this->text = $this->getConfig()->get('text', [
            "kick" => "Currently this server is not available for your device.",
            "aDevices" => "Available Devices:"
        ]);

        //Loading Events
        $this->getServer()->getPluginManager()->registerEvents(new eventos($this), $this);
        $this->getLogger()->info(TextFormat::GREEN . "Plugin Ready " . TextFormat::AQUA . 'BlockDevices ' . TextFormat::YELLOW . "v" . $this->getDescription()->getVersion());
    }
}
