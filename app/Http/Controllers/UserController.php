<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){
        return view('register');
    }

    public function showDashboard(){
       if(auth()->check()){
        return view('dashboard');
       }else{
        return view('login');
       }
    }

    public function login(){
        return view('login');
    }
    public function logout(){
        auth()->logout();
        return redirect("/");
    }

    public function checkLogin(Request $request){
        $incomingDatas=$request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(auth()->attempt(['username'=>$incomingDatas['username'],'password'=>$incomingDatas['password']])){
            $request->session()->regenerate();
            return redirect("/dashboard");
        }else{
            return back()->with('error','Invalid Username or Password');
        }
    }

    public function addIncome(Request $request){
        return view('addincome');
    }

    public function addExpense(Request $request){
        return view('addexpense');
    }
    public function showTransactions(Request $request){
        return view('showtransactions');
    }

    public function addIncomeData(Request $request){
        $incomingDatas=$request->validate([
            'incomeName' => ['required'],
            'incomeAmount' => ['required'],
            'incomeDate' => ['required'],
            'incomeCategory' => ['required']
        ]);

        $incomeDetails = [
            'incomeName' => $incomingDatas['incomeName'],
            'incomeAmount' => intval($incomingDatas['incomeAmount']),
            'incomeDate' => $incomingDatas['incomeDate'],
            'incomeCategory' => $incomingDatas['incomeCategory']
        ];
        // $expenseDetails = [
            
        // ];

        $user = auth()->user();
        $user->addIncome($incomeDetails);

        return redirect("/");
    }

    public function addExpenseData(Request $request){
        $incomingDatas=$request->validate([
            'expenseName' => ['required'],
            'expenseAmount' => ['required'],
            'expenseDate' => ['required'],
            'expenseCategory' => ['required']
        ]);

        $incomeDetails = [
            'expenseName' => $incomingDatas['expenseName'],
            'expenseAmount' => intval($incomingDatas['expenseAmount']),
            'expenseDate' => $incomingDatas['expenseDate'],
            'expenseCategory' => $incomingDatas['expenseCategory']
        ];
        // $expenseDetails = [
            
        // ];

        $user = auth()->user();
        $user->addExpense($incomeDetails);

        return redirect("/");
    }

    public function getVal(Request $request){
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);
    
        // Create a new user in MongoDB
        $user = new User([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'income' => $request->input('income'), 
            'expense' => $request->input('expense'),
        ]);
        
    
        $user->save();
    
      
    
        // You can also return a response to the frontend
        return redirect("/");
    }

}
