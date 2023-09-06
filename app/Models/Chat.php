<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'created_by',
    ];

    protected $casts = [
        'is_private' => 'boolean'
    ];

    public function owner() {
        return $this->belongsTo(User::class,'created_by', 'id');
    }


    public function members() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
