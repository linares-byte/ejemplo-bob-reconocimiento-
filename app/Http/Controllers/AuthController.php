<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    
    public function registerForm() 
    {
        return view('auth.register');
    }

   
    public function register(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'age' => 'required|integer|min:0|max:120',
            'password' => 'required|confirmed|min:8',
        ]);

       
        $is_admin = false;
        
       
        if (Auth::check() && Auth::user()->is_admin && $request->has('is_admin')) {
            $is_admin = true;
        }

      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'password' => Hash::make($request->password),
            'is_admin' => $is_admin,
        ]);

       
        if (!Auth::check()) {
            Auth::login($user);
        }

        
        $mensaje = $is_admin 
            ? 'Usuario administrador creado exitosamente' 
            : 'Registro exitoso';
        
    
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin-dashboard')
                ->with('success', $mensaje);
        }

       
        return redirect()->route('episodios.index')
            ->with('success', $mensaje);
    }


    public function loginForm() 
    {
        return view('auth.login');
    }


    public function login(Request $request) 
    {
    
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        if (Auth::attempt($data, $request->has('remember'))) {
            $request->session()->regenerate();
            
           
            if (Auth::user()->is_admin) {
                return redirect()->route('admin-dashboard')
                    ->with('success', 'Bienvenido administrador');
            }
            
            return redirect()->route('episodios.index')
                ->with('success', 'Sesión iniciada correctamente');
        } 

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

 
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/acceso')
            ->with('success', 'Sesión cerrada correctamente');
    }


    public function adminDashboard() 
    {
        
        $totalUsuarios = User::count();
        $totalAdmins = User::where('is_admin', true)->count();
        $usuariosRecientes = User::latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalUsuarios', 
            'totalAdmins', 
            'usuariosRecientes'
        ));
    }
}