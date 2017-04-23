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
  
  public function onCommand(){
    
if($player instanceof Player){
  switch ($args[0])
    case 'xyz':
    $level->$player->getLevel();
    $x->$player->getX();
    $y->$player->getY();
    $z->$player->getZ();
  
  break;
}else{
  $sender->sendMesaage("サーバー内で実行して下さい");
}
        
  

？>
