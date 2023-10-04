<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'income',
        'expense',
    ];

    public function addIncome($incomeDetails)
    {
        $income = $this->income ?: []; // Get the current 'income' attribute or initialize as an empty array
        $income[] = $incomeDetails; // Add income to the array
        $this->income = $income; // Set the updated 'income' attribute
        $this->save();
    }

    public function addExpense($expenseDetails)
    {
        $expense = $this->expense ?: []; // Get the current 'expense' attribute or initialize as an empty array
        $expense[] = $expenseDetails; // Add expense to the array
        $this->expense = $expense; // Set the updated 'expense' attribute
        $this->save();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
   
}
