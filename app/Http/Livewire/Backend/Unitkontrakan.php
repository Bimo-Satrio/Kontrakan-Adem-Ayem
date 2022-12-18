<?php

namespace App\Http\Livewire\Backend;

use App\Models\FotoKontrakan;
use Livewire\Component;
use App\Models\Kontrakan;
use Carbon\Carbon;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Unitkontrakan extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $delete_id;


    protected $listeners = ['deleteConfirmed' => 'delete'];

    //store
    protected $paginationTheme = 'bootstrap';
    public $kontrakan, $deskripsi, $lokasi, $harga, $stok, $images = [];

    //edit
    public $FotoKontrakan;


    public $search = '';


    public  function confirmationdelete($id_kontrakan)
    {

        $this->delete_id = $id_kontrakan;
        $this->dispatchBrowserEvent('deleteConfirmation');
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

        session()->flash('message', 'Berhasil');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }



    public function delete()
    {
        $hapus = Kontrakan::where('id_kontrakan', $this->delete_id)->first();
        $hapus->delete();


        $images = FotoKontrakan::where('id_kontrakan', $this->delete_id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
        $this->dispatchBrowserEvent('deletesucess');
    }


    public function render()
    {
        $search = '%' . $this->search . '%';

        $data_kontrakan = Kontrakan::where('kontrakan', 'like',  $search)
            ->orWhere('deskripsi', 'like',  $search)->paginate(5);
        return view('livewire.backend.unitkontrakan', ['data_kontrakan' => $data_kontrakan])
            ->extends('layouts.main')->section('content');
    }
}
