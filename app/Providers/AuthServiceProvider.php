<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($object, $url) {
            return (new MailMessage)
                ->from('contact@еип-фкис.рф', 'Всероссийский форум ШСК')
                ->subject('Подтверждение адреса электронной почты')
//                ->greeting('Здравствуйте!')
//                ->line('Вы получили данное письмо, так как прошли регистрацию на E-ФОРМА. Подтвердите адрес электронной почты')
//                ->action('Подтвердить', $url)
//                ->line('Если вы не создавали учетную запись, никаких дальнейших действий не требуется.')
                ->markdown('mail.verify_email', ['url' => $url]);
        });
    }
}
