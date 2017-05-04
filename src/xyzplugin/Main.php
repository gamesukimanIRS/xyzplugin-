<?php

/*hajime te no orijinaru plugin
* (c)gamesukimanIRS
*/
/*
|~~~~~~~~|  |\     /|   /~~~~~\  ~~~~~  |~~~~\    /~~~~~\
|           | \   / |  /      |    |    |     |  /      |
|    ~~~~|  |  \_/  |  |______     |    |____/   |_______
|        |  |       |         |    |    |\__            |
|________|  |       |  \______|  __|__  |   \    \______|
(c)gamesukimanIRS

注意
コードは基本汚いです。関数とかもあったもの使ってるだけです
*/


namespace xyzplugin;

use pocketmine\Player;
use pocketmine\tile;
use pocketmine\tile\Sign;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getlogger()->info("xyzplugin+αを読み込みました。作者:gamesukimanIRS");
    $this->getlogger()->warning("製作者偽りと二次配布、改造、改造配布はおやめ下さい。");
    $this->getlogger()->info("このプラグインを使用する際はどこかにプラグイン名「xyzplugin」と作者名「gamesukimanIRS」を記載する事を推奨します。");
  }
   
  public function onCommand(CommandSender $sender, Command $command, $label, array $args){
    if($command->getName() == "xyz"){
      if($sender instanceof Player){
        $sender->getName();
        $level = $sender->getLevel();
        $l = $level->getFolderName();
        $x = $sender->getX();
        $y = $sender->getY();
        $z = $sender->getZ();
        $sender->sendMessage("§b[XYZ]§fあなたの座標はX=".$x."、Y=".$y."、Z=".$z."、ワールド=".$l."です。");
        return true;
      }else{
        $this->getlogger()->warning("サーバー内で実行して下さい");
        return true;
      }
    }
  }
  
	public function onSignChange(SignChangeEvent $event){
		$text = $event->getLines();
		switch ($text[0]) {
			//下のcaseは気分が悪くなる恐れがありますのでご注意ください
			case 'oppai':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'おっぱい':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'sex':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'セックス':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'tinko':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'ちんこ':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'manko':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'まんこ':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;

		}
		$player = $event->getPlayer();
		if($player->isOp()){
			if($text[0] == "bukken"){
				$todaym = date("m");
				$todayd = date("d");
				$name = $event->getPlayer()->getName();
				$daimei = "§l§6⚠§r§c警告:違法物件§l§6⚠";
				$name2 = "§l§b".$name."";
				switch ($text[1]) {
					/*見本※これをテンプレに【】を書き換えてくれれば動くと思います。下のコードも参考に(参考にならないかもだけど
					case '【ここを二段目に入力する文字】':
						$todaydd = 【警告から何日後に撤去するか※数字】;
						$daimei = "【題名を書き換える場合のみ。そのままの場合はこの行は消す。】
						$reason = "【どういう警告にするか。二段目に表示されるメッセージ。】";
						break;

					改造場所(改造許可場所)は以上です。改造するところもないのでそれ以外は基本触らないようにお願いします。
					*/
					case 'miti':
						$todaydd = 10;
						$reason = "§a道から最低1マス離して下さい";
						break;
					case 'hochi':
						$todaydd = 30;
						$daimei = "§l§6⚠§r§c警告:放置物件§l§6⚠";
						$reason = "§a30日以内に持ち主のログインがない場合撤去";
						break;

					case 'tonari-tatemono':
						$todaydd = 10;
						$reason = "§a隣の建物から最低1マス離してください";
						break;

					case 'tonari-hogo':
						$todaydd = 10;
						$reason = "§a隣の土地保護から最低1マス離してください";
						break;

					case 'arasi':
						$todaydd = 15;
						$daimei = "§b§lⓘ§r§6注意:荒らし物件§l§bⓘ";
						$reason = "§a申告があれば修復します";
						break;

					case 'muimi-hogo':
						$todaydd = 7;
						$daimei = "§l§6⚠§r§c警告:違法土地保護§l§6⚠";
						$reason = "§a無意味な土地保護は禁止です";
						break;

					default:
						$daimei = "§c正しい形式でやり直してください";
						$reason = "";
						$today = "";
						$name = "";
						break;

				}
				$todayd = $todayd + $todaydd;
				if($todaym == 1 and $todayd >= 31){
					$todaym = "02";
					$todayd = "01";
				}elseif($todaym == 2 and $todayd >= 28){
					$todaym = "03";
					$todayd = "01";
				}elseif($todaym == 3 and $todayd >= 31){
					$todaym = "04";
					$todayd = "01";
				}elseif($todaym == 4 and $todayd >= 30){
					$todaym = "05";
					$todayd = "01";
				}elseif($todaym == 5 and $todayd >= 31){
					$todaym = "06";
					$todayd = "01";
				}elseif($todaym == 6 and $todayd >= 30){
					$todaym = "07";
					$todayd = "01";
				}elseif($todaym == 7 and $todayd >= 31){
					$todaym = "08";
					$todayd = "01";
				}elseif($todaym == 8 and $todayd >= 31){
					$todaym = "09";
					$todayd = "01";
				}elseif($todaym == 9 and $todayd >= 30){
					$todaym = "10";
					$todayd = "01";
				}elseif($todaym == 10 and $todayd >= 31){
					$todaym = "11";
					$todayd = "01";
				}elseif($todaym == 11 and $todayd >= 30){
					$todaym = "12";
					$todayd = "01";
				}elseif($todaym == 12 and $todayd >= 31){
					$todaym = "01";
					$todayd = "01";
				}
				$today = "§c撤去日　§d".$todaym."/".$todayd."";
				$event->setLine(0,$daimei);
				$event->setLine(1,$reason);
				$event->setLine(2,$today);
				$event->setLine(3,$name2);
			}
		}else{
			$player->sendTip("§cあなたには看板を立てる権限がありません");
			return true;
		}
	}
}
