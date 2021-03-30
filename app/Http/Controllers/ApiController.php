<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Masyarakat;
use App\Pengaduan;
use App\Tanggapan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class ApiController extends Controller
{
    public function index()
    {
        $pengaduan=Pengaduan::all();
        return response()->json($pengaduan, 200);
    }

    public function getMasyarakat()
    {

        $masyarakat = Masyarakat::all();
        return response()->json($masyarakat, 200);

    }

    public function login(Request $request)
    {
        $credentials = Masyarakat::where('username',$request->username)->first();
        if(!$credentials){
            return response()->json(['status'=>404, 'message'=>'user not found!']);
        }
        if (!Hash::check($request->password, $credentials->password)) {
            return response()->json(['status'=>401, 'message'=>'please check your password!']);
        }
        $credentials->update(['api_token'=> \str_random(20)]);
        return response()->json(['status'=>200, 'message'=>'Success Login', 'user'=>$credentials]);
    }


    public function index1()
    {
        $pengaduan = Pengaduan::all();

        return $this->sendResponse($pengaduan->toArray(), 'peng$pengaduan retrieved successfully.');
    }


    public function register(Request $request)
    {
        try {
            $masyarakat = New Masyarakat;
            $masyarakat->nik =$request->nik;
            $masyarakat->nama =$request->nama;
            $masyarakat->username = $request->username;
            $masyarakat->password =bcrypt($request->password) ;
            $masyarakat->telp = $request->telp;
            $masyarakat->save();
        } catch (\Throwable $th) {
            return $th;
        }
        return response()->json(['status'=>200, 'message'=>'Success register', 'user'=>$masyarakat]);
    }

    public function tanggapan()

    {
        $tanggapan = Tanggapan::all();
        return response()->json($tanggapan, 200);
    }

    public function logout(Request $request)
    {
        $header = $request->header('Authorization');
        $token = explode(' ', $header)[1];
        $masyarakat = Masyarakat::where('api_token', $token)->first();
        $masyarakat->api_token = null;
        $masyarakat->save();
        return response()->json(['status'=>200, 'message'=>'Success logout', 'user'=>$masyarakat]);
    }
    public function getPengaduan()
  {
    $data = Pengaduans::all();
    if ($data) {
      return response()->json([
        'success' =>  true,
        'code'    =>  200,
        'message' =>  'Success get Pengaduan',
        'data'    =>  $data
      ], 200);
    } else {
      return response()->json([
        'success' =>  true,
        'code'    =>  400,
        'message' =>  'Failed Get Pengaduan',
        'data'    =>  ''
      ], 400);
    }
  }

  public function createPengaduan(Request $request)
  {
    $masyarakat = Masyarakat::where('api_token', explode(' ', $request->header('Authorization'))[1])->first();
    //get image
    if ($request->hasFile('foto')) {
      $original_filename  = $request
      ->file('foto')
      ->getClientOriginalName();
    $original_filename_arr  = explode('.', $original_filename);
    $file_ext = end($original_filename_arr);
    $destination_path = './img';
    $image  = 'A-' . time() . '.' . $file_ext;
    $request->file('foto')->move($destination_path, $image);
    $fotopengaduan = 'http://127.0.0.1:8000/img/' . $image;
    }


    $tanggal_pengaduan  = $request->input('tanggal_pengaduan');
    $isi_laporan    = $request->input('isi_laporan');
    $foto           = $request->input('foto');
    $status    = $request->input('status');
    //get data
    $data = [
      'tanggal_pengaduan' =>  $tanggal_pengaduan,
      'nik' =>  $masyarakat->nik,
      'isi_laporan'      =>  $isi_laporan,
      'foto'   =>  $image,
      'status'          =>  '0'
    ];

    if (Pengaduan::create($data)) {
      return response()->json([
        'success' =>  true,
        'code'    =>  200,
        'message' =>  'Pengaduan was Created',
        'data'    =>  $data
      ], 200);
    } else {
      return response()->json([
        'success' =>  false,
        'code'    =>  400,
        'message' =>  'Pengaduan created failed',
        'data'    =>  ''
      ], 400);
    }
  }

  
  public function getPengaduanId($id)
  {
    $data = Pengaduan::where('id', $id)->get();

    return response()->json([
      'success' => true,
      'code'    =>  200,
      'message' =>  'success get pengaduan by id',
      'data'    =>  $data
    ], 200);
  }

  //update status
  public function updateStatus(Request $request, $id)
  {
    $data = Pengaduans::find($id);

    $data->update([
      'status'  =>  $request->status
    ]);

    if ($data) {
      return response()->json([
        'success' =>  true,
        'code'    =>  200,
        'message' =>  'success update status',
        'data'    =>  $data
      ], 200);
    }
  
}
}