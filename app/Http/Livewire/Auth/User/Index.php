<?php

namespace App\Http\Livewire\Auth\User;

use Livewire\Component;
use App\Models\User;

class Index extends Component
{
    public function delete($id)
    {
        $user = User::find($id);
        
        try{
            $user->delete();
            session()->flash('success','Hapus Berhasil!');
            return redirect()->route('auth.users');
        }catch(Exception $e){
            session()->flash('success','Hapus Gagal!');
            return redirect()->route('auth.users');
        }
    }

    public function resetPassword()
    {
        // dd('here');
        $this->dispatchBrowserEvent('show-reset-password-modal');
    }

    public function render()
    {
        return view('livewire.auth.user.index',[
            'users'=>User::paginate(10),
        ])->extends('layouts.app2');
    }
}
