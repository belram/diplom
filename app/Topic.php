<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //

    protected $fillable = ['topic', 'alias'];

    public function questions () 
    {
        return $this->hasMany('App\Question');
    }

	public function scopeSameId($query, $id)
    {
        return $query->where('id', $id);
    }

	public function scopeSameTopic($query, $topic)
    {
        return $query->where('topic', $topic);
    }


}
