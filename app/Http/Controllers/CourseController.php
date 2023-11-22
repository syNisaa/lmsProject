<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;//panggil model
use App\Models\Kategori;//panggil model
use App\Models\Mentor;//panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use PDF;
use App\Exports\CourseExport;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          //$ar_course = DB:: tabel('course')->get(); //Query Bulilder
          //$ar_course = Course::all();//eloquent
          //return view('backend.course.index', compact('ar_course'));
          if (request()->is('data_course')) {
            $ar_course = Course::orderBy('id', 'desc')->get(); // Query Builder for admin
            return view('backend.course.index', compact('ar_course'));
        } else {
            $ar_course = Course::all(); // Eloquent for frontend
            return view('frontend.course', compact('ar_course'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_mentor = Mentor::all();
        $ar_kategori = Kategori::all();
        $ar_level = ['Pemula','Menengah','Lanjut'];
        return view('backend.course.form', compact('ar_mentor','ar_kategori','ar_level'));
    }

    /**
     * Store a newly created resource in storage.
     */
   /* public function store(Request $request)
    {   
        Course::create($request->all());
        return redirect()->route('data_course.index')->with('success','Course created successfully!!!');
    }*/
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            //tentukan validasi data berdasarkan constraint field
            [
                'nama' => 'required|max:45',
                'deskripsi' => 'required|max:45',
                'level' => 'required',
                'kategori_id' => 'required|integer',
                'mentor_id' => 'required|integer',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',//KB
            ],
            //custom pesan errornya berbahasa indonesia
            [
                'nama.required'=>'Nama Wajib Diisi',
                'nama.max'=>'Nama Maksimal 50 karakter',
                'deskripsi.required'=>'deskrisi Wajib Diisi',
                'deskripsi.max'=>'Nama Maksimal 50 karakter',
                'level.required'=>'Level Wajib Diisi',
                'kategori_id.required'=>'Kategori Wajib Diisi',
                'kategori_id.integer'=>'Kategori tidak boleh kosong',
                'mentor_id.required'=>'Kategori Wajib Diisi',
                'mentor_id.integer'=>'Mentor tidak boleh kosong',
                'foto.min'=>'Ukuran file kurang 2 KB',
                'foto.max'=>'Ukuran file melebihi 9000 KB',
                'foto.image'=>'File foto bukan gambar',
                'foto.mimes'=>'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );

        //Course::create($request->all());
        //return redirect()->route('data_mentor.index')->with('success','Asset created successfully!!!');
        
        //------------apakah user  ingin upload foto--------- --
        if(!empty($request->foto)){
            $fileName = 'course_'.date("Ymd_h-i-s").'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('backend/assets/img/course'),$fileName);
        }
        else{
            $fileName = '';
        }
        //lakukan insert data dari request form dgn query builder
        try{
            DB::table('course')->insert(
                [
                    'nama'=>$request->nama,
                    'deskripsi'=>$request->deskripsi,
                    'level'=>$request->level,
                    'kategori_id'=>$request->kategori_id,
                    'mentor_id'=>$request->mentor_id,
                    'foto'=>$fileName,
                    //'created_at'=>now(),
                ]);
        
            return redirect()->route('data_course.index')->with('success','Data Course Baru Berhasil Disimpan');
        }
        catch (\Exception $e){
            //return redirect()->back()
            return redirect()->route('data_course.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }  
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Course::find($id);
        return view('backend.course.detail_course',compact('rs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_mentor = Mentor::all();
        $ar_kategori = Kategori::all();
        $ar_level = ['Pemula','Menengah','Lanjut'];
        //tampilkan data lama di form edit
        $row = Course::find($id);
        return view('backend.course.form_edit',compact('row','ar_mentor','ar_kategori','ar_level'));
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
                'deskripsi' => 'required|max:45',
                'level' => 'required',
                'kategori_id' => 'required|integer',
                'mentor_id' => 'required|integer',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000',//KB
            ],
            //custom pesan errornya berbahasa indonesia
            [
                'nama.required'=>'Nama Wajib Diisi',
                'nama.max'=>'Nama Maksimal 50 karakter',
                'deskripsi.required'=>'deskrisi Wajib Diisi',
                'deskripsi.max'=>'Nama Maksimal 50 karakter',
                'level.required'=>'Level Wajib Diisi',
                'kategori_id.required'=>'Kategori Wajib Diisi',
                'kategori_id.integer'=>'Kategori Harus tidak boleh kosong',
                'mentor_id.required'=>'Kategori Wajib Diisi',
                'mentor_id.integer'=>'Mentor Harus tidak boleh kosong',
                'foto.min'=>'Ukuran file kurang 2 KB',
                'foto.max'=>'Ukuran file melebihi 9000 KB',
                'foto.image'=>'File foto bukan gambar',
                'foto.mimes'=>'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('course')->select('foto')->where('id',$id)->get();
        foreach($foto as $f){
        $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if(!empty($request->foto)){
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if(!empty($namaFileFotoLama)) unlink('backend/assets/img/course/'.$namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'course_'.date("Ymd_h-i-s").'.'.$request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('backend/assets/img/course'),$fileName);
        }
        else{
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('course')->where('id',$id)->update(
            [
                'nama'=>$request->nama,
                'deskripsi'=>$request->deskripsi,
                'level'=>$request->level,
                'kategori_id'=>$request->kategori_id,
                'mentor_id'=>$request->mentor_id,
                'foto'=>$fileName,
                //'created_at'=>now(),
            ]);
        return redirect()->route('data_course.index')->with('success','Data Course Baru Berhasil Di Ubah'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Course::find($id);
        if(!empty($row->foto)) unlink('backend/assets/img/course/'.$row->foto);
        //hapus datanya dari tabel
        Course::where('id',$id)->delete();
        return redirect()->route('data_course.index')->with('success','Data course Berhasil Dihapus');

    }
   
    public function coursePDF(){
        $ar_course = Course::all();
        $pdf = PDF::loadView('backend.course.coursePDF', ['ar_course'=>$ar_course]);
        return $pdf->download('data_course_'.date('d-m-Y_H:i:s').'.pdf');
    }

    public function courseExcel() 
    {
        return Excel::download(new CourseExport, 'data_course_'.date('d-m-Y_H:i:s').'.xlsx');
    }

}   