<?php

use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Employee;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth']], function () {
    Route::view('dashboard', 'dashboard')
        ->name('dashboard');
    Route::view('profile', 'profile')
        ->name('profile');

    Route::view('companies', 'companies.index')
        ->middleware('role:admin|moderator|user')
        ->name('companies.index');
    Route::view('companies/create', 'companies.create')
        ->middleware('role:admin')
        ->name('companies.create');
    Route::get('/companies/{id}/edit', function ($id) {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    })
        ->middleware('role:admin|moderator')
        ->name('companies.edit');
    
    Route::view('employees', 'employees.index')
        ->middleware('role:admin|moderator|user')
        ->name('employees.index');
    Route::view('employees/create', 'employees.create')
        ->middleware('role:admin')
        ->name('employees.create');
    Route::get('/employees/{id}/edit', function ($id) {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    })
        ->middleware('role:admin|moderator')
        ->name('employees.edit');
    
    Route::view('categories', 'categories.index')
        ->middleware('role:admin|moderator|user')
        ->name('categories.index');
    Route::view('categories/create', 'categories.create')
        ->middleware('role:admin')
        ->name('categories.create');
    Route::get('/categories/{id}/edit', function ($id) {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    })
        ->middleware('role:admin|moderator')
        ->name('categories.edit');
});

require __DIR__.'/auth.php';
