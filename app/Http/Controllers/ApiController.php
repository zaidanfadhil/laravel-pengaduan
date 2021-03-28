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


    public function store(Request $request)
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
        return response()->json(['status'=>200, 'message'=>'Success Login', 'user'=>$masyarakat]);
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
        return response()->json(['status'=>200, 'message'=>'Success Login', 'user'=>$masyarakat]);
    }
}
