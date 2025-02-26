<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class QR extends Model
{
    use HasUuids;
    protected $fillable = ['title', 'origin_domain', 'target_domain', 'status'];
    public $incrementing = false;
    protected $keyType = 'string';
}
