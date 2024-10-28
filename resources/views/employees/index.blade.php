@extends('layout')
<link href="{{ asset('css/Companies.css') }}" rel="stylesheet">

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center pt-8 sm:justify-start sm:pt-0">
            <h1 class="text-2xl font-bold">Employees</h1> <!-- Centered Title -->
            <!-- Create Employee Button -->
            <a href="{{ route('employees.create') }}" class="inline-flex px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ">
                Create Employee
            </a>
        </div>

        <!-- Employees Table -->
        <div class="mt-8 overflow-hidden bg-white shadow sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Last Name</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Company</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Website</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($employees as $employee) <!-- Start the foreach loop -->
                    <tr class="hover:bg-gray-100 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->first_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->last_name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->company->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $employee->phone }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            @if($employee->logo) <!-- Check if the logo exists -->
                                <img src="{{ asset('storage/' . $employee->logo) }}" alt="Logo" class="w-24 h-24 object-cover rounded-full mx-auto"> <!-- Centered Logo -->
                            @else
                                <img src="{{ asset('images/default-logo.png') }}" alt="Default Logo" class="w-24 h-24 object-cover rounded-full mx-auto"> <!-- Default Logo -->
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <a href="{{ $employee->website }}" target="_blank" class="text-blue-600 hover:underline">Visit Website</a>
                        </td>
                    </tr>
                    @endforeach <!-- End the foreach loop -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
