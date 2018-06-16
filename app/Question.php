<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['topic', 'alias', 'question', 'author_question', 'author_email', 'author_answer', 'status_id', 'answer_created_at', 'topic_id', 'answer', 'created_at'];

	public function topic () 
	{
		return $this->belongsTo('App\Topic');
	}

	public function user () 
	{
		return $this->belongsTo('App\User');
	}

    public function status () 
    {
        return $this->belongsTo('App\Status');
    }

	public function scopeSameTopicId($query, $id)
    {
        return $query->where('topic_id', $id);
    }

	public function scopeWaitAnswer($query)
    {
        return $query->where('status_id', 1);
    }

    public function scopePublished($query)
    {
        return $query->where('status_id', 2);
    }

    public function scopeHidden($query)
    {
        return $query->where('status_id', 3);
    }

    public function scopeTotalCount($query)
    {
        return $query->where('status_id', '>', 0);
    }


}
