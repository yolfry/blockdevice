<?php

declare(strict_types=1);

namespace blockdevice;



use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase
{
    public function onLoad(): void
    {
        $this->getLogger()->info('Cargando [blockdevice] yolfry');
    }


    public function onEnable(): void
    {
        //Cargar Eventos y Administrar Plugin
        $this->getServer()->getPluginManager()->registerEvents(new eventos($this), $this);
        $this->getLogger()->info(TextFormat::DARK_GRAY . "Plugin Iniciado [blockdevice] 0.3.0");
    }
}
