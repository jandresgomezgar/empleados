<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Employees;

class employeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Employees = DB::table('users')->paginate(10);
        return view('home')->with('Employees', $Employees);
    }




    public function add()
    {
        return view('add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Employees = new Employees;
        $Employees->name = $request->input('name');
        $Employees->email  = $request->input('email');
        $Employees->job_title = $request->input('job_title');
        $Employees->location  = $request->input('location');
        $Employees->password =  Hash::make($request->input('password'));
        $Employees->save();
        return redirect('/')->with('message', 'Create!');

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
        $Employees = Employees::find($id);
         return view('edit')->with('Employees', $Employees);
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


        $Employees = Employees::find($id);

        $Employees->name = $request->input('name');
        $Employees->email  = $request->input('email');
        $Employees->job_title = $request->input('job_title');
        $Employees->location  = $request->input('location');
        $Employees->save();

        return redirect('/')->with('message', 'Successfully deleted the employe!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $Employees = Employees::find($id);
        $Employees->delete();

        // redirect
        return redirect('/')->with('message', 'Successfully deleted the employe!');


    }
}
