<?php
/**
 * Telegram webhook bot Example.
 * @author Egor Egorov <egor@erorrov.ru>
 */

//Include file (class)

require_once __DIR__ . '/bot.php';
//Instances class
$tg = new Telegram("5810952608:AAFM59Pft9aoh6bJHLYEzedPFKAriA12mAg");

//Get an array of an incoming update
$result = $tg->getData();
$text = $result['message']['text'];
$chatID = $result['message']['chat']['id'];

//First command
if($text == "Danu" || $text == "danu"  || $text == "dana" || $text == "Dana" || $text == "/dana" || $text == "/Dana" || $text == "/danu" || $text == "/Danu"){
  //Build buttons
	$params = ["chat_id" => $chatID, "text" => "Danu is here", "reply_markup" => $rm];
	$tg->sendRequest("sendMessage", $params);
	$sticker = "CAACAgQAAxkBAAPNY6_vQL9pvU2Y1tiSqExG1Hemg7QAAmMAA60ZBx_6LnL2x45Chi0E";
	$params = ["chat_id" => $chatID, "sticker" => $sticker];
	$tg->sendRequest("sendSticker", $params);
  $btn1 = $tg->buildReplyButton(["text" => "random word"]);
  $btn2 = $tg->buildReplyButton(["text" => "random image"]);
  $btn3 = $tg->buildReplyButton(["text" => "random phrese"]);
  $btn4 = $tg->buildReplyButton(["text" => "random song"]);
  $btn5 = $tg->buildReplyButton(["text" => "cancel"]);

	//Position of buttons on keyboard
	$buttons = [
		[$btn1, $btn2],
		[$btn3, $btn4],
		[$btn5],
	];
	$rm = $tg->buildReplyKeyboard($buttons);
	$params = ["chat_id" => $chatID, "text" => "here it's my list for today ", "reply_markup" => $rm];
	$tg->sendRequest("sendMessage", $params);

}


//Send simple text messages
if($text == "random word"){
	$params = ["chat_id" => $chatID, "text" => "i will send random word"];
	$tg->sendRequest("sendMessage", $params);
}

if($text == "random image"){
	$params = ["chat_id" => $chatID, "text" => "i will send random image"];
	$tg->sendRequest("sendMessage", $params);
}

if($text == "random phrese"){
	$params = ["chat_id" => $chatID, "text" => "i will send random phrese"];
	$tg->sendRequest("sendMessage", $params);
}

if($text == "random song"){
	$params = ["chat_id" => $chatID, "text" => "i will send random song"];
	$tg->sendRequest("sendMessage", $params);
}
if($text == "cancel"){
	$rm = $tg->removeReplyKeyboard();
  $params = ["chat_id" => $chatID, "text" => "Send /danu or just \"Danu\" if you want me again. 😊 ", "reply_markup" => $rm];
  $tg->sendRequest("sendMessage", $params);
}


?>