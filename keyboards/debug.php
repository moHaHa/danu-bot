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
if($text == "danu"){
  //Build buttons
	$params = ["chat_id" => $chatID, "text" => "I'm here 😏 ", "reply_markup" => $rm];
	$tg->sendRequest("sendMessage", $params);
	$params = ["chat_id" => $chatID, "text" => " قلي", "reply_markup" => $rm];
	$tg->sendRequest("sendMessage", $params);
  $btn1 = $tg->buildReplyButton(["text" => "random word"]);
  $btn2 = $tg->buildReplyButton(["text" => "random image"]);
  $btn3 = $tg->buildReplyButton(["text" => "random phrese"]);
  $btn4 = $tg->buildReplyButton(["text" => "random song"]);
}


//Position of buttons on keyboard
$buttons = [
    [$btn1, $btn2],
    [$btn3, $btn4],
];

// //Send a message with keyboard (reply_markup)
// $params = ["chat_id" => $chatID, "text" =>  json_encode($result), "reply_markup" => $rm];
// $tg->sendRequest("sendMessage", $params);


$sticker = "CAACAgQAAxkBAAPNY6_vQL9pvU2Y1tiSqExG1Hemg7QAAmMAA60ZBx_6LnL2x45Chi0E";
$params = ["chat_id" => $chatID, "sticker" => $sticker];
$tg->sendRequest("sendSticker", $params);


?>
