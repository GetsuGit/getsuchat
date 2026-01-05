<?php

namespace App\Policies;

use App\Models\ChatModel;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GetsuChatPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ChatModel $chatmodel): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ChatModel $chatmodel): bool
    {
        // Logika: User hanya boleh update jika id-nya sama dengan user_id di getsuchat
        // dd($user->id, $chatmodel->user_id);
        return $user->id === $chatmodel->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ChatModel $chatmodel): bool
    {
        return $user->id === $chatmodel->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ChatModel $chatmodel): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ChatModel $chatmodel): bool
    {
        return false;
    }
}
