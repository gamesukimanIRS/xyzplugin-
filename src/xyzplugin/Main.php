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
    $this->getlogger()->info("xyzpluginを読み込みました。作者:gamesukimanIRS");
    $this->getlogger()->warning("製作者偽りと二次配布、改造、改造配布はおやめ下さい。");
    $this->getlogger()->info("このプラグインを使用する際はどこかにプラグイン名「xyzplugin」と作者名「gamesukimanIRS」を記載する事を推奨します。")
  }
   
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if($command->getName() == "xyz"){
      if($sender instanceof Player){
        $sender->getName();
        $l = $player->getLevel();
        $x = $player->getX();
        $y = $player->getY();
        $z = $player->getZ();
        $sender->sendMessage("§b[XYZ]§fあなたの座標はX=".x."、Y=".y."、Z=".z."、ワールド=".l."です。");
      }else{
        $this->getlogger()->warning("サーバー内で実行して下さい");
      }
    }
  }
}