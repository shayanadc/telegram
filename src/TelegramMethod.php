<?php

require 'TelegramConnector.php';

class TelegramMethod
{
    protected $tConnector;

    public function __construct()
    {
        $this->tConnector = new TelegramConnector(getenv('TOKEN'));
    }

    public function sendingTelegramMessage($method, $params = [])
    {
        return $this->tConnector->exeCURL($method, $params);
    }

    public function getWebHookInfo($params = [])
    {
        return $this->sendingTelegramMessage("getWebhookInfo", $params);
    }
    public function setWebHook($url, $params = [])
    {
        $items = array_merge($params, ['url' => $url]);

        return $this->sendingTelegramMessage("setWebhook", $items);
    }
    public function deleteWebHook($params = []){
        return $this->sendingTelegramMessage("deleteWebhook", $params);
    }

    public function getMe($params = [])
    {
        return $this->sendingTelegramMessage("getMe", $params);
    }

    public function sendMessage($chatId, $tex, $params = [])
    {
        $items = array_merge($params, ['chat_id' => $chatId, 'text' => $tex]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }

    public function getUpdates($params = [])
    {
        return $this->sendingTelegramMessage("getUpdates", $params);
    }

    public function sendPhoto($chatId, $caption, $photo, $params = [])
    {
        $items = array_merge($params, ['chat_id' => $chatId, 'caption' => $caption, 'photo' => $photo]);

        return $this->sendingTelegramMessage("sendPhoto", $items);
    }

    public function sendLocation($chatId, $latitude, $longitude, $params = [])
    {
        $items = array_merge($params, ['latitude' => $latitude, 'longitude' => $longitude, 'chat_id' => $chatId]);

        return $this->sendingTelegramMessage("sendLocation", $items);
    }

    public function forwardMessage($chatId, $from, $messageId, $params = [])
    {
        $items = array_merge($params, ['chat_id' => $chatId, 'from_chat_id' => $from, 'message_id' => $messageId]);

        return $this->sendingTelegramMessage("forwardMessage", $items);
    }

    public function sendContact($chatId, $phoneNumber, $firstName, $params = [])
    {
        $items = array_merge($params, ['chat_id' => $chatId, 'phone_number' => $phoneNumber, 'first_name' => $firstName]);

        return $this->sendingTelegramMessage("sendContact", $items);
    }

    public function sendVenue($chatId, $latitude, $longitude, $title, $address, $params = [])
    {
        $items = array_merge($params, ['latitude' => $latitude, 'longitude' => $longitude, 'chat_id' => $chatId, 'title' => $title, 'address' => $address]);

        return $this->sendingTelegramMessage("sendVenue", $items);
    }

    public function keyboardArray($keyboardArray, $resizeKeyboard = true, $oneTimeKeyboard = false, $selective = true, $params = [])
    {
        return (object)(['keyboard' => $keyboardArray, 'resize_keyboard' => $resizeKeyboard, 'one_time_keyboard' => $oneTimeKeyboard, 'selective' => $selective]);
    }

    public function sendKeyboardMessage($chatId, $text, $keyboardArray, $resizeKeyboard = true, $oneTimeKeyboard = false, $selective = true, $params = [])
    {
        $keyboard = $this->keyboardArray($keyboardArray, $resizeKeyboard, $oneTimeKeyboard, $selective, $params);
        $items = array_merge($params, ['chat_id' => $chatId, 'text' => $text, 'reply_markup' => $keyboard]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }

    public function removeKeyboardMessage($chatId, $text, $selective = true, $params = [])
    {
        $removeKeyboard = (object)(['remove_keyboard' => true, 'selective' => $selective]);
        $items = array_merge($params, ['chat_id' => $chatId, 'text' => $text, 'reply_markup' => $removeKeyboard]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }

    public function forceReply($selective = true)
    {
        return (object)(['force_reply' => true, 'selective' => $selective]);
    }

    public function sendForceReply($chatId, $text, $selective = false, $params = [])
    {
        $forceReply = $this->forceReply($selective);
        $items = array_merge($params, ['chat_id' => $chatId, 'text' => $text, 'reply_markup' => $forceReply]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }

    public function sendKeyboardButton($chatId, $text, $keys, $params = [])
    {
//        [['text' => 'ol','request_location' => true],['text' => 'lko']]
        foreach ($keys as $key) {
            $keys[] = (object)$key;
        }
        $keyboardButtons = (object)(['keyboard' => [$keys]]);
        $items = array_merge($params, ['chat_id' => $chatId, 'text' => $text, 'reply_markup' => $keyboardButtons]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }

    public function sendButtonMessage($chatId, $text, $buttons, $params = [])
    {
//        [['text' => 'qweeeeeeee', 'callback_data' => "http://gwoogle.com"], ['text' => 'rwewwwww', 'callback_data' => "http://gwoogle.com"]]
        foreach ($buttons as $button) {
            $keys[] = (object)($button);
        }
        $keyboard = (object)(['inline_keyboard' => [$keys]]);
        $items = array_merge($params, ['chat_id' => $chatId, 'text' => $text, 'reply_markup' => $keyboard]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }

    public function sendChatAction($chatId, $action, $params = [])
    {
        $items = array_merge($params, ['chat_id' => $chatId, 'action' => $action]);

        return $this->sendingTelegramMessage("sendChatAction", $items);
    }

    public function answerCallbackQuery($callbackQueryId, $text, $params = [])
    {
        $items = array_merge($params, ['callback_query_id' => $callbackQueryId, 'text' => $text]);

        return $this->sendingTelegramMessage("sendMessage", $items);
    }
}