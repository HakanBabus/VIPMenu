<?php

namespace HakanBabus;

use pocketmine\player;
use pocketmine\server;
use pocketmine\plugin\pluginbase;
use pocketmine\command\command;
use pocketmine\command\commandsender;

class main extends PluginBase
{

	public function onenable()
	{

	}

	public function oncommand(commandsender $sender, command $cmd, string $label, array $args) : bool
	{

		switch($cmd->getname())
		{
			case "vipmenu":
			 if($sender Instanceof player);
			 if($sender->hasPermission("vip.menu")) {
			 
			 	$this->ui($sender);
			 }

		}
		return true;
	}

	public function ui($player)
	{
		

		$form = $this->getserver()->GetPluginManager()->getplugin("FormAPI")->createsimpleform(function (player $player, int $data = null){
			if($data === null)
			{
				return true;
			}
			Switch($data)
			{
				case 0:
				    $this->uc($player);
				    break;

				case 1:  
				    $this->can($player);
				    break; 

				case 2:
				    $this->aclik($player);
				    break;

				case 3:
				    
				    break;				    


			}
		});
		$form->settitle("VIPMenu");
		$form->setcontent("                  Buton Seç!");
		$form->addButton("§lUç", 0, "textures/ui/jump_boost_effect.png");
		$form->addbutton("§lCan Doldur", 0, "textures/ui/health_boost_effect.png");
		$form->addButton("§lAçlık Doldur", 0, "textures/ui/hunger_blink.png");
		$form->addButton("§l§4Kapat", 0, "textures/ui/cancel.png");
		$form->sendtoplayer($player);
		return $form;
    }

    public function can($player)
    {
        
    	$player->setHealth(20);
    	$player->sendMessage("§aCanın Yenilendi!");
    }

    public function aclik($player)
    {
    	$player->setFood(20);
    	$player->sendMessage("§aAçlık Dolduruldu!");
    }

    public function uc($player)
    {
    	$form = $this->getserver()->GetPluginManager()->getplugin("FormAPI")->createsimpleform(function (player $player, int $data = null){
			if($data === null)
			{
				return true;
			}
			Switch($data)
			{
				case 0:
				    $this->uckapa($player);
				    break;

				case 1:  
				    $this->ucac($player);
				    break; 



			}
		});
		$form->settitle("Uçma Menüsü");
		$form->setcontent("                  Buton Seç!");
		$form->addButton("§lAç", 0, "textures/ui/jump_boost_effect.png");
		$form->addbutton("§lKapa", 0, "textures/ui/cancel.png");
		$form->sendtoplayer($player);
		return $form;
    }
    
    public function uckapa($player)
    {
    	$player->setAllowFlight(true);
    	$player->sendMessage("§aUçma Modu Açıldı");
    }
    
    public function ucac($player)
    {
    	$player->setAllowFlight(false);
    	$player->sendMessage("§4Uçma Modu Kapatıldı");
    }

 }