<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use Session;
use App\Models\Pengguna;
  
  
class AuthControllerUser extends Controller
{
    public function showFormLoginuser()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('loginuser');
    }
  
    public function loginuser(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'keluhan'               => 'required|min:3|max:35',
            'alamat'                => 'required|min:3|max:35',
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'name.required'         => 'Nama wajib diisi',
            'name.name'             => 'Nama tidak valid',
            'keluhan.required'      => 'Keluhan wajib diisi',
            'keluhan.keluhan'       => 'Keluhan tidak valid',
            'alamat.required'       => 'Alamat wajib diisi',
            'alamat.required'       => 'Alamat tidak valid',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'name'      => $request->input('name'),
            'keluhan'   => $request->input('keluhan'),
            'alamat'    => $request->input('alamat'),
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
  
        } else { // false
  
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect()->route('loginuser');
        }
  
    }
  
    public function showFormRegisteruser()
    {
        return view('registeruser');
    }
  
    public function registeruser(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'keluhan'               => 'required|min:3|max:35',
            'alamat'                => 'required|min:3|max:35',
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 3 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'keluhan.required'      => 'Keluhan wajib diisi',
            'keluhan.min'           => 'Keluhan minimal 3 karakter',
            'keluhan.max'           => 'Keluhan maksimal 35 karakter',
            'alamat.required'       => 'Alamat wajib diisi',
            'alamat.min'            => 'Alamat minimal 3 karakter',
            'alamat.max'            => 'Alamat maksimal 35 karakter',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $pengguna = new pengguna;
        $pengguna->name = ucwords(strtolower($request->name));
        $pengguna->keluhan = ucwords(strtolower($request->keluhan));
        $pengguna->alamat = ucwords(strtolower($request->alamat));
        $pengguna->email = strtolower($request->email);
        $pengguna->password = Hash::make($request->password);
        $pengguna->email_verified_at = \Carbon\Carbon::now();
        $simpan = $pengguna->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('homeuser');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('registeruser');
        }
    }
  
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('loginuser');
    }
  
  
}