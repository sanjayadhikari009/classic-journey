<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'mobile_number',
        'balance',
        'journey',
        'maximum_journey',
        'level',
        'commission',
        'level_stop',
        'journey_lock_at',
        'referral_by',
        'referral_code',
        'last_login_at',
        // New user settings fields
        'language',
        'currency',
        'timezone',
        'date_format',
        'email_notifications',
        'sms_notifications',
        'marketing_emails',
        'booking_confirmations',
        'price_alerts',
        'profile_visible',
        'reviews_visible',
        'activity_status',
        'avatar',
        'bio',
        'location',
        'date_of_birth',
        'gender',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'date_of_birth' => 'date',
            'email_notifications' => 'boolean',
            'sms_notifications' => 'boolean',
            'marketing_emails' => 'boolean',
            'booking_confirmations' => 'boolean',
            'price_alerts' => 'boolean',
            'profile_visible' => 'boolean',
            'reviews_visible' => 'boolean',
            'activity_status' => 'boolean',
            'is_admin' => 'boolean',
        ];
    }

    public function bank()
    {
        return $this->hasOne(UserBank::class);
    }

    public function order()
    {
        return $this->hasOne(UserOrder::class);
    }

    public function orders()
    {
        return $this->hasMany(UserOrder::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposite::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name;
    }

    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        foreach ($names as $name) {
            $initials .= strtoupper(substr($name, 0, 1));
        }
        return substr($initials, 0, 2);
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=ffffff&background=10b981';
    }
}
