@extends('layout')
<link href="{{ asset('css/Login.css') }}" rel="stylesheet">

@section('content')
    <div class="flex-wrapper"> <!-- Wrapper for centering -->
        <div class="login-container">
            <div class="form-title">Edit Company</div>
            <!-- Form starts here -->
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf <!-- Laravel CSRF token for security -->
                @method('PUT') <!-- Specify that this is an update request -->

                <!-- Name Field -->
                <div class="form-field">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="company-name" id="name" class="form-input" required value="{{ old('company-name', $company->name) }}">
                    @error('company-name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-field">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="company-email" id="email" class="form-input" required value="{{ old('company-email', $company->email) }}">
                    @error('company-email')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Logo Field -->
                <div class="form-field">
                    <label for="logo" class="form-label">Logo (min. 100x100)</label>
                    <input type="file" name="company-logo" id="logo" class="form-input" accept="image/*">
                    <small>Leave empty if you don't want to change the logo.</small>
                    @error('company-logo')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Website Field -->
                <div class="form-field">
                    <label for="website" class="form-label">Website</label>
                    <input type="url" name="company-website" id="website" class="form-input" required value="{{ old('company-website', $company->website) }}">
                    @error('company-website')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-field">
                    <button type="submit" class="submit-btn">Update Company</button>
                </div>
            </form>
            <!-- Form ends here -->
        </div>
    </div>
@endsection
