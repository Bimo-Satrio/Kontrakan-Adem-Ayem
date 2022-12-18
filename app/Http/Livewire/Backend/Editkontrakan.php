<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\FotoKontrakan;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Editkontrakan extends Component
{


    use WithFileUploads;



    public $kontrakan, $deskripsi, $lokasi, $harga, $stok, $images = [];

    //edit
    public $id_kontrakan;



    public function mount($id_kontrakan)
    {
        $kontrakan = Kontrakan::where('id_kontrakan', $id_kontrakan)->first();

        $this->id_kontrakan = $kontrakan->id_kontrakan;
        $this->kontrakan = $kontrakan->kontrakan;
        $this->deskripsi = $kontrakan->deskripsi;
        $this->lokasi = $kontrakan->lokasi;
        $this->harga = $kontrakan->harga;
        $this->stok = $kontrakan->stok;
    }




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


    public function editStore()
    {

        $kontrakan = Kontrakan::where('id_kontrakan', $this->id_kontrakan)->first();
        $kontrakan->kontrakan = $this->kontrakan;
        $kontrakan->deskripsi = $this->deskripsi;
        $kontrakan->lokasi = $this->lokasi;
        $kontrakan->harga = $this->harga;
        $kontrakan->stok = $this->stok;
        $kontrakan->save();

        if ($this->images != '') {
            foreach ($this->images as $key => $image) {
                $pimage = new FotoKontrakan();
                $pimage->id_kontrakan  = $kontrakan->id_kontrakan;

                $imageName = Carbon::now()->timestamp . $key . '.' .  $this->images[$key]->extension();
                $this->images[$key]->storeAs('all', $imageName);

                $pimage->foto = $imageName;
                $pimage->save();
            }
        }

        $this->dispatchBrowserEvent('edit-sucess');
    }

    public function deletefoto($id_foto_kontrakan)
    {
        $image = FotoKontrakan::where('id_foto_kontrakan', $id_foto_kontrakan)->first();
        $image->delete();

        session()->flash('message', 'Berhasil');
    }

    public function render()
    {
        $FotoKontrakan = FotoKontrakan::where('id_kontrakan', $this->id_kontrakan)->get();
        return view('livewire.backend.editkontrakan', ['FotoKontrakan' => $FotoKontrakan])
            ->extends('layouts.main')->section('content');
    }
}
