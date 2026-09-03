<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/employees/create');

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employee.profile');
