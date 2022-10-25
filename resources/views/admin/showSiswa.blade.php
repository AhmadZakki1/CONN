@extends('admin.app')
@section('rpl','showSiswa')
@section('title','showSiswa')
@section('content-title','showSiswa')
@section('content') 
<div class="row">
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body text-center">
                <!-- <img src="{{asset('/template/img'.$data->foto)}}" width="200" class="rounded-circle img-thumbnail"> -->
                <img src="{{asset('/template/img/'.$data->foto)}}" width="300" class="rounded-circle img-thumbnail">
                <h5 class="display-5">{{$data->nama}}</h5>
                <h5>{{$data->jk}}</h5>
                <h5 class="fas fa-envelope">{{$data->email}}</h5>
                <h5>{{$data->alamat}}</h5>

            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card header py-3 flex flex-row align-item-center justify-content-between">
            <h6 class="font-weight-bold text primary"><i class="fas fa-user-plus"></i>Kontak siswa</h6>
            </div>
            <div class="card-body">

            @foreach ($kontak as $k)
                <a href="{{ $k->deskripsi }}" target="_blank">{{ $k->jenis->jenis_kontak }}</a>
            @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card shadow mb-4">
        <div class="card-header py-3 flex flex-row align-item-center justify-content-between">
            <h6 class=" m-0 font-weight-bold text primary"><i class="fas fa-user-left"></i>About Siswa</h6>
            </div>
            <div class="card-body">
                <blockquote class="blockqoute text-center">
                    <p class="mb-0">{{$data->about}}</p>
                </blockquote>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 flex flex-row align-item-center justify-content-between">
            <h6 class=" m-0 font-weight-bold text primary"><i class="fas fa-user-left"></i>Project Siswa</h6>   
                 </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
    
    
</div>
@endsection