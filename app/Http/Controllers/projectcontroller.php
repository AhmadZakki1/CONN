<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\project;
use App\Models\Siswa;
class projectcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = project::all();
        $data1 = Siswa::all();
        return view('admin.masterproject', compact('data','data1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createproject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return "dfdfdf";
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'id_siswa'=>'required',
            'nama_project'=>'required|min:5|max:20',
            'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required'
        ], $messages);

        // ambil informasi yang diiupload
        $file = $request->file('foto');

        // rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //_aghna.jpg

        // proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);
        // proses insert Database
        project::create([
            'id_siswa'=> $request->id_siswa,
            'nama_project'=> $request->nama_project,
            'tanggal'=>$request->tanggal,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$nama_file
        ]);
        // dd($request);

        return redirect('/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id)->project()->get();
        return view('admin.showproject', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.editproject');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required'=>':attribute minimal diisi dong kak',
            'min'=>':attribute minimal :min karakter lah ya',
            'max'=>':attribute maksimal :max karakter dong'
        ];

        $this->validate($request,[
            'nama_project'=>'required|min:5|max:20',
            // 'tanggal'=>'required',
            'deskripsi'=>'required',
            'foto'=>'mimes:jpg,jpeg,png,gif,svg'
        ], $messages);

        if($request->foto != ''){
            // ganti foto

            // 1. hapus foto lama
            $projek=project::find($id);
            file::delete('./template/img'.$projek->foto);
            // 2. ambil informasi yang diiupload
        $file = $request->file('foto');

        // 3. rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //_aghna.jpg

        // 4. proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        // 5. menyimpan ke database
        $projek->nama_project=$request->nama_project;
        // $projek->tanggal=$request->tanggal;
        $projek->deskripsi=$request->deskripsi;
        $projek->foto=$nama_file;
        $projek->save();
        return redirect ('masterproject');

        }else{
            // tanpa ganti foto
            $projek=Project::find($id);
            $projek->nama_project=$request->nama_project;
            // $projek->tanggal=$request->tanggal;
            $projek->deskripsi=$request->deskripsi;
            $projek->update();
            return redirect ('masterproject');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $data = Projek::destroy($id);
        return redirect ('masterproject');
    }
}

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }


