@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Employee</div>
                <div class="card-body">
                    <div class="card-shadow">
                        <div class="card-body">
                            <form action="{{route('employees.update', $employee->id)}}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{$employee->id}}">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Name"
                                        value="{{ $employee->nama }}">
                                </div>
                                @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="email@example.com" value="{{ $employee->email }}">
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <div class="form-group">
                                    <label for="company_id">Company</label>
                                    <select name="company_id" class="form-control">
                                        @foreach($companies as $company)
                                        <option value="{{ $company->id }}"
                                            {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                            {{ $company->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('company_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
