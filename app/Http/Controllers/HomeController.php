<?php

namespace App\Http\Controllers;

use App\Pasien;
use App\Dokter;
use App\Dataset;
use App\FilePasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use App\Charts\UserChart;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()){
            return view('home');
        }else{
            return view('auth.login');
        }
    }

    public function profile()
    {
        if(Auth::user()){
            return view('profile');
        }else{
            return view('auth.login');
        }
    }
    public function formdaftar()
    {
        if(Auth::user()){
            $dokter = Dokter::get();
            return view('formdaftar',['dokter' => $dokter]);
        }else{
            return view('auth.login');
        }
    }
    public function listpasien()
    {
        if(Auth::user()){
            $pasien = Pasien::get();
            return view('listpasien',['pasien' => $pasien]);
        }else{
            return view('auth.login');
        }
    }
    public function tambahpasien(Request $request)
    {
        if(Auth::user()){
            $file = "";
            $status = 0;
            Pasien::create([
                'dokter_id' => $request->dokter_id,
                'name' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_telp' => $request->no_telp,
                'jeniskelamin' => $request->jeniskelamin,
                'alamat' => $request->alamat,
                'file' => $file,
                'hasilproses' => $file,
                'status' => $status,
                'label' => $status,
            ]);

            return redirect('/form-daftar')->with(['alert' => 'Data Berhasil Ditambahkan !!!']);
        }else{
            return view('auth.login');
        }
    }
    public function prosestambahdata($id, Request $request)
    {
        if(Auth::user()){
            $nama_file = "test.txt";

            $txtFile = public_path('storage/upload/files/'. $nama_file);

            //Ubah nama file
            $pasien = Pasien::find($id);
            $namabaru = $pasien->id."_".$pasien->name;
            move_uploaded_file($txtFile, "storage/upload/files".$namabaru);

            //Update nama file di Database
            $pasien->file = $namabaru;
            $pasien->save();

            FilePasien::create([
                'dokter_id' => $pasien->dokter_id,
                'pasien_id' => $pasien->id,
                'filename' => $namabaru,
            ]);

            $path_id = 1;
            $path = Dataset::find($path_id);
            $path->id_pasien = $pasien->id;
            $path->nama = $pasien->name;
            $path->pathdata = $namabaru;
            $path->save();

            return redirect('/list-pasien')->with(['alert' => 'Data Berhasil Ditambahkan !!!']);
        }else{
            return view('auth.login');
        }
    }
    public function tambahdatapasien($id)
    {
        if(Auth::user()){
            //Read File
            $dataSignal = "dataSignal.txt";
            // $txtFile = public_path('storage/upload/files/'. $nama_file);

            //Ubah Nama File
            $pasien = Pasien::find($id);
            $namabaru = $pasien->id."_".$pasien->name.".txt";
            // move_uploaded_file($txtFile, "storage/upload/files/dokter/".$namabaru);
            Storage::move("public/upload/files/".$dataSignal, "public/upload/files/dokter/".$namabaru);

            //Update nama file di Database
            $pasien->file = $namabaru;
            $pasien->save();

            FilePasien::create([
                'dokter_id' => $pasien->dokter_id,
                'pasien_id' => $pasien->id,
                'filename' => $namabaru,
            ]);

            $path_id = 1;
            $path = Dataset::find($path_id);
            $path->id_pasien = $pasien->id;
            $path->nama = $pasien->name;
            $path->pathdata = $namabaru;
            $path->save();

            return redirect('/list-pasien');
        }else{
            return view('auth.login');
        }
    }
    public function hapusdata($id)
    {
        if(Auth::user()){
            $pasien = Pasien::find($id);
            $file_pasien = FilePasien::where('pasien_id',$id)->delete();

            #delete file from directory
            $file_hasilproses = $pasien->hasilproses;
            $file_preproses = $pasien->file;
            $pathfile_hasilproses = public_path('storage/upload/files/hasilproses/'. $file_hasilproses);
            $pathfile_preproses = public_path('storage/upload/files/dokter/'. $file_preproses);

            File::delete($pathfile_hasilproses);
            File::delete($pathfile_preproses);

            #delete datebase pasien
            Pasien::where('id',$id)->delete();
            return redirect('/list-pasien')->with(['alert' => 'Data Berhasil Dihapus !!!']);
        }else{
            return view('auth.login');
        }
    }

    public function prosesdata($id)
    {
        if(Auth::user()){
            $id_path = 1;
            $pasien = Pasien::find($id);
            $dataset = Dataset::find($id_path);

            #set id_pasien and nama in datasets from database
            $dataset->id_pasien = $pasien->id;
            $dataset->nama = $pasien->name;
            $dataset->pathdata = $pasien->file;
            $dataset->label = $pasien->label;
            $dataset->save();

            # Execute Python From Laravel
            // chdir('C:\Users/rafli/PycharmProjects/projectCAD/ML_Predict.py 2>&1');
            // $output = shell_exec("python ML_Predict.py 2>&1");

            $status = 1;
            $pasien->status = $status;
            $pasien->save();

            return redirect('/list-pasien');
        }else{
            return view('auth.login');
        }
    }
    public function detaildata($id)
    {
        if(Auth::user()){
            $pasien = Pasien::find($id);
            $filename = $pasien->hasilproses;

            //read filetxt
            $txtFile = public_path('storage/upload/files/hasilproses/'. $filename);

            $file = fopen($txtFile,"r");
            $array_file = array();
            while (!feof($file)){
                $array_file[] = fgets($file);
            }
            fclose($file);

            $label = array();
            $hasil = array();
            $hasil['pasien'] = $pasien;
            $hasil['dataset'] = $array_file;
            foreach($hasil['dataset'] as $key => $value) {
                // array_push($label, $key);
                $label[] = $key;
            }

            return view('detailpasien',[
                'hasil' => $hasil,
                'label' => $label,
            ]);
        }else{
            return view('auth.login');
        }
    }

}
