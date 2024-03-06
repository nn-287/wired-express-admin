<?php

namespace App\Livewire\Home;


use Livewire\Component;

class HomeComponent extends Component
{

    public function mount(){
    }

    public function render()
    {
         return view('livewire.home.home')->layout('livewire.layouts.base');
    }
  


}
