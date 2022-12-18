<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kontrakan;

class Home extends Component
{

    public $search = '';



    public function singlepost($id_kontrakan)
    {
        return redirect()->to("/single-post/$id_kontrakan");
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $kontrakan  = Kontrakan::where('kontrakan', 'like',  $search)
            ->orWhere('deskripsi', 'like',  $search)->get();



        return view('livewire.home', ['kontrakan' => $kontrakan])

            ->extends('layouts.app')->section('content');
    }
}
