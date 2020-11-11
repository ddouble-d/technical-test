<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::with('company')->paginate(5);
        return view('employee.index', ['result' => $employees]);
    }

    public function create()
    {
        $companies = Company::all();

        return view('employee.create', ['companies' => $companies]);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = $request->except('_token');
        if (Employee::create($employee)) {
            Session::flash('success', 'Employee berhasil ditambahkan');
        } else {
            Session::flash('error', 'Employee gagal ditambahkan');
        }

        return redirect()->route('employees.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id)->first();
        $companies = Company::all();
        return view('employee.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $params = $request->except('_token');
        $employee = Employee::findOrFail($id);
        if ($employee->update($params)) {
            Session::flash('success', 'Employee berhasil diupdate');
        } else {
            Session::flash('error', 'Employee gagal diupdate');
        }

        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->delete()) {
            Session::flash('success', 'Employee berhasil dihapus');
        } else {
            Session::flash('error', 'Employee gagal dihapus');
        }

        return redirect()->route('employees.index');
    }
}
