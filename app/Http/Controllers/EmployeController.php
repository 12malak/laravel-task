<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Companies;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $employees = Employe::paginate(10); // Fetch 10 employees per page
        return view('employees.index', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companies::all(); // Fetch all companies
        return view('employees.create', compact('companies')); // Pass the companies to the view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'company_id' => 'required|exists:companies,id',
        'email' => 'nullable|email|max:255|unique:employees,email',
        'phone' => 'nullable|string|max:15',
    ]);

    // Create a new employee instance
    $employe = new Employe();
    
    // Assign the validated data to the employee instance
    $employe->first_name = $request->first_name;
    $employe->last_name = $request->last_name;
    $employe->company_id = $request->company_id; // Assuming there's a company_id column
    $employe->email = $request->email;
    $employe->phone = $request->phone;

    try {
        // Save the employee data to the database
        $employe->save();
        
        // Redirect to the employees index with a success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    } catch (QueryException $e) {
        if ($e->errorInfo[1] === 1062) { // Duplicate entry
            return redirect()->back()->withInput()->withErrors(['company-email' => 'The email has already been taken.']);
        }
        
        // General error handling
        return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occurred.']);
    }
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit($id)
    {
        $employe = Employe::findOrFail($id); // Find the employee by ID
        $companies = Companies::all(); // Fetch all companies
        return view('employees.edit', compact('employe', 'companies')); // Pass both to the view
    }
    
    
    public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'company_id' => 'required|exists:companies,id',
        'email' => 'nullable|email|max:255|unique:employees,email,' . $id,
        'phone' => 'nullable|string|max:15',
    ]);

    try {
        $employe = Employe::findOrFail($id); // Retrieve the employee by ID
        // Update the employee's details
        $employe->first_name = $request->first_name;
        $employe->last_name = $request->last_name;
        $employe->company_id = $request->company_id;
        $employe->email = $request->email;
        $employe->phone = $request->phone;

        // Save the updated employee data
        $employe->save();

        // Redirect to the employees index with a success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    } catch (QueryException $e) {
        if ($e->errorInfo[1] === 1062) { // Duplicate entry error code
            return redirect()->back()->withInput()->withErrors(['company-email' => 'The email has already been taken.']);
        }
        
        // General error handling
        return redirect()->back()->withInput()->withErrors(['error' => 'An unexpected error occurred.']);
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
