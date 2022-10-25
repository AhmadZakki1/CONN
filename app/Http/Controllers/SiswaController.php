<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.mastersiswa', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createSiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' =>':attribute harus disini dulu gaes',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter ya gaes',
            'numeric' =>':attribute kudu diisi angka cak!!',
            'mines' => 'file :attribute harus bertipe jpg, png, jpeg',
            'size' =>'file yang diupload maksimal :size',
            'digits_between'=>':attribute harus diantara 6 sampai 12'
        ];

        $this->validate ($request,[
            'nama' => 'required|min:1|max:20',
            'nisn' => 'required|numeric|digits_between:6,12',
            'jk'   => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10',
            'foto' => 'required|mimes:jpg,jpeg,png,gif,svg'
        
        ], $message);
    //ambil informasi file yang diupload
    $file = $request->file('foto');

    //rename + ambil nama file
   $nama_file = time()."_".$file->getClientOriginalName();

   // proses uploud 
   $tujuan_upload = './template/img';

   // proses insert database
   Siswa::create([
       'nama' => $request->nama,
       'nisn' => $request->nisn,
       'jk' => $request->jk,
       'email' => $request->email,
       'alamat' => $request->alamat,
       'about' => $request->about,
       'foto' => $nama_file
   ]);
     return redirect('/Siswa');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Siswa::find($id);
        $kontak = $data->kontak;
        return view('admin.showSiswa',compact('data','kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.editSiswa',[
            'data'=>Siswa::find($id)
        ]);
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
        $message=[
            'required' =>':attribute harus disini dulu gaes',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maksimal :max karakter ya gaes',
            'numeric' =>':attribute kudu diisi angka cak!!',
            'mines' => 'file :attribute harus bertipe jpg, png, jpeg',
            'size' =>'file yang diupload maksimal :size'
        ];

        $this->validate ($request,[
            'nama' => 'required|min:1|max:20',
            'nisn' => 'required|numeric|digits_between:6,12',
            'jk'   => 'required',
            'email' => 'required',
            'alamat' => 'required|min:5',
            'about' => 'required|min:10',
            'foto' => 'mimes:jpg,jpeg,png,gif,svg'
        
        ], $message);

        $siswa=Siswa::find($id);

               if ($request->foto != ''){
                // dengan ganti foto
                // perintah hapus file foto yang lama
                file::delete('./tamplate/img'.$siswa->foto);


                //ambil informasi file yang diupload
                $file = $request->file('foto');
                
                //rename + ambil nama file
                $nama_file = time()."_".$file->getClientOriginalName();

                //proses upload
                $tujuan_upload = './template/img';
                $file->move($tujuan_upload,$nama_file);

                //menyimpan data
                $siswa->nama = $request->nama;
                $siswa->nisn = $request->nisn;
                $siswa->jk   = $request->jk;
                $siswa->email = $request->email;
                $siswa->alamat = $request->alamat;
                $siswa->about = $request->about;
                $siswa->foto = $nama_file;
                $siswa->save();
                return redirect('Siswa');
            
                
               }else{
                // tanpa ganti foto
                $siswa->nama = $request->nama;
                $siswa->nisn = $request->nisn;
                $siswa->jk   = $request->jk;
                $siswa->email = $request->email;
                $siswa->alamat = $request->alamat;
                $siswa->about = $request->about;
                $siswa->save();
                return redirect('Siswa');
               }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = Siswa::find($id)->delete();
        return redirect('Siswa');
    }

}
