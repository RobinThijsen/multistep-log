<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plan_id',
        'plan_recurrence_id',
        'name',
        'email',
        'phone',
        'password',
        'email_verified_at',
        'plan_started_at',
        'plan_ended_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
        ];
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function planRecurrence()
    {
        return $this->belongsTo(PlanRecurrence::class);
    }

    public function planAddons()
    {
        return $this->belongsToMany(PlanAddon::class);
    }
}
