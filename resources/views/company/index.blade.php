@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Companies</h2>
                    <a href="{{ route('companies.create') }}" class="btn btn-primary">+ Tambah</a>
                </div>
                <div class="card-body">
                    @include('flash-message')
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Employees</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($result as $index => $data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <a href="{{ Storage::url('app/company/'.$data->logo)}}"><img
                                            src="{{ Storage::url('app/company/'.$data->logo)}}"
                                            style="width: 75px" /></a>
                                </td>
                                <td><a href="{{$data->website}}">{{ $data->website }}</a></td>
                                <td>
                                    @foreach ($data->employees as $employee)
                                    <li>{{ $employee->nama }}</li>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('companies.edit', $data->id)}}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Hapus data?')" class="d-inline"
                                        action="{{route('companies.destroy', $data->id)}}" method="POST">
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
