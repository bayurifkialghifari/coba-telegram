<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    // Get BOT info
    public function getMe() {
        $response = Telegram::getMe();
        dd($response);
    }

    // Set webhook
    public function setWebhook() {
        $url = config('app.url') . '/tg/handle';
        $response = Telegram::setWebhook(['url' => $url]);
        dd($response);
    }

    // Remove webhook
    public function removeWebhook() {
        $response = Telegram::removeWebhook();
        dd($response);
    }

    // Get webhook info
    public function getWebhookInfo() {
        $response = Telegram::getWebhookInfo();
        dd($response);
    }

    // Handle webhook
    public function handleRequest(Request $request) {
        $update = Telegram::commandsHandler(true);
        $this->sendMessage($update);
        // $this->sendPhoto($update);
        // $this->sendDocument($update);
        // $this->sendAudio($update);
        // $this->sendVideo($update);
        // $this->sendVoice($update);
        // $this->sendSticker($update);
        // $this->sendLocation($update);
        // $this->sendChatAction($update);

        return 'ok';
    }

    // Send message
    public function sendMessage($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $firstName = $message->getChat()->getFirstName();
        $lastName = $message->getChat()->getLastName();
        $text = $message->getText();
        $response = Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'Hello ' . $firstName . ' ' . $lastName . '!',
        ]);
        $response = Telegram::sendMessage([
            'chat_id' => $chatId,
            'text' => 'You said: ' . $text,
        ]);
    }

    // Send photo
    public function sendPhoto($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $photo = 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png';
        $response = Telegram::sendPhoto([
            'chat_id' => $chatId,
            'photo' => $photo,
        ]);
    }

    // Send document
    public function sendDocument($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $document = 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf';
        $response = Telegram::sendDocument([
            'chat_id' => $chatId,
            'document' => $document,
        ]);
    }

    // Send audio
    public function sendAudio($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $audio = 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3';
        $response = Telegram::sendAudio([
            'chat_id' => $chatId,
            'audio' => $audio,
        ]);
    }

    // Send video
    public function sendVideo($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $video = 'https://www.sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4';
        $response = Telegram::sendVideo([
            'chat_id' => $chatId,
            'video' => $video,
        ]);
    }

    // Send voice
    public function sendVoice($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $voice = 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3';
        $response = Telegram::sendVoice([
            'chat_id' => $chatId,
            'voice' => $voice,
        ]);
    }

    // Send sticker
    public function sendSticker($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $sticker = 'https://www.gstatic.com/webp/gallery/1.webp';
        $response = Telegram::sendSticker([
            'chat_id' => $chatId,
            'sticker' => $sticker,
        ]);
    }

    // Send location
    public function sendLocation($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $latitude = 37.422;
        $longitude = -122.084;
        $response = Telegram::sendLocation([
            'chat_id' => $chatId,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    // Send chat action
    public function sendChatAction($update) {
        $message = $update->getMessage();
        $chatId = $message->getChat()->getId();
        $action = 'typing';
        $response = Telegram::sendChatAction([
            'chat_id' => $chatId,
            'action' => $action,
        ]);
    }
}
