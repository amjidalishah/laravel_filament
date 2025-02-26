<?php

 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class QRCode extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'user_id', 'name', 'url'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($qrcode) {
            $qrcode->uuid = Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
