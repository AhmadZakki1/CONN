@extends('admin.app')
@section('rpl','editkontak')
@section('title','editkontak')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shawod mb-4">            
            <div class="card-body">
                @if (count($errors) >0)
                <div class ="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method='POST' enctype='multipart/form-data' action="{{route('Siswa.update',['Siswa'=>$data->id])}}">
                    @method('PUT')
                @csrf
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" value="{{$data->nisn}}" id="nisn" name="nisn">  
                    </div>                    
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" value="{{$data->nama}}" id="nama" name="nama">  
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <select class="form-select form-control" id="jk" name="jk">  
                            <option value="Laki-Laki" {{ $data->siswa == 'laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" value="{{$data->email}}" id="email" name="email">  
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" value="{{$data->alamat}}" id="alamat" name="alamat">  
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control" id="about" name="about"> {{$data->about}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="file" class="form-control-file" value="{{$data->foto}}" id="foto" name="foto">
                        <img src="{{ asset('/template/img/'.$data->foto)}}" width="300" class="img-thumbnail">  
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                         <a href="/Siswa" class = "btn btn-danger">Batal</a>                   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection