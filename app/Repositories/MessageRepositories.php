<?php


namespace App\Repositories;


use App\Message;

class MessageRepositories
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }

    public function byId($id)
    {
        return Message::find($id);
    }

}
