<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$ar_peserta = DB:: tabel('peserta')->get(); //Query Bulilder
        //$ar_peserta = Peserta::all();//eloquent memanggil model
        //return view('frontend.peserta', compact('ar_peserta'));
        if (request()->is('peserta')) {
            $ar_peserta = Peserta::orderBy('id','desc')->get(); //Untuk Mengurutkan data yang baru di paling atas
            //$ar_peserta = Peserta::all(); // Query Builder for admin
            return view('backend.peserta.index', compact('ar_peserta'));
        } else {
            $jml_peserta = Peserta::count();
            //$ar_peserta = Peserta::all(); // Eloquent for frontend
            return view('frontend.home', compact('jml_peserta'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //ambil master data peserta u/ dilooping di select option form
        $ar_peserta = Peserta::all();
        $ar_jenis_kelamin = ['laki-laki','perempuan'];
        return view('backend.peserta.form', compact('ar_peserta','ar_jenis_kelamin'));
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
                'alamat.required'=>'alamat Wajib Diisi',
                'no_hp.required'=>'No HP Wajib Diisi',
                'no_hp.max'=>'No HP Maksimal 13 karakter',
                'foto.min'=>'Ukuran file kurang 2 KB',
                'foto.max'=>'Ukuran file melebihi 9000 KB',
                'foto.image'=>'File foto bukan gambar',
                'foto.mimes'=>'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );

        //Peserta::create($request->all());
        //return redirect()->route('peserta.index')->with('success','Peserta created successfully!!!');
        
        //------------apakah user  ingin upload foto--------- --
        if(!empty($request->foto)){
            $fileName = 'course_'.date("Ymd_h-i-s").'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('backend/assets/img/peserta'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form dgn query builder
        try{
            DB::table('peserta')->insert(
                [
                    'nama'=>$request->nama,
                    'email'=>$request->email,
                    'jenis_kelamin'=>$request->jenis_kelamin,
                    'alamat'=>$request->alamat,
                    'no_hp'=>$request->no_hp,
                    'foto'=>$fileName,
                    //'created_at'=>now(),
                ]);
        
            return redirect()->route('peserta.index')
                            ->with('success','Data Peserta Baru Berhasil Disimpan');
            //return redirect()->back();
        }
        catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('peserta.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Peserta::find($id);
        return view('backend.peserta.detail_peserta',compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ar_peserta = Peserta::all();
        $ar_jenis_kelamin = ['laki-laki','perempuan'];
        $row = Peserta::find($id);
        return view('backend.peserta.form_edit', compact('row','ar_peserta','ar_jenis_kelamin'));
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
        $foto = DB::table('peserta')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
        $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($namaFileFotoLama)) unlink('backend/assets/img/peserta/'.$namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'peserta_'.date("Ymd_h-i-s").'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('backend/assets/img/peserta'),$fileName);
        }
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('peserta')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp,
                'foto'=>$fileName,
                //'created_at'=>now(),
            ]);
            return redirect('/peserta'.'/'.$id)->with('success','Data Peserta Baru Berhasil Ubah'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Peserta::find($id);
        if(!empty($row->foto)) unlink('backend/assets/img/peserta/'.$row->foto);
        //hapus datanya dari tabel
        Peserta::where('id',$id)->delete();
        return redirect()->route('peserta.index')
                         ->with('success','Data peserta Berhasil Dihapus');

    }
}
