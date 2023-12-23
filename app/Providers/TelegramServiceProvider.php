<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TelegramService;
use Telegram\Bot\Api;

class TelegramServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TelegramService::class, function ($app) {
            $telegram = new Api(config('services.telegram.bot_token'));
            return new TelegramService($telegram);
        });

        // Add this alias
        $this->app->alias(TelegramService::class, 'telegram');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
