<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use App\Models\Post;


class PostPolicy{

    use HandlesAuthorization;

    /* NOTA los nombres importan, no son iguales a los de la URL/RUTAS */

    /** comprobar si el ID del usuario coincide con el user_id de la tarea.
     * Determine if the given user can delete the given task.
     *
     * @param  User  $user
     * @param  Post  $post
     * @return bool
     */
    public function eliminar(User $user, Post $post){
        return $user->id === $post->user_id;
    }

        /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return bool
     */
    public function update(User $user, Post $post){
        return $user->id === $post->user_id;
    }

}
