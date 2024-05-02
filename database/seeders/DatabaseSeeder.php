<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $moderator = Role::create(['name' => 'moderator']);
        $user = Role::create(['name' => 'user']);

        $createUsers = Permission::create(['name' => 'create:users']);
        $viewUsers = Permission::create(['name' => 'view:users']);
        $editUsers = Permission::create(['name' => 'edit:users']);
        $deleteUsers = Permission::create(['name' => 'delete:users']);
        $createCompanies = Permission::create(['name' => 'create:companies']);
        $addCompanyCategories = Permission::create(['name' => 'add:company-categories']);
        $viewCompanies = Permission::create(['name' => 'view:companies']);
        $editCompanies = Permission::create(['name' => 'edit:companies']);
        $deleteCompanies = Permission::create(['name' => 'delete:companies']);
        $createEmployees = Permission::create(['name' => 'create:employees']);
        $viewEmployees = Permission::create(['name' => 'view:employees']);
        $editEmployees = Permission::create(['name' => 'edit:employees']);
        $deleteEmployees = Permission::create(['name' => 'delete:employees']);
        $createCategories = Permission::create(['name' => 'create:categories']);
        $viewCategories = Permission::create(['name' => 'view:categories']);
        $editCategories = Permission::create(['name' => 'edit:categories']);
        $deleteCategories = Permission::create(['name' => 'delete:categories']);

        $admin->givePermissionTo([
            $createUsers,
            $viewUsers,
            $editUsers,
            $deleteUsers,
            $createCompanies,
            $addCompanyCategories,
            $viewCompanies,
            $editCompanies,
            $deleteCompanies,
            $createEmployees,
            $viewEmployees,
            $editEmployees,
            $deleteEmployees,
            $createCategories,
            $viewCategories,
            $editCategories,
            $deleteCategories,
        ]);

        $moderator->givePermissionTo([
            $viewCompanies,
            $editCompanies,
            $viewEmployees,
            $editEmployees,
        ]);

        $user->givePermissionTo([
            $viewCompanies,
            $viewEmployees,
        ]);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('admin');

        $moderator = User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
        ]);
        $moderator->assignRole('moderator');

        $user = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);
        $user->assignRole('user');
        
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('user');
        });

        Company::factory(1000)->create()->each(function ($company) {
            $categories = Category::factory(rand(1, 5))->create();
            $company->categories()->sync($categories);
        });

        Employee::factory(1000)->create();
    }
}
