<?php
 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
 
class AdminAuthController extends Controller
{
    protected $username = 'username';
    
    public function showFormLogin(Request $request)
    {
        $session = $request->session();
        // if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //     //Login Success
        //     return redirect('/admin/plant');
        // }
        if ($session->get('isLoggedIn')){
            return redirect('/admin/plant');
        }
        return view('auth/login', ['session' => $session]);
    }
    
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $session = $request->session();
        $rules = [
            'username'              => 'required|string',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'username.required'        => 'Email wajib diisi',
            'username.string'          => 'Email harus berupa string',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
         
        $username = $request->input('username');
        $password = $request->input('password');

        $admin = Admin::where('username', $username)->first();
        if($admin){
            if (Hash::check($password, $admin->password)) {
                $session->put('isLoggedIn', true);
                return redirect('/admin/plant');
            }
        }
        
        $session->flash('error', 'Username atau password salah');
        return redirect('/admin/login');
        
        // $data = [
        //     'username'  => $request->input('username'),
        //     'password'  => app('hash')->check($request->input('password')),
        // ];

        // Auth::attempt($data);
 
        // if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
        //     //Login Success
        //     return redirect()->route('home');
 
        // } else { // false
 
        //     //Login Fail
        //     $session->flash('error', 'Username atau password salah');
        //     return redirect('/admin/login');
        // }
 
    }
 
    public function showFormRegister(Request $request)
    {
        $session = $request->session();
        return view('auth/register', ['session' => $session]);
    }
 
    public function register(Request $request)
    {
        $session = $request->session();
        $rules = [
            'username'              => 'required|unique:users',
            'password'              => 'required|confirmed'
        ];
 
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'username.unique'       => 'Username sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $admin = new Admin;
        $admin->username = $request->username;
        $admin->password = app('hash')->make($request->password);
        $simpan = $admin->save();
 
        if($simpan){
            $session->flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect('/admin/login');
        } else {
            $session->flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect('/admin/register');
        }
    }
 
    public function logout(Request $request)
    {
        // Auth::logout(); // menghapus session yang aktif
        $session = $request->session();
        $session->flush();
        return redirect('/admin/login');
    }
 
 
}