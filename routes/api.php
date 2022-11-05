<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
});


Route::get('/customers', [CustomerController::class, 'index']);
Route::get('customers/{id}', [CustomerController::class, 'show']);
Route::post('customers', [CustomerController::class, 'create']);
Route::patch('customers/{id}', [CustomerController::class, 'update']);
Route::delete('customers/{id}', [CustomerController::class, 'delete']);


Route::get('/notes', [NoteController::class, 'index']);
Route::get('notes/{note_id}', [NoteController::class, 'show']);
Route::get('notes/Customer/{customer_id}', [NoteController::class, 'customer_index']);
Route::post('notes', [NoteController::class, 'create']);
Route::patch('notes/{note_id}', [NoteController::class, 'update']);
Route::delete('notes/{note_id}', [NoteController::class, 'delete']);


Route::get('/invoices', [InvoiceController::class, 'index']);
Route::get('invoices/{invoice_id}', [InvoiceController::class, 'show']);
Route::get('invoices/Customer/{customer_id}', [InvoiceController::class, 'customer_index']);
Route::post('invoices', [InvoiceController::class, 'create']);
Route::patch('invoices/{invoice_id}', [InvoiceController::class, 'update']);
Route::delete('invoices/{invoice_id}', [InvoiceController::class, 'delete']);



Route::get('/projects', [ProjectController::class, 'index']);
Route::get('projects/{project_id}', [ProjectController::class, 'show']);
Route::get('projects/Customer/{project_id}', [ProjectController::class, 'customer_index']);
Route::post('/customer/{customer_id}/projects', [ProjectController::class, 'create']);
Route::patch('projects/{project_id}', [ProjectController::class, 'update']);
Route::delete('projects/{projects_id}', [ProjectController::class, 'delete']);


Route::post('/users/create', [UserController::class,'create']);
Route::get('/users',[UserController::class, 'index']);
