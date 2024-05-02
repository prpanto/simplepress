<?php

namespace App\Policies;

use App\Models\User;

class EmployeePolicy
{
    public function view(User $user): bool
    {
        return $user->can('view:employees');
    }
    
    public function create(User $user): bool
    {
        return $user->can('create:employees');
    }

    public function edit(User $user): bool
    {
        return $user->can('edit:employees');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete:companies');
    }
}
