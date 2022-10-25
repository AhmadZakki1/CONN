@if($data->isEmpty())
    <h6 class="text-center">Siswa belum memiliki project</h6>
@else
    @foreach ($data as $item)
    <div class="card">
        <div class="card-header">
            {{ $item->siswa_id }}
            <h6>Nama Project</h6>
            {{$item->nama_project}}
        </div>
        <div class="card-body">
        <img src="{{asset('/template/img/'.$item->foto) }}" width="200" class="img-thumbnail">
            <br>
            <h6>Tanggal Project</h6>
            {{ $item->tanggal }}

            <h6>Deskripsi Project/h6>
            {{ $item->deskripsi }}
        </div>
        <div class="card-footer">
            <a href="{{ route('project.edit' , $item['id']) }}" class="btn btn-info btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>
            <a href="{{ route('project.destroy' , $item ->id) }}"class="btn btn-warning btn-circle btn-sm"><i class="fas fa-plus"></i></a>
        </div>
        </div>
    @endforeach
@endif    