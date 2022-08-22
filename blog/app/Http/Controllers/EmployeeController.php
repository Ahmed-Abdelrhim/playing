<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Auth;
//use Yajra\DataTables\DataTables;
use DataTables;
class EmployeeController extends Controller
{

    public function index()
    {
        // TODO return collection
        return Employee::get();
    }

    public function store(EmployeeRequest $request)
    {
//        $emp = Employee::create($request->only('name','salary','job'));
//        $emp = Employee::create([$request->all()]);

//        $emp = Employee::create([
//            'name' =>$request->name,
//            'salary' => $request->salary,
//            'job' => $request->job,
//        ]);
//        $response = [
//            'emp' => $emp,
//            'message' => 'Successfully Inserted ',
//        ];

//        return response($response,201);
        return ['emp'=> Employee::create($request->only('name','salary','job')) , 'msg' => 'Successfully Inserted'];
    }


    public function show($id)
    {
        return Employee::findOrFail($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Employee::destroy($id);
        return response()->json([
            'success ' => 'Deleted Successfully',
        ]);
    }

    public function customView() {
        return view('custom');
    }

    public function fetchAll () {
        return view('custom');
    }

    public function dataModel(Request $request) {
        if($request->ajax()) {
            $data = Employee::select('*');
            return DataTables::of($data)->addIndexColumn()->addColumn('action',function(){
                return $btn = "
            <a id='editBtn' class='edit btn btn-primary btn-sm'  href=''><i class='fa-solid fa-pen-to-square'></i></a>
            <button id='deleteBtn' class='edit btn btn-danger btn-sm' href='#' ><i class='fa-solid fa-trash'></i></button>
            ";
            })->rawColumns(['action'])->make(true);
        }
    }

    public function editAdmin() {
        return view();
    }
}
