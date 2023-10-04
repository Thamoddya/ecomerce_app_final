<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image_path' => $this->image_url,
            'role' => $this->role->name,
            'email_verification_state' => $this->email_verified == 1 ? "Verified" : "Not Verified",
            'email_verification_code' => $this->email_verified == 1 ? "Already Verified" : $this->verify_token,
        ];
    }
}
