<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $lastname
 * @property string $username
 */
class RegisterResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'username' => $this->username
        ];
    }
}
