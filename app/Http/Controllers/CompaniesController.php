<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use Illuminate\Database\QueryException;

class CompaniesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   
    public function index()
    {
        return view('companies.index', ['companies' => Companies::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'company-name' => 'required|string|max:255',
            'company-email' => 'required|email|max:255|unique:companies,email',
            'company-logo' => 'required|image|max:2048',
            'company-website' => 'required|url',
        ]);
    
        try {
            // Create a new company instance
            $company = new Companies();
            $company->name = $request->input('company-name');
            $company->email = $request->input('company-email');
            
            // Store the logo if uploaded
            if ($request->hasFile('company-logo')) {
                $logoPath = $request->file('company-logo')->store('logos', 'public'); // Store in storage/app/public/logos
                $company->logo = $logoPath;
            }
            
            $company->website = $request->input('company-website');
    
            // Save the company data to the database
            $company->save();
    
            // Redirect to the companies index with a success message
            return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    
        } catch (\Exception $e) {
            // Handle specific error codes, such as duplicate entry
            if ($e instanceof \Illuminate\Database\QueryException && $e->errorInfo[1] === 1062) { // Duplicate entry error code
                return redirect()->back()->withInput()->withErrors(['company-email' => 'The email has already been taken.']);
            }
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
