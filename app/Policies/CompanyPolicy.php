<?php

namespace App\Policies;

use App\Models\User;

class CompanyPolicy
{
    public function view(User $user): bool
    {
        return $user->can('view:companies');
    }

    public function create(User $user): bool
    {
        return $user->can('create:companies');
    }

    public function edit(User $user): bool
    {
        return $user->can('edit:companies');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete:companies');
    }
}
