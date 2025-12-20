<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConnectedAccount extends Model
{
    protected $fillable = [
        'user_id',
        'email_provider_id',
        'provider_user_id',
        'name',
        'email',
        'avatar',
        'token',
        'refresh_token',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(EmailProvider::class, 'email_provider_id');
    }
}