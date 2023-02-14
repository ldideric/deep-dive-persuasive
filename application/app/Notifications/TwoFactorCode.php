<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TwoFactorCode extends Notification
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Your two factor code is: '.$notifiable->two_factor_secret)
            ->action('Verify here', route('verify.index'))
            ->line('This code will expire in 10 minutes.')
            ->line('If you did not request a two factor code, no further action is required.');
    }
}
