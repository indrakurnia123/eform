<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email'=>$this->email,'password'=>$this->password]))
        {
            return redirect()->route('dashboard');
        }else{
            session()->flash('error','Email atau Passsword Salah');
            return redirect()->route('login');
        }

    }
    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.login_layout');
    }
}
