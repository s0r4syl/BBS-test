<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can store posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function store(User $user)
    {
        //
    }

     /**
     * Determine whether the user can edit the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function edit(User $user, Post $post)
    {
        return $user->name === $post->user_name;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->name === $post->user_name;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function destroy(User $user, Post $post)
    {
        return $user->name === $post->user_name;
    }

}
