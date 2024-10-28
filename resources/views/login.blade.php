<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/Login') }}" rel="stylesheet">
        <link href="{{ asset('css/Login.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
           
        </style>
    </head>
    <body>
    <div class="flex-wrapper">
        <div class="login-container">
            <div class="form-title">Login</div>
            <!-- Form starts here -->
            <form action="" method="POST" class="space-y-4">
                @csrf <!-- Laravel CSRF token for security -->

                <!-- Name Field -->
                <div class="form-field">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-input" required>
                </div>

                <!-- Email Field -->
                <div class="form-field">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-input" required>
                </div>

                <!-- Submit Button -->
                <div class="form-field">
                    <button type="submit" class="submit-btn">Login</button>
                </div>
            </form>
            <!-- Form ends here -->
        </div>
        </div>
    </body>
</html>
