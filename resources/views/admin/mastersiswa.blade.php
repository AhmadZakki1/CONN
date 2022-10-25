@extends('admin.app')
@section('title','mastersiswa')
@section('content')
<a class="btn btn-success" href="{{ route('Siswa.create') }}">Tambah data</a>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
        <h6 class="m-0 font-weigt-bold text-primary">Tabel Siswa</h6>                   
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">jenis kelamin</th>
                                <th scope="col">Nisn</th>
                                <th scope="col">Email</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                        </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $i=> $item)
                                <tr>
                                <td scope="row">{{++$i}}</th>
                                <td>{{$item ->nama}}</th>
                                <td>{{$item ->jk}}</th>
                                <td>{{$item ->nisn}}</th>
                                <td>{{$item ->email}}</th>
                                <td>{{$item ->alamat}}</th>
                                <!-- <td>{{$loop ->iteration}}</td> -->
                                <td>
                                    <a href="{{ route('Siswa.show' , $item ->id) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
                                    <a href="{{ route('Siswa.edit' , $item ->id) }}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                    <!-- <a href=""></a> -->
                                    <form action="{{ route('Siswa.destroy' , $item ->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i>    </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
