<?php

/*hajime te no orijinaru plugin
* (c)gamesukimanIRS
*/

namespace Xyzplugin;

use pocketmine¥Player;
use pocketmine¥command¥Command;
use pocketmine¥command¥CommandSender;

class Main extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getlogger()->info("xyzpluginを読み込みました");
  }
   
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if($command->getName() == "xyz"){
      if($sender instanceof Player){
        $sender->getName();
        $l = $player->getLevel();
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
        $sender->sendMessage("あなたの座標はX=".x."、Y=".y."、Z=".z."、ワールド=".l."です。");
      }else{
        $sender->sendMesaage("サーバー内で実行して下さい");
      }
    }
  }
}
