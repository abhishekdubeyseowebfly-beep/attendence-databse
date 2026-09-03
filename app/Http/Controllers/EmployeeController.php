<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    // Employee Form Page
    public function create()
    {
        return view('employees.create');
    }


    // Store Employee Data
    public function store(Request $request)
    {

        $request->validate([

            'employee_name'      => 'required',
            'employee_dob'       => 'required',
            'gender'             => 'required',
            'permanent_address'  => 'required',
            'temporary_address'  => 'required',
            'contact_no'         => 'required',
            'email'              => 'required|email|unique:employees,email',
            'date_of_joining'    => 'required',
            'father_name'        => 'required',
            'mother_name'        => 'required',
            'aadhar_card_no'     => 'required',
            'pan_card_no'        => 'required',

        ]);


        /*
        Employee ID Format

        05 = Month
        26 = Year
        1001 = Sequence

        Example:
        05261001
        */


        $month = date('m');
        $year  = date('y');

        $lastEmployee = Employee::latest()->first();

        if ($lastEmployee) {

            $lastSequence = substr($lastEmployee->employee_id, -4);

            $newSequence = intval($lastSequence) + 1;

        } else {

            $newSequence = 1001;
        }

        $employeeId = $month .
                      $year .
                      str_pad($newSequence, 4, '0', STR_PAD_LEFT);



        // Upload Employee Image
        $employeeImage = null;

        if ($request->hasFile('employee_image')) {

            $employeeImage = $request
                ->file('employee_image')
                ->store('employees', 'public');
        }



        // Upload Aadhar Document
        $aadharDocument = null;

        if ($request->hasFile('aadhar_document')) {

            $aadharDocument = $request
                ->file('aadhar_document')
                ->store('documents', 'public');
        }



        // Upload PAN Document
        $panDocument = null;

        if ($request->hasFile('pan_document')) {

            $panDocument = $request
                ->file('pan_document')
                ->store('documents', 'public');
        }



        // Save Employee
        $employee = Employee::create([

            'employee_id'        => $employeeId,
            'employee_name'      => $request->employee_name,
            'employee_dob'       => $request->employee_dob,
            'gender'             => $request->gender,

            'permanent_address'  => $request->permanent_address,
            'temporary_address'  => $request->temporary_address,

            'contact_no'         => $request->contact_no,
            'alternate_no'       => $request->alternate_no,
            'email'              => $request->email,

            'date_of_joining'    => $request->date_of_joining,

            'father_name'        => $request->father_name,
            'mother_name'        => $request->mother_name,

            'aadhar_card_no'     => $request->aadhar_card_no,
            'pan_card_no'        => $request->pan_card_no,

            'employee_image'     => $employeeImage,
            'aadhar_document'    => $aadharDocument,
            'pan_document'       => $panDocument,

        ]);


        // Redirect to Profile Page
        return redirect()->route('employee.profile', $employee->id);

    }



    // Employee Profile Page
    public function show($id)
    {

        $employee = Employee::findOrFail($id);

        return view('employees.profile', compact('employee'));

    }

}
