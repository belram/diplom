<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['topic', 'alias', 'question', 'author_question', 'author_email', 'author_answer', 'status', 'answer_created_at'];
}
