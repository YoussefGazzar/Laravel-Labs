<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            "post_id"=>$this->id,
            "title"=>$this->title,
            "description"=>$this->description,
            "user_id"=>$this->user->name,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
            "user"=>new UserResource($this->user)
        ];
    }
}
