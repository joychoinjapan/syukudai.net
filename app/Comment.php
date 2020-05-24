<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable =['user_id','body','commentable_id'.'commenttable_type'];

    public function commentable()
    {
        return $this->morphTo();
    }

}
