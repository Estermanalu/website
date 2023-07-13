<?php

namespace App\Http\Controllers;

use App\Models\employees;
use App\Http\Requests\StoreemployeesRequest;
use App\Http\Requests\UpdateemployeesRequest;
use Illuminate\Http\Request;

class YourController extends Controller
{
    public function showPage()
    {
        $search = ''; // Mendefinisikan variabel $search dengan nilai awal yang sesuai

        // Logika lainnya untuk mengisi atau memanipulasi nilai $search

        return view('search', ['search' => $search]);
    }

    // Fungsi lainnya dalam controller
}

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        {
            $search = $request->query('search');
    
            if(!empty($search)){
                $dataEmployees = Employees::where('employees.idemployees', 'like', '%' .$search. '%')
                    ->orWhere('employees.nama', 'like','%' .$search. '%')
                    ->orWhere('employees.no_badge', 'like','%' .$search. '%')
                    ->paginate(5)->onEachSide(2)->fragment('employees');
            }else{
                $dataEmployees = Employees::paginate(5)->fragment('employees');
            }
    
            return view('employees.data')->with([
                'employees' => $dataEmployees,
                'search' => $search
            ]);
        }
            
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
     * @param  \App\Http\Requests\StoreemployeesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreemployeesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit(employees $employees)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemployeesRequest  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemployeesRequest $request, employees $employees)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employees)
    {
        //
    }
}
