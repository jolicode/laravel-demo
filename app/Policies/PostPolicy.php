<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function viewAdmin(User $user, Post $post): Response
    {
        return $user->id === $post->author_id
            ? Response::allow()
            : Response::deny('Posts can only be shown to their authors.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return Gate::allows('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return Gate::allows('admin') && $user->id === $post->author_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return Gate::allows('admin') && $user->id === $post->author_id;
    }

    //    /**
    //     * Determine whether the user can restore the model.
    //     */
    //    public function restore(User $user, Post $post): bool
    //    {
    //        //
    //    }
    //
    //    /**
    //     * Determine whether the user can permanently delete the model.
    //     */
    //    public function forceDelete(User $user, Post $post): bool
    //    {
    //        //
    //    }
}
