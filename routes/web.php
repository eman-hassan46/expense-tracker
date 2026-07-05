
<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Hello Eman! My first Laravel route is working!";
});

Route::get('/expenses', [ExpenseController::class, 'index']);

Route::post('/expenses', [ExpenseController::class, 'store']);
Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy']);
Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit']);
Route::put('/expenses/{id}', [ExpenseController::class, 'update']);