<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Models\Role;
use App\Models\Office;
use Livewire\Component;

class Register extends Component
{
    public $username;
    public $name;
    public $email;
    public $phone;
    public $default_password;
    public $role_id;
    public $office_id;
    public $image;
    public $roles;
    public $offices;
    // public $password;
    // public $password_confirmation;

    public function mount()
    {
        $this->default_password = 'user123!';
        $this->image='img/default-user-image.png';
        $roles = Role::all();
        $this->roles=$roles;

        $offices = Office::all();
        $this->offices = $offices;
        
        // dd($offices);
    }
    public function store()
    {
        $this->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone'=>'required',
            'role_id'=>'required',
            'office_id'=>'required'
        ]);

        $user = User::create([
            'username'=>$this->username,
            'name'=>$this->name,
            'email'=>$this->email,
            'phone'=>$this->phone,
            'password'=>bcrypt($this->default_password),
            'image'=>$this->image,
            'role_id'=>$this->role_id,
            'office_id'=>$this->office_id
        ]);

        if($user){
            session()->flash('success','Registrasi Berhasil!');
            return redirect()->route('auth.register');
        }else{
            session()->flash('error','Register Gagal');
            return redirect()->route('auth.register');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app2');
    }
}
