<?php

namespace App\Http\Livewire\Backend;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\FotoKontrakan;
use Livewire\WithFileUploads;

class Postkontrakan extends Component
{


    //GIS LOKASI
    public $long, $lat;



    //store
    public $kontrakan, $deskripsi, $lokasi, $harga, $stok, $images = [];

    use WithFileUploads;




    protected function rules()
    {
        return [

            'kontrakan' => 'required|string|min:6',
            'images' => 'max:1024',
            'deskripsi' => 'required|string|min:6',
            'lokasi' => 'required|string|min:6',
            'harga' => 'required|integer|min:6',
            'stok' => 'required|integer|min:1',

        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    public function store()
    {

        $kontrakan = new Kontrakan();
        $kontrakan->kontrakan = $this->kontrakan;
        $kontrakan->deskripsi = $this->deskripsi;
        $kontrakan->lokasi = $this->lokasi;
        $kontrakan->harga = $this->harga;
        $kontrakan->stok = $this->stok;
        $kontrakan->save();

        foreach ($this->images as $key => $image) {
            $pimage = new FotoKontrakan();
            $pimage->id_kontrakan  = $kontrakan->id_kontrakan;

            $imageName = Carbon::now()->timestamp . $key . '.' .  $this->images[$key]->extension();
            $this->images[$key]->storeAs('all', $imageName);

            $pimage->foto = $imageName;
            $pimage->save();
        }
        $this->dispatchBrowserEvent('storepostkontrakan');
    }
    public function render()
    {
        return view('livewire.backend.postkontrakan')
            ->extends('layouts.main')->section('content');
    }
}
