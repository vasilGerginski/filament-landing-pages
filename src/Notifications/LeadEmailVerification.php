<?php

namespace VasilGerginski\FilamentLandingPages\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadEmailVerification extends Notification implements ShouldQueue
{
    use Queueable;

    public string $token;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $locale = app()->getLocale();
        $verificationUrl = url('/'.$locale.'/verify-email/'.$notifiable->id.'/'.sha1($notifiable->email));

        return (new MailMessage)
            ->subject($locale === 'bg' ? 'Потвърдете вашия имейл адрес' : 'Verify Your Email Address')
            ->greeting($locale === 'bg' ? 'Здравейте, '.$notifiable->name.'!' : 'Hello, '.$notifiable->name.'!')
            ->line($locale === 'bg'
                ? 'Благодарим ви за интереса към нашите услуги! Моля, потвърдете вашия имейл адрес, като кликнете върху бутона по-долу.'
                : 'Thank you for your interest in our services! Please verify your email address by clicking the button below.')
            ->action($locale === 'bg' ? 'Потвърдете имейл адреса' : 'Verify Email Address', $verificationUrl)
            ->line($locale === 'bg'
                ? 'Ако не сте заявили този имейл, моля игнорирайте това съобщение.'
                : 'If you did not create this request, please ignore this email.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'token' => $this->token,
        ];
    }
}
