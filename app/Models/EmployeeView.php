<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeView extends Model
{
    use HasFactory;

    protected $table = 'employee_view'; // Specify the table name for the model
    public $timestamps = false; // Disable automatic timestamp columns

    protected $fillable = [
        'user_id',
        'name',
        'privilege',
        'email',
        'user_cntct',
        'birth_date',
        'user_status'
    ];

    // Add your custom code here
}
