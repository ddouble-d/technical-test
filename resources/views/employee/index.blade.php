@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Employees</h2>
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Tambah</a>
                </div>
                <div class="card-body">
                    @include('flash-message')
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($result as $index => $data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->company->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <a href="{{route('employees.edit', $data->id)}}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Hapus data?')" class="d-inline"
                                        action="{{route('employees.destroy', $data->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$result->links()}}
                </div>
            </div>
        </div>
    </div>
    @endsection
