<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor; //memanggil model mentor agar tidak erorr
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$ar_mentor = DB:: tabel('mentor')->get(); //Query Bulilder
        //$ar_mentor = Mentor::all();//eloquent memanggil model
        //return view('frontend.mentor', compact('ar_mentor'));
        if (request()->is('data_mentor')) {
            $ar_mentor = Mentor::orderBy('id','desc')->get(); // Query Builder for admin (disini bebas mau panggil eloquent atau Query builder)
            return view('backend.mentor.index', compact('ar_mentor'));
        } else {
            $ar_mentor = Mentor::all(); // Eloquent for frontend
            return view('frontend.mentor', compact('ar_mentor'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master data mentor u/ dilooping di select option form
        $ar_mentor = Mentor::all();
        $ar_jenis_kelamin = ['laki-laki','perempuan'];
        $ar_skill = ['Web Developer','Analisis Data','UI/UX','Jaringan'];
        return view('backend.mentor.form', compact('ar_mentor','ar_jenis_kelamin','ar_skill'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            //tentukan validasi data berdasarkan constraint field
            [
                'nama' => 'required|max:45',
                'email' => 'required|max:40',
                'jenis_kelamin' => 'required',
                'skill' => 'required',
                'deskripsi' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required|max:13 ',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',//KB
            ],
            //custom pesan errornya berbahasa indonesia
            [
                'nama.required'=>'Nama Wajib Diisi',
                'nama.max'=>'Nama Maksimal 50 karakter',
                'email.required'=>'Email Wajib Diisi',
                'email.max'=>'Email Maksimal 40 karakter',
                'jenis_kelamin.required'=>'Jenis Kelamin Wajib Diisi',
                'skill.required'=>'Skill Wajib Diisi',
                'deskripsi.required'=>'deskrisi Wajib Diisi',
                'alamat.required'=>'alamat Wajib Diisi',
                'no_hp.required'=>'No HP Wajib Diisi',
                'no_hp.max'=>'No HP Maksimal 13 karakter',
                'foto.min'=>'Ukuran file kurang 2 KB',
                'foto.max'=>'Ukuran file melebihi 9000 KB',
                'foto.image'=>'File foto bukan gambar',
                'foto.mimes'=>'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );

        //Mentor::create($request->all());
        //return redirect()->route('data_mentor.index')->with('success','Mentor created successfully!!!');
        
        //------------apakah user  ingin upload foto--------- --
        if(!empty($request->foto)){
            $fileName = 'mentor_'.date("Ymd_h-i-s").'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('backend/assets/img/mentor'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form dgn query builder
        try{
            DB::table('mentor')->insert(
                [
                    'nama'=>$request->nama,
                    'email'=>$request->email,
                    'jenis_kelamin'=>$request->jenis_kelamin,
                    'skill'=>$request->skill,
                    'deskripsi'=>$request->deskripsi,
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                    'foto'=>$fileName,
                    //'created_at'=>now(),
                ]);
        
            return redirect()->route('data_mentor.index')
                            ->with('success','Data Mentor Baru Berhasil Disimpan');
        }
        catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('data_mentor.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Mentor::find($id);
        return view('backend.mentor.detail_mentor',compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ar_mentor = Mentor::all();
        $ar_jenis_kelamin = ['laki-laki','perempuan'];
        $ar_skill = ['Web Developer','Analisis Data','UI/UX','Jaringan'];
        $row = Mentor::find($id);
        return view('backend.mentor.form_edit', compact('row','ar_mentor','ar_jenis_kelamin','ar_skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            //tentukan validasi data berdasarkan constraint field
            [
                'nama' => 'required|max:45',
                'email' => 'required|max:40',
                'jenis_kelamin' => 'required',
                'skill' => 'required',
                'deskripsi' => 'required',
                'alamat' => 'required',
                'no_hp' => 'required|max:13 ',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',//KB
            ],
            //custom pesan errornya berbahasa indonesia
            [
                'nama.required'=>'Nama Wajib Diisi',
                'nama.max'=>'Nama Maksimal 50 karakter',
                'email.required'=>'Email Wajib Diisi',
                'email.max'=>'Email Maksimal 40 karakter',
                'jenis_kelamin.required'=>'Jenis Kelamin Wajib Diisi',
                'skill.required'=>'Skill Wajib Diisi',
                'deskripsi.required'=>'deskrisi Wajib Diisi',
                'alamat.required'=>'alamat Wajib Diisi',
                'no_hp.required'=>'No HP Wajib Diisi',
                'no_hp.max'=>'No HP Maksimal 13 karakter',
                'foto.min'=>'Ukuran file kurang 2 KB',
                'foto.max'=>'Ukuran file melebihi 9000 KB',
                'foto.image'=>'File foto bukan gambar',
                'foto.mimes'=>'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('mentor')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
        $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($namaFileFotoLama)) unlink('backend/assets/img/mentor/'.$namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'mentor_'.date("Ymd_h-i-s").'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('backend/assets/img/mentor'),$fileName);
        }
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('mentor')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'skill'=>$request->skill,
                'deskripsi'=>$request->deskripsi,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp,
                'foto'=>$fileName,
                //'created_at'=>now(),
            ]);
            return redirect('/mentor'.'/'.$id)->with('success','Data Mentor Baru Berhasil Ubah'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Mentor::find($id);
        if(!empty($row->foto)) unlink('backend/assets/img/mentor/'.$row->foto);
        //hapus datanya dari tabel
        Mentor::where('id',$id)->delete();
        return redirect()->route('data_mentor.index')->with('success','Data mentor Berhasil Dihapus');

    }
}
