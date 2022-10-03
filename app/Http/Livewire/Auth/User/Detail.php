<?php

namespace App\Http\Livewire\Auth\User;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Office;

class Detail extends Component
{
    public $user;
    public $userid;
    public $username;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $password_confirm;
    public $image;
    public $role_id;
    public $office_id;
    public $roles;
    public $offices;

    public function mount(Request $request)
    {
        $user = User::find($request->id);
        $this->user=$user;
        $this->userid=$user->id;
        $this->username=$user->username;
        $this->name=$user->name;
        $this->email=$user->email;
        $this->phone=$user->phone;
        $this->password=$user->password;
        $this->image=$user->image;
        $this->role_id=$user->role_id;
        $this->office_id=$user->office_id;
        $this->roles=Role::all();
        $this->offices=Office::all();
    }

    public function update()
    {
        $user = User::find($this->userid);
        $update = $user->update([
            "username"=>$this->username,
            "name"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "role_id"=>$this->role_id,
            "office_id"=>$this->office_id
        ]);
        if($update){
            session()->flash('success','Update Berhasil!');
            return redirect()->route('auth.users');
        }else{
            session()->flash('error','Update Gagal!');
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.auth.user.detail')->extends('layouts.app2');
    }
}
