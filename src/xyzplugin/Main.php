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
 		}elseif($command->getName() == "xyzhelp"){
 			$sender->sendMessage("§b=====xyzpluginヘルプ(1/1)=====");
 			$sender->sendMessage("§a/xyz §c- §aあなたの座標・ワールドを取得し表示します");
 			$sender->sendMessage("§a/xyzhelp §c- §aこのヘルプを表示します");
 			$sender->sendMessage("看板については/xyzhelp-kanbanをご覧下さい");
 			$sender->sendMessage("§b============================");
 			return true;
 		}elseif($command->getName() == "xyzhelp-kanban"){
 			$sender->sendMessage("§b===============");
 			$sender->sendMessage("警告看板の警告看板は/xyzhelp-kanban-keikokuをご覧下さい");
 			$sender->sendMessage("許可証の看板は/xyzhelp-kanban-kyokasyouをご覧下さい");
 			$sender->sendMessage("§b===============");
 			return true;
 		}elseif($command->getName() == "xyzhelp-kanban-keikoku"){
	 		$sender->sendMessage("§b==xyzplugin警告看板ヘルプ(1/1)======");
	 		$sender->sendMessage("§a※一行目は常に「bukken」です。下は二行目に書く文字です。");
	 		$sender->sendMessage("");
			$sender->sendMessage("凡例:(書く文字) - (内容)");
 			$sender->sendMessage("miti - 道から一マス離してください");
 			$sender->sendMessage("hochi - 放置物件");
 			$sender->sendMessage("tonari-tatemono - 隣から一マス建物を離してください");
	 		$sender->sendMessage("tonari-hogo - 隣から一マス土地保護を離してください");
	 		$sender->sendMessage("arasi - 荒らし物件");
	 		$sender->sendMessage("muimi-hogo - 無意味な保護は禁止です");
	 		$sender->sendMessage("ganban - 岩盤から一マス離してください");
	 		$sender->sendMessage("kuutyuu - 空中建築は禁止です");
 			$sender->sendMessage("takasugi - 建築高度は最大50ブロックです");
 			$sender->sendMessage("tikakentiku - 地下建築は禁止です");
 			$sender->sendMessage("okisugi-garasu - ガラスの置きすぎです");
 			$sender->sendMessage("okisugi-kougen - 光源の置きすぎです");
 			$sender->sendMessage("ie - ここに家を建ててはいけません");
 			$sender->sendMessage("hyousatu - 表札をつけてください");
			$sender->sendMessage("§b=======================================");
 			return true;
 		}elseif($command->getName() == "xyzhelp-keikoku-kyokasyou"){
 			$sender->sendMessage("§b==xyzplugin許可証看板ヘルプ(1/1)==");
 			$sender->sendMessage("§a※一行目は常に「kyokasyou」です。下は二行目に書く文字です。");
 			$sender->sendMessage("garasu - ガラス大量使用許可");
 			$sender->sendMessage("kougen - 光源大量使用許可");
 			$sender->sendMessage("mizu - 水使用許可");
 			$sender->sendMessage("tikakentiku - 地下建築許可");
 			$sender->sendMessage("kuutyuu - 空中建築許可");
 			$sender->sendMessage("takai - 建設高度超過許可");
 			$sender->sendMessage("§b===============================");
 			return true;
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
			case 'sikosiko':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'しこしこ':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case 'シコシコ':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;
			case '4545':
				$event->setLine(0,"§6下ネタはやめて下さい");
				$player = $event->getPlayer()->getName();
				$player->kick("§cあなたの書いた看板を下ネタと判断しました", false);
				break;

		}
		$player = $event->getPlayer();
		if($player->isOp()){
			if($text[0] == "kyokasyou"){
				$reason = $text[2];
				$today = date("y/m/d");
				$name = $event->getPlayer()->getName();
				$daimei = "§b§lⓘ§r§b[許可証 ".$today."]";
				$name2 = "§a§l".$name."";
				$naiyou = "";
				switch ($text[1]) {
					/*見本※これをテンプレに【】を書き換えてくれれば動くと思います。下のコードも参考に(参考にならないかもだけど
					case '【ここを二段目に入力する文字】':
						$naiyou = "【どういう許可にするか。二段目に表示されるメッセージ。】";
						break;

					改造場所(改造許可場所)は以上です。改造するところもないのでそれ以外は基本触らないようにお願いします。
					*/
					case 'garasu':
						$naiyou = "§aガラスの大量使用を許可";
						break;

					case 'kougen':
						$naiyou = "§a光源の大量使用を許可";
						break;

					case 'mizu':
						$naiyou = "§a水の使用を許可";
						break;

					case 'tikakentiku':
						$naiyou = "§a地下建築を許可";
						break;

					case 'kuutyuu':
						$naiyou = "§a空中建築を許可";
						break;

					case 'takai':
						$naiyou = "§a建築最大高度超を許可";
						break;


					default:
						$daimei = "§c正しい形式で入力してください";
						$reason = "";
						$naiyou = "";
						$name2 = "";
						break;
				}
				if($reason == ""){
					$reason = "§c未記入";
				}
				$event->setLine(0,$daimei);
				$event->setLine(1,$naiyou);
				$event->setLine(2,"§d理由:§b".$reason."");
				$event->setLine(3,$name2);
		
			}elseif($text[0] == "bukken"){
				$todaym = date("m");
				$todayd = date("d");
				$name = $event->getPlayer()->getName();
				$daimei = "§l§6⚠§r§c警告:違法物件§l§6⚠";
				$name2 = "§l§b".$name."";
				switch ($text[1]) {
					/*見本※これをテンプレに【】を書き換えてくれれば動くと思います。下のコードも参考に(参考にならないかもだけど
					case '【ここを二段目に入力する文字】':
						$todaydd = 【警告から何日後に撤去するか※数字】;
						$daimei = "【題名を書き換える場合のみ。そのままの場合はこの行は消す。】";
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

					case 'ganban':
						$todaydd = 10;
						$reason = "§a最低でも岩盤から1マス離してください";
						break;

					case 'kuutyuu':
						$todaydd = 10;
						$reason = "§a空中建築は禁止です";
						break;

					case 'takasugi':
						$todaydd = 10;
						$reason = "§a建設高度は50ブロックまでです";
						break;

					case 'tikakentiku':
						$todaydd = 7;
						$reason = "§a地下建築は禁止です";
						break;

					case 'okisugi-garasu':
						$todaydd = 10;
						$reason = "§aガラスの量を減らしてください";
						break;

					case 'okisugi-kougen':
						$todaydd = 10;
						$reason = "§a光源の量を減らしてください";
						break;

					case 'ie':
						$todaydd = 3;
						$reason = "§aここに家を建てることはできません";
						break;

					case 'hyousatu':
						$todaydd = 10;
						$reason = "§a表札をつけてください";
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
