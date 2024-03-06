<?php

namespace App\Livewire\Home\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginComponent extends Component
{
    public $email;
    public $password;
    public $errorMessage;



    public function render()
    {
        return view('livewire.home.auth.login-component');
    }


   
    public function mount() {
      
        $this->fill(['email' => 'user@user.com', 'password' => '123456']);    
    }

    
    public function submit()
    {
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('home');
         }else{
            dd('failed');
         }

    }
}
