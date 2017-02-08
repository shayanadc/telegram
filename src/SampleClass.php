<?php

require 'TelegramMethod.php';
//echo realpath("test.txt");
    $n = new TelegramMethod('165148373:AAF1yKzVr0XVGqopSVDiPKWtNGX1sLY5J9g');
//    echo $n->message("sendMessage",['chat_id' => 28737977, 'text' => '$tex']);
//    echo $n->sendVenue(28737977,35.7261,51.3304,'taa','agag');
//    echo $n->sendLocation(28737977,35.7261,51.3304);
//    return $n->sendLocation(28737977,35.7261,51.3304);
//    return $n->getUpdates();

//    echo $n->sendButtonMessage(28737977,'125125');
//    echo $n->sendKeyboardMessage(28737977,'pop',[['gag','a']]);
//    echo $n->removeKeyboardMessage(28737977,'byby');
    return $n->sendPhoto(28737977,'gaga');
//    return $n->sendKeyboardButton(28737977,'gaga',[['text' => ['gha']]]);
//    return $n->getMe();
//    return $n->exeCURL();
