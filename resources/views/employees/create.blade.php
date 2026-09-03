@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-slate-900">Add New Employee</h1>
        <p class="mt-1 text-sm text-slate-500">Fill in the details below to create a new employee record.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
            <p class="font-medium">Please fix the following:</p>
            <ul class="mt-2 list-inside list-disc space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-semibold text-slate-900">Personal Information</h2>
            <p class="mt-1 text-sm text-slate-500">Basic details about the employee.</p>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="employee_name" class="block text-sm font-medium text-slate-700">Full Name</label>
                    <input type="text" name="employee_name" id="employee_name" value="{{ old('employee_name') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="employee_dob" class="block text-sm font-medium text-slate-700">Date of Birth</label>
                    <input type="date" name="employee_dob" id="employee_dob" value="{{ old('employee_dob') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium text-slate-700">Gender</label>
                    <select name="gender" id="gender"
                            class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="">Select gender</option>
                        <option value="Male" @selected(old('gender') == 'Male')>Male</option>
                        <option value="Female" @selected(old('gender') == 'Female')>Female</option>
                        <option value="Other" @selected(old('gender') == 'Other')>Other</option>
                    </select>
                </div>

                <div>
                    <label for="father_name" class="block text-sm font-medium text-slate-700">Father's Name</label>
                    <input type="text" name="father_name" id="father_name" value="{{ old('father_name') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="mother_name" class="block text-sm font-medium text-slate-700">Mother's Name</label>
                    <input type="text" name="mother_name" id="mother_name" value="{{ old('mother_name') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label for="employee_image" class="block text-sm font-medium text-slate-700">Photo</label>
                    <input type="file" name="employee_image" id="employee_image" accept="image/*"
                           class="mt-1.5 block w-full rounded-lg border border-slate-300 text-sm text-slate-600 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-semibold text-slate-900">Contact Information</h2>
            <p class="mt-1 text-sm text-slate-500">How to reach this employee.</p>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                <div>
                    <label for="contact_no" class="block text-sm font-medium text-slate-700">Contact Number</label>
                    <input type="text" name="contact_no" id="contact_no" value="{{ old('contact_no') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="alternate_no" class="block text-sm font-medium text-slate-700">Alternate Number</label>
                    <input type="text" name="alternate_no" id="alternate_no" value="{{ old('alternate_no') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div class="sm:col-span-2">
                    <label for="permanent_address" class="block text-sm font-medium text-slate-700">Permanent Address</label>
                    <textarea name="permanent_address" id="permanent_address" rows="2"
                              class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('permanent_address') }}</textarea>
                </div>

                <div class="sm:col-span-2">
                    <label for="temporary_address" class="block text-sm font-medium text-slate-700">Temporary Address</label>
                    <textarea name="temporary_address" id="temporary_address" rows="2"
                              class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('temporary_address') }}</textarea>
                </div>
            </div>
        </section>

        <section class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <h2 class="text-base font-semibold text-slate-900">Employment &amp; Identity</h2>
            <p class="mt-1 text-sm text-slate-500">Joining date and government identification.</p>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-5 sm:grid-cols-2">
                <div>
                    <label for="date_of_joining" class="block text-sm font-medium text-slate-700">Date of Joining</label>
                    <input type="date" name="date_of_joining" id="date_of_joining" value="{{ old('date_of_joining') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div></div>

                <div>
                    <label for="aadhar_card_no" class="block text-sm font-medium text-slate-700">Aadhar Card Number</label>
                    <input type="text" name="aadhar_card_no" id="aadhar_card_no" value="{{ old('aadhar_card_no') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="pan_card_no" class="block text-sm font-medium text-slate-700">PAN Card Number</label>
                    <input type="text" name="pan_card_no" id="pan_card_no" value="{{ old('pan_card_no') }}"
                           class="mt-1.5 block w-full rounded-lg border-slate-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="aadhar_document" class="block text-sm font-medium text-slate-700">Aadhar Document</label>
                    <input type="file" name="aadhar_document" id="aadhar_document"
                           class="mt-1.5 block w-full rounded-lg border border-slate-300 text-sm text-slate-600 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100">
                </div>

                <div>
                    <label for="pan_document" class="block text-sm font-medium text-slate-700">PAN Document</label>
                    <input type="file" name="pan_document" id="pan_document"
                           class="mt-1.5 block w-full rounded-lg border border-slate-300 text-sm text-slate-600 file:mr-4 file:rounded-md file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
            </div>
        </section>

        <div class="flex justify-end gap-3">
            <button type="reset"
                    class="rounded-lg border border-slate-300 bg-white px-5 py-2.5 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">
                Reset
            </button>
            <button type="submit"
                    class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-indigo-500">
                Save Employee
            </button>
        </div>
    </form>
@endsection
