<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    public function view(User $user): bool
    {
        return $user->can('view:categories');
    }

    public function create(User $user): bool
    {
        return $user->can('create:categories');
    }

    public function edit(User $user): bool
    {
        return $user->can('edit:categories');
    }

    public function delete(User $user): bool
    {
        return $user->can('delete:categories');
    }
}
