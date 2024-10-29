<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
     
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
            margin: 0;
        }

        .navbar {
            background-color: #581c87;
            padding: 1rem;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .navbar a:hover {
            color: #f0abfc;
        }

        .content {
            text-align: center;
            
        }
        .logout-form {
            display: inline;
        }

        .logout-button {
            color: #ffffff;
            background-color: transparent;
            border: none;
            cursor: pointer;
            margin: 0 15px;
            font-weight: 600;
            transition: color 0.3s;
        }

        .logout-button:hover {
            color: #f0abfc;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <a href="{{ route('employees.index') }}">Employees</a>
        <a href="{{ route('companies.index') }}">Companies</a>
        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </nav>

    <!-- Main Content -->
    <div class="content">
       
       
        @yield('content')
    </div>

</body>
</html>
