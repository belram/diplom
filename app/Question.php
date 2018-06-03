<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['topic', 'alias', 'question', 'author_question', 'author_email', 'author_answer', 'status', 'answer_created_at', 'question_created_at', 'topic_id', 'answer'];

	public function topic () 
	{
		return $this->belongsTo('App\Topic');
	}

	public function user () 
	{
		return $this->belongsTo('App\User');
	}

	public function scopeSameId($query, $id)
    {
        return $query->where('id', $id);
    }

	public function scopeSameTopicId($query, $id)
    {
        return $query->where('topic_id', $id);
    }

	public function scopeWaitAnswer($query)
    {
        return $query->where('status', 1);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 2);
    }

    public function scopeHidden($query)
    {
        return $query->where('status', 3);
    }

    public function scopeTotalCount($query)
    {
        return $query->where('status', '>', 0);
    }

}
