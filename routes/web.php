<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/',[UserController::class,"showDashboard"] );
Route::get('/dashboard',[UserController::class,"showDashboard"] );
Route::post('/login',[UserController::class,"checkLogin"] );
Route::get('/signUp',[UserController::class,"register"] );
Route::post('/register',[UserController::class,"getVal"] );
Route::post('/logout',[UserController::class,"logout"] );
Route::get('/addIncome',[UserController::class,"addIncome"] );
Route::post('/addIncomeData',[UserController::class,"addIncomeData"] );
Route::get('/addExpense',[UserController::class,"addExpense"] );
Route::post('/addExpenseData',[UserController::class,"addExpenseData"] );
Route::get('/showTransactions',[UserController::class,"showTransactions"] );

Route::get("/piechart",function(Request $request){
    return view("pie-chart");
});
