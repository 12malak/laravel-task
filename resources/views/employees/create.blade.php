@extends('layout')
<link href="{{ asset('css/Login.css') }}" rel="stylesheet">

@section('content')
    <div class="flex-wrapper"> <!-- Wrapper for centering -->
        <div class="login-container">
            <div class="form-title">Create Employee</div>
            
            <!-- Display error messages if any -->
            @if ($errors->any())
                <div class="alert alert-danger text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form starts here -->
            <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf <!-- Laravel CSRF token for security -->

                <!-- First Name Field -->
                <div class="form-field">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-input" required>
                </div>

                <!-- Last Name Field -->
                <div class="form-field">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-input" required>
                </div>

                <!-- Company Field -->
                <div class="form-field">
                    <label for="company_id" class="form-label">Company</label>
                    <select name="company_id" id="company_id" class="form-input" required>
                        <option value="">Select a company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Email Field -->
                <div class="form-field">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-input" required>
                    @error('company-email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Phone Field -->
                <div class="form-field">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="tel" name="phone" id="phone" class="form-input" required>
                </div>

                <!-- Submit Button -->
                <div class="form-field">
                    <button type="submit" class="submit-btn">Add Employee</button>
                </div>
            </form>
            <!-- Form ends here -->
        </div>
    </div>
@endsection
