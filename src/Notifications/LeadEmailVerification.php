<?php

namespace VasilGerginski\FilamentLandingPages\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeadEmailVerification extends Notification implements ShouldQueue
{
    use Queueable;

    public ?string $customSubject;

    public function __construct(?string $customSubject = null)
    {
        $this->customSubject = $customSubject;
    }

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $verificationUrl = $this->buildVerificationUrl($notifiable);
        $locale = app()->getLocale();

        $subject = $this->customSubject
            ?? ($locale === 'bg' ? 'Потвърдете вашия имейл адрес' : 'Verify Your Email Address');

        return (new MailMessage)
            ->subject($subject)
            ->greeting($locale === 'bg' ? 'Здравейте, '.$notifiable->name.'!' : 'Hello, '.$notifiable->name.'!')
            ->line($locale === 'bg'
                ? 'Благодарим ви за интереса към нашите услуги! Моля, потвърдете вашия имейл адрес, като кликнете върху бутона по-долу.'
                : 'Thank you for your interest in our services! Please verify your email address by clicking the button below.')
            ->action($locale === 'bg' ? 'Потвърдете имейл адреса' : 'Verify Email Address', $verificationUrl)
            ->line($locale === 'bg'
                ? 'Ако не сте заявили този имейл, моля игнорирайте това съобщение.'
                : 'If you did not create this request, please ignore this email.');
    }

    protected function buildVerificationUrl(object $notifiable): string
    {
        $localePrefix = config('filament-landing-pages.routes.locale_prefix', false);
        $prefix = $localePrefix ? '/'.app()->getLocale() : '';

        return url($prefix.'/verify-lead-email/'.$notifiable->id.'/'.$notifiable->email_verification_token);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'lead_id' => $notifiable->id,
        ];
    }
}
