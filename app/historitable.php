<?php
/**
 * Created by PhpStorm.
 * User: jit
 * Date: 11/06/2020
 * Time: 12:32 م
 */

namespace App;


trait historitable
{


    public function addToFavorite($user)
    {

            $this->favorites()->create([
                'user_id' => $user->id,
                'film_id' => $this->id,
            ]);
            return TRUE;
    }

   

}