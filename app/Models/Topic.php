<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'status'
    ];

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
