<?php

namespace App\Policies;

use App\Models\User;
use App\Models\qrcode;
use Illuminate\Auth\Access\Response;

class QRCodePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return  $user->hasRole(['Admin','Manager','User']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, qrcode $qrcode): bool
    {
        //
        return  $user->hasRole(['Admin','Manager','User']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return  $user->hasRole(['Admin','Manager','User']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, qrcode $qrcode): bool
    {
        //
        return  $user->hasRole(['Admin','Manager' ]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, qrcode $qrcode): bool
    {
        //
        return  $user->hasRole(['Admin','Manager' ]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, qrcode $qrcode): bool
    {
        //
        return  $user->hasRole(['Admin','Manager' ]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, qrcode $qrcode): bool
    {
        //
        return  $user->hasRole(['Admin','Manager' ]);
    }
}
