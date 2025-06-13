<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\OrdersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api', 'auth:sanctum']], function () {
    Route::post(
        '/userById',
        [\App\Http\Controllers\APIs\UserController::class, 'userById']
    )->name('user.by.id');

    Route::post(
        '/userWithDatatable',
        [\App\Http\Controllers\APIs\UserController::class, 'userWithDatatable']
    )->name('user.with.datatable');
});

Route::put('/users/update', [
    \App\Http\Controllers\APIs\UserController::class,
    'updateApi'
])->name('user.update');

Route::delete('/users/delete', [
    \App\Http\Controllers\APIs\UserController::class,
    'deleteApi'
])->name('user.delete');

Route::post('orders/data/list', [
    \App\Http\Controllers\APIs\OrdersController::class,
    'orderDataTable'
])->name('orders.data.list');

Route::delete('/orders/{id}', [
    \App\Http\Controllers\APIs\OrdersController::class,
    'deleteApi'
])->name('orders.delete');

Route::put('/orders/update', [
    \App\Http\Controllers\APIs\OrdersController::class,
    'updateOrderApi'
])->name('order.update');

Route::get('/orders/{orderId}', [OrdersController::class, 'show']);
Route::delete('/orderitems/delete/{id}', [\App\Http\Controllers\APIs\OrderitemsController::class, 'deleteDrink']);
Route::put('/orderitems/update/{id}', [\App\Http\Controllers\APIs\OrderitemsController::class, 'editQuantity']);
Route::put('/orderitems/editDrink/{id}', [\App\Http\Controllers\APIs\OrderitemsController::class, 'editDrink']);
// Route::post('/orderitems/addDrink', [\App\Http\Controllers\APIs\OrderitemsController::class, 'addDrinkToOrder']);

