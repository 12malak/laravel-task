<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Companies;
use Illuminate\Database\QueryException;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.index', ['employees' => Employe::all()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
