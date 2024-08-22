<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PasswordResetListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $user = $event->user;

        // Логирование информации о сбросе пароля
        Log::info('Пользователю ' . $user->email . ' был сброшен пароль.');

        // Проверка отправки письма
        if ($event->user && $event->user->wasRecentlyCreated) {
            Log::info('Письмо с новым паролем успешно отправлено.');
        } else {
            Log::error('Ошибка при отправке письма с новым паролем.');
        }
    }
}
