<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function verificar(Request $request)
    {
        $regras = [
            'email' => 'required|email',
            'senha' => 'required'
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'email' => 'O campo e-mail deve estar no formato correto.'
        ];

        $request->validate($regras, $feedbacks);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->senha, $user->password) && $user->administrador) {
            Auth::login($user);
            return redirect()->route('aluno.index');
        } else {
            return redirect()->route('login')->withErrors(['login' => 'E-mail ou senha incorretos!']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return view('index');
    }
}
