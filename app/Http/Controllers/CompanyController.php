<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id')->paginate(5);

        return view('layouts.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('layouts.create');

        // $rules = [
		// 	'name' => 'required',
        //     'email' => 'required',
        //     'web' => 'required',
        //     'image' => 'required|image|mimes:jpeg,bmp,png|dimensions:min_width=100,min_height=100'
		// ];
		// $validator = Validator::make($request->all(),$rules);
		// if ($validator->fails()) {
		// 	return redirect('insert')
		// 	->withInput()
		// 	->withErrors($validator);
		// }
		// else{
        //     $data = $request->input();
		// 	try{
		// 		$company = new Company;
        //         $company->name = $data['name'];
        //         $company->email = $data['email'];
        //         $company->web = $data['web'];

        //         $path = $request->file('image')->store('public/images');
        //         $company->image = $path;

		// 		$company->save();
		// 		return redirect('dashboard')->with('status',"Insert successfully");
		// 	}
		// 	catch(Exception $e){
		// 		return redirect('dashboard')->with('failed',"Operation failed");
		// 	}
		// }
        // return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return view('layouts.create');

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'web' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png|dimensions:min_width=100,min_height=100'
        ]);

        $data = $request->all();
        $company = new Company;
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->web = $data['web'];

        $path = $request->file('image')->store('public/images');
        $company->image = $path;

        $company->save();

        $companies = Company::orderBy('id')->paginate(5);

        // return view('layouts.index', compact('companies'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
            return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('layouts.show', compact('companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('layouts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company,$id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'web' => 'required',
        //     'image' => 'required|image|mimes:jpeg,bmp,png|dimensions:min_width=100,min_height=100'
        // ]);

        $company->update($request->all());

        return redirect()->route('dashboard');

        // return redirect()->route('layouts.index')
        //     ->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,$id)
    {

        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('dashboard');
        // return redirect()->route('layouts.index')
        //     ->with('success', 'Company deleted successfully');
    }
}
