<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cermat;
use Illuminate\Auth\Access\HandlesAuthorization;

class CermatPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_cermat');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cermat  $cermat
     * @return bool
     */
    public function view(User $user, Cermat $cermat): bool
    {
        return $user->can('view_cermat');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_cermat');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cermat  $cermat
     * @return bool
     */
    public function update(User $user, Cermat $cermat): bool
    {
        return $user->can('update_cermat');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cermat  $cermat
     * @return bool
     */
    public function delete(User $user, Cermat $cermat): bool
    {
        return $user->can('delete_cermat');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_cermat');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cermat  $cermat
     * @return bool
     */
    public function forceDelete(User $user, Cermat $cermat): bool
    {
        return $user->can('force_delete_cermat');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_cermat');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cermat  $cermat
     * @return bool
     */
    public function restore(User $user, Cermat $cermat): bool
    {
        return $user->can('restore_cermat');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_cermat');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cermat  $cermat
     * @return bool
     */
    public function replicate(User $user, Cermat $cermat): bool
    {
        return $user->can('replicate_cermat');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_cermat');
    }

}
