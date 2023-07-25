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
                    ->paginate(5)->onEachSide(2)->fragment('id_employees');
            }else{
                $dataEmployees = Employees::paginate(5)->fragment('id_employees');
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
        $validate = $request->validated();

        $employees = new employees;
        $employees->idemployees = $request->txtid;
        $employees->fullname = $request->txtfullname;
        $employees->gender = $request->txtgender;
        $employees->emailaddress = $request->txtemailaddress;
        $employees->phone = $request->txtphone;
        $employees->address = $request->txtaddress;
        $employees->save();

        return redirect('employees')->with('msg','Add New Mahasiswa ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show(employees $employees)
    {
        $data = $students->find($idstudents);

        if ($data) {
            return view('students.formedit')->with([
                'txtid' => $idstudents,
                'txtfullname' => $data->fullname,
                'txtgender' => $data->gender,
                'txtaddress' => $data->address,
                'txtemailaddress' => $data->emailaddress,
                'txtphone' => $data->phone,
            ]);
        } else {
            // Handle jika data mahasiswa tidak ditemukan
        }
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
        $data = $students->find($idstudents);
        $data->fullname = $request->txtfullname;
        $data->gender = $request->txtgender;
        $data->emailaddress = $request->txtemailaddress;
        $data->phone = $request->txtphone;
        $data->address = $request->txtaddress;
        $data->save();

        return redirect('students')->with('msg','Update Data  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy(employees $employees)
    {
        $data = $students->find($idstudents);
        $data->delete();
        return redirect('students')->with('msg',' Data Berhasil dihapus ');
    }
}
