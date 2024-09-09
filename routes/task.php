<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('task')->middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('task.index');
    Route::post('/', [TaskController::class, 'store'])->name('task.store');

    Route::patch('/{task}', [TaskController::class, 'update'])->name('task.update');
    Route::delete('/{task}', [TaskController::class, 'delete'])->name('task.destroy');
});
