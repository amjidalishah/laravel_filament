<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QR extends Model
{
    use HasUuids;
    protected $table = 'qrs'; 
    
    protected $fillable = ['title', 'origin_domain', 'target_domain', 'status'];
    public $incrementing = false;
    protected $keyType = 'string';
}
