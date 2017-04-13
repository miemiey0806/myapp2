<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user) //method
    {
        return [
            'Phone Number'=>$user->phone,
            'email'=>$user->email,
            'Password'=>$user->password,
            'Updated'=>$user->updated_at->diffForHumans(),


        ];
    }
}
