@extends('layouts.app')

@section('title', $employee->employee_name . ' — Profile')

@section('content')
    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-8 sm:px-10">
            <div class="flex flex-col items-center gap-5 sm:flex-row">
                <div class="h-24 w-24 shrink-0 overflow-hidden rounded-full ring-4 ring-white/40">
                    @if ($employee->employee_image)
                        <img src="{{ Storage::url($employee->employee_image) }}" alt="{{ $employee->employee_name }}"
                             class="h-full w-full object-cover">
                    @else
                        <div class="flex h-full w-full items-center justify-center bg-indigo-400 text-2xl font-semibold text-white">
                            {{ strtoupper(substr($employee->employee_name, 0, 1)) }}
                        </div>
                    @endif
                </div>
                <div class="text-center sm:text-left">
                    <h1 class="text-2xl font-bold text-white">{{ $employee->employee_name }}</h1>
                    <p class="mt-1 text-sm text-indigo-100">Employee ID: {{ $employee->employee_id }}</p>
                    <p class="text-sm text-indigo-100">{{ $employee->email }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 p-6 sm:grid-cols-2 sm:p-10">
            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-400">Personal Information</h2>
                <dl class="mt-4 space-y-4">
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Date of Birth</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ \Illuminate\Support\Carbon::parse($employee->employee_dob)->format('d M Y') }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Gender</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->gender }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Father's Name</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->father_name }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 pb-3">
                        <dt class="text-sm text-slate-500">Mother's Name</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->mother_name }}</dd>
                    </div>
                </dl>
            </div>

            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-400">Contact Information</h2>
                <dl class="mt-4 space-y-4">
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Contact Number</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->contact_no }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Alternate Number</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->alternate_no ?? '—' }}</dd>
                    </div>
                    <div class="border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Permanent Address</dt>
                        <dd class="mt-1 text-sm font-medium text-slate-900">{{ $employee->permanent_address }}</dd>
                    </div>
                    <div class="pb-3">
                        <dt class="text-sm text-slate-500">Temporary Address</dt>
                        <dd class="mt-1 text-sm font-medium text-slate-900">{{ $employee->temporary_address }}</dd>
                    </div>
                </dl>
            </div>

            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-400">Employment</h2>
                <dl class="mt-4 space-y-4">
                    <div class="flex justify-between gap-4 pb-3">
                        <dt class="text-sm text-slate-500">Date of Joining</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ \Illuminate\Support\Carbon::parse($employee->date_of_joining)->format('d M Y') }}</dd>
                    </div>
                </dl>
            </div>

            <div>
                <h2 class="text-sm font-semibold uppercase tracking-wide text-slate-400">Identity Documents</h2>
                <dl class="mt-4 space-y-4">
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <dt class="text-sm text-slate-500">Aadhar Card Number</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->aadhar_card_no }}</dd>
                    </div>
                    <div class="flex justify-between gap-4 pb-3">
                        <dt class="text-sm text-slate-500">PAN Card Number</dt>
                        <dd class="text-sm font-medium text-slate-900">{{ $employee->pan_card_no }}</dd>
                    </div>
                </dl>

                <div class="mt-4 flex flex-wrap gap-3">
                    @if ($employee->aadhar_document)
                        <a href="{{ Storage::url($employee->aadhar_document) }}" target="_blank"
                           class="inline-flex items-center rounded-md bg-indigo-50 px-3 py-1.5 text-sm font-medium text-indigo-700 transition hover:bg-indigo-100">
                            View Aadhar Document
                        </a>
                    @endif
                    @if ($employee->pan_document)
                        <a href="{{ Storage::url($employee->pan_document) }}" target="_blank"
                           class="inline-flex items-center rounded-md bg-indigo-50 px-3 py-1.5 text-sm font-medium text-indigo-700 transition hover:bg-indigo-100">
                            View PAN Document
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('employee.create') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
            &larr; Add another employee
        </a>
    </div>
@endsection
