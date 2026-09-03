<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [

        'employee_id',
        'employee_name',
        'employee_dob',
        'gender',
        'permanent_address',
        'temporary_address',
        'contact_no',
        'alternate_no',
        'email',
        'date_of_joining',
        'father_name',
        'mother_name',
        'aadhar_card_no',
        'pan_card_no',
        'employee_image',
        'aadhar_document',
        'pan_document'
    ];
}
