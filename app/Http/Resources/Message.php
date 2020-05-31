<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users as UserResource;

class Message extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'from_user_id' => $this->from_user_id,
            'from_user' => new UserResource($this->fromUser),
            'to_user_id' => $this->to_user_id,
            'to_user' => new UserResource($this->toUser),
            'body' => $this->body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
