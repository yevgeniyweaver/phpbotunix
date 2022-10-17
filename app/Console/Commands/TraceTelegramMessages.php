<?php

namespace App\Console\Commands;

use App\Services\TelegramService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use NotificationChannels\Telegram\TelegramUpdates;

class TraceTelegramMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trace-telegram-messages:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Trace telegram messages from chat and run commands';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(TelegramService $telegramService)
    {
        $telegramService->runCommands();
    }
}
