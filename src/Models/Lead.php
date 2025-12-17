<?php

namespace VasilGerginski\FilamentLandingPages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use VasilGerginski\FilamentLandingPages\Contracts\LeadModelContract;

/**
 * @property int $id
 * @property string $name
 * @property string|null $phone
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $email_verification_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Lead extends Model implements LeadModelContract
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'email_verified_at',
        'email_verification_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get validation rules for lead form
     */
    public static function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
        ];
    }

    /**
     * Check if lead's email is verified
     */
    public function hasVerifiedEmail(): bool
    {
        return ! is_null($this->email_verified_at);
    }

    /**
     * Mark the lead's email as verified
     */
    public function markEmailAsVerified(): bool
    {
        return $this->forceFill([
            'email_verified_at' => now(),
            'email_verification_token' => null,
        ])->save();
    }

    /**
     * Generate a new email verification token
     */
    public function generateEmailVerificationToken(): string
    {
        $token = Str::random(60);
        $this->update(['email_verification_token' => $token]);

        return $token;
    }

    /**
     * Route notifications for the mail channel.
     */
    public function routeNotificationForMail(): string
    {
        return $this->email;
    }
}
