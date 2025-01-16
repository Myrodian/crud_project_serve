<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'essential_data' => 'required', // Adicione as validações necessárias
        ]);

        $user = auth()->user();
        $user->essential_data = $request->essential_data;
        $user->save();

        return redirect()->route('home')->with('status', 'Dados essenciais atualizados com sucesso!');
    }
}