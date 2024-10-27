<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #f3f4f6; /* Light gray background */
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                margin: 0;
            }
            .login-container {
                max-width: 400px;
                width: 100%;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                padding: 2rem;
            }
            .form-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #333;
                text-align: center;
                margin-bottom: 1rem;
            }
            .form-field {
                margin-bottom: 1rem;
            }
            .form-label {
                display: block;
                font-weight: 600;
                margin-bottom: 0.5rem;
                color: #4a5568;
            }
            .form-input {
                width: 100%;
                padding: 0.5rem;
                border: 1px solid #cbd5e0;
                border-radius: 4px;
                background-color: #edf2f7;
            }
            .form-input:focus {
                border-color: #9333ea;
                outline: none;
            }
            .submit-btn {
                width: 100%;
                padding: 0.75rem;
                background-color:#c084fc;
                color: #fff;
                border: none;
                border-radius: 4px;
                font-size: 1rem;
                cursor: pointer;
                transition: background-color 0.3s ease;
               
            }
            .submit-btn:hover {
                background-color: #9333ea;
            }
        </style>
    </head>
    <body>
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
    </body>
</html>
