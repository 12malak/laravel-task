@extends('layout')
<link href="{{ asset('css/Login.css') }}" rel="stylesheet">

@section('content')
    <div class="flex-wrapper"> <!-- Wrapper for centering -->
        <div class="login-container">
            <div class="form-title">Edit Employee</div>
            <!-- Form starts here -->
            <form action="{{ route('employees.update', $employe->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT') <!-- Specify the form method as PUT -->

                <!-- First Name Field -->
                <div class="form-field">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-input" required value="{{ $employe->first_name }}">
                    @error('first_name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Last Name Field -->
                <div class="form-field">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-input" required value="{{ $employe->last_name }}">
                    @error('last_name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Company Field -->
                <div class="form-field">
                    <label for="company_id" class="form-label">Company</label>
                    <select name="company_id" id="company_id" class="form-input" required>
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id == $employe->company_id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company_id')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-field">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-input" value="{{ $employe->email }}">
                    @error('email')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div class="form-field">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-input" value="{{ $employe->phone }}">
                    @error('phone')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-field">
                    <button type="submit" class="submit-btn">Update Employee</button>
                </div>
            </form>
            <!-- Form ends here -->
        </div>
    </div>
@endsection
