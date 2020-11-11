<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::with('employees')->paginate(5);
        return view('company.index', ['result' => $companies]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyRequest $request)
    {
        $company = $request->except('_token');
        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $fileName = $logo->getClientOriginalName();
            $folder = '/app/company';
            $logo->storeAs($folder, $fileName, 'public');

            $company['logo'] = $logo->getClientOriginalName();

            if (Company::create($company)) {
                Session::flash('success', 'Company berhasil ditambahkan');
            } else {
                Session::flash('error', 'Company gagal ditambahkan');
            }

            return redirect()->route('companies.index');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id)->first();
        return view('company.edit', ['company' => $company]);
    }

    public function update(CompanyRequest $request, $id)
    {
        $params = $request->except('_token');
        $company = Company::findOrFail($id);
        if ($request->has('logo')) {
            $logo = $request->file('logo');
            $fileName = $logo->getClientOriginalName();
            $folder = '/app/company';
            $logo->storeAs($folder, $fileName, 'public');
            $params['logo'] = $logo->getClientOriginalName();
        }
        if ($company->update($params)) {
            Session::flash('success', 'Company berhasil diupdate');
        } else {
            Session::flash('error', 'Company gagal diupdate');
        }

        return redirect()->route('companies.index');
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        if ($company->delete()) {
            Storage::delete('public/app/company/' . $company->logo);
            Session::flash('success', 'Company berhasil dihapus');
        } else {
            Session::flash('error', 'Company gagal dihapus');
        }

        return redirect()->route('companies.index');
    }
}
