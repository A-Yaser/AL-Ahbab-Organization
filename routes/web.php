<?php

use App\Http\Controllers\Admin\InstituteController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TesterController;
use App\Http\Controllers\CenterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('testers')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TesterController::class, 'index'])->name('testers.index');
    Route::get('/create', [TesterController::class, 'create'])->name('testers.create');
    Route::post('/', [TesterController::class, 'store'])->name('testers.store');
    Route::get('/{tester}', [TesterController::class, 'show'])->name('testers.show');
    Route::get('/{tester}/edit', [TesterController::class, 'edit'])->name('testers.edit');
    Route::put('/{tester}', [TesterController::class, 'update'])->name('testers.update');
    Route::delete('/{tester}', [TesterController::class, 'destroy'])->name('testers.destroy');
});


Route::prefix('institutes')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [InstituteController::class, 'index'])->name('institutes.index');
    Route::get('/create', [InstituteController::class, 'create'])->name('institutes.create');
    Route::post('/', [InstituteController::class, 'store'])->name('institutes.store');
    Route::get('/{institute}', [InstituteController::class, 'show'])->name('institutes.show');
    Route::get('/{institute}/edit', [InstituteController::class, 'edit'])->name('institutes.edit');
    Route::put('/{institute}', [InstituteController::class, 'update'])->name('institutes.update');
    Route::delete('/{institute}', [InstituteController::class, 'destroy'])->name('institutes.destroy');
});


Route::prefix('students')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::prefix('groups')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [GroupController::class, 'index'])->name('groups.index');
    Route::get('/create', [GroupController::class, 'create'])->name('groups.create');
    Route::post('/', [GroupController::class, 'store'])->name('groups.store');
    Route::get('/{group}', [GroupController::class, 'show'])->name('groups.show');
    Route::get('/{group}/edit', [GroupController::class, 'edit'])->name('groups.edit');
    Route::put('/{group}', [GroupController::class, 'update'])->name('groups.update');
    Route::delete('/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');
});



Route::prefix('centers')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [CenterController::class, 'index'])->name('centers.index');
    Route::get('/create', [CenterController::class, 'create'])->name('centers.create');
    Route::post('/', [CenterController::class, 'store'])->name('centers.store');
    Route::get('/{center}', [CenterController::class, 'show'])->name('centers.show');
    Route::get('/{center}/edit', [CenterController::class, 'edit'])->name('centers.edit');
    Route::put('/{center}', [CenterController::class, 'update'])->name('centers.update');
    Route::delete('/{center}', [CenterController::class, 'destroy'])->name('centers.destroy');
});

Route::prefix('teachers')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});
require __DIR__ . '/auth.php';
