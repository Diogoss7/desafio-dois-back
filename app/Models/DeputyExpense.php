<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DeputyExpense extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "deputy_expense";

    protected $fillable = [
        'id',
        'deputy_id',
        'Month',
        'value',
    ];

}
