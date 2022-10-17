<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use NotificationChannels\Telegram\TelegramUpdates;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class TelegramService
{
    private $messageText = '';
    private $updates = [];
    private $chatId = null;
    const TELEGRAM_BOT_LAST_ID = 'telegram.bot.lastId';
    const PATH_TO_COMMON = "/scripts/hello.sh";
    const PATH_TO_SPECIALS = "/scripts/other.sh";
    const PATH_TO_DEFAULT = "/scripts/default.sh";

    private const COMMON_MESSAGES = [
        'hello',
        'привет',
        'hi',
        'привіт'
    ];

    public function runCommands() {

        $updates = $this->getUpdates();
        $this->setUpdateId($updates);
        $this->checkAndRun();

    }

    public function checkAndRun(string $message = ''): void {

        $message = !empty($message) ? $message : $this->messageText;

        if (in_array(strtolower($message), self::COMMON_MESSAGES)) {
            $pathToFile = self::PATH_TO_COMMON;
        } else if (strlen($message) === 3) {
            $pathToFile = self::PATH_TO_SPECIALS;
        } else {
            $pathToFile = self::PATH_TO_DEFAULT;
        }

        $file = '.' . $pathToFile;

        $process = new Process([$file]);
        try {
            $process->mustRun();
            $output = $process->getOutput();
            Log::info("run:trace-telegram $file Complete!!!");
        } catch (ProcessFailedException $exception) {
            Log::error('run:trace-telegram Error: ' . $exception->getMessage());
        }

    }

    public function getUpdates(): array {

        $updates = TelegramUpdates::create()
            ->limit(1)
            ->latest()
            // (Optional). Add more params to the request.
            ->options(['timeout' => 0,])
            ->get();

        return $updates ?? [];
    }

    public function setUpdateId(array $updatesArray): void {

        if (!empty($updatesArray) && $updatesArray['ok']) {

            $chatId = $updatesArray['result'][0]['message']['chat']['id'];
            $lastUpdateId = $updatesArray['result'][0]['update_id'];
            $text = $updatesArray['result'][0]['message']['text'];

            if (!Cache::has(self::TELEGRAM_BOT_LAST_ID)) {
                Cache::put(self::TELEGRAM_BOT_LAST_ID, $lastUpdateId);
                $this->messageText = $text ?? '';
            }

            if ($lastUpdateId !== Cache::get(self::TELEGRAM_BOT_LAST_ID)) {
                Cache::put(self::TELEGRAM_BOT_LAST_ID, $lastUpdateId);
                $this->messageText = $text ?? '';
            }
        }
    }

    public function sendMessage() {}

}
