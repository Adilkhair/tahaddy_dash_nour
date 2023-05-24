<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
   
    use HasFactory;

    protected $fillable = [
        'question', 'is_active','topic_id' ,
    ];

    protected $with = ['question_choice'];
 
    public function question_choice()
     {
        return $this->hasMany('App\Models\Question_choice');
     } 
}
