<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\lama_huni;

class SinglePost extends Component
{
    public $kontrakan;
    public $lama_huni;


    public function mount($id_kontrakan)
    {

        $this->lama_huni = lama_huni::all();
        $this->kontrakan = Kontrakan::find($id_kontrakan);
    }




    public function render()
    {
        return view('livewire.single-post', ['kontrakan' => $this->kontrakan], ['lama_huni' => $this->lama_huni])
            ->extends('layouts.app')->section('content');
    }
}
