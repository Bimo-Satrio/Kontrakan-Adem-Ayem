<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\penghuni;
use App\Models\Kontrakan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;



class PenghuniKontrakan extends Component
{

    use WithPagination;
    public $unit_kontrakan, $harga, $nama_penghuni, $nomor_telefon, $id_penghuni;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    protected function rules()
    {
        return [
            'unit_kontrakan' => 'required|string|min:6',
            'harga' => 'required|integer|min:6',
            'nama_penghuni' => 'required|string|min:6',
            'nomor_telefon' => 'required|integer|min:6',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveStudent()
    {
        $validatedData = $this->validate();

        penghuni::create($validatedData);
        session()->flash('message', 'Berhasil');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }



    public function editStudent(int $id_penghuni)
    {
        $Penghuni = penghuni::find($id_penghuni);
        if ($Penghuni) {

            $this->id_penghuni = $Penghuni->id_penghuni;
            $this->unit_kontrakan = $Penghuni->unit_kontrakan;
            $this->harga = $Penghuni->harga;
            $this->nama_penghuni = $Penghuni->nama_penghuni;
            $this->nomor_telefon = $Penghuni->nomor_telefon;
        } else {
            return redirect()->to('/penghuni-kontrakan');
        }
    }

    public function updateStudent()
    {
        $validatedData = $this->validate();

        penghuni::where('id_penghuni', $this->id_penghuni)->update([
            'unit_kontrakan' => $validatedData['unit_kontrakan'],
            'harga' => $validatedData['harga'],
            'nama_penghuni' => $validatedData['nama_penghuni'],
            'nomor_telefon' => $validatedData['nomor_telefon']
        ]);
        session()->flash('message', 'Student Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('closeModal');
    }

    public function deleteStudent(int $id_penghuni)
    {
        $this->id_penghuni = $id_penghuni;
    }

    public function destroyStudent()
    {
        penghuni::find($this->id_penghuni)->delete();
        session()->flash('message', 'Student Deleted Successfully');
        $this->dispatchBrowserEvent('closeModal');
    }


    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->unit_kontrakan = '';
        $this->harga = '';
        $this->nama_penghuni = '';
        $this->nomor_telefon = '';
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        $data_penghuni = DB::table('penghuni')
            ->join('kontrakan', 'kontrakan.id_kontrakan', '=', 'penghuni.id_kontrakan')
            ->join('lama_huni', 'lama_huni.id_lama_huni', '=', 'penghuni.id_lama_huni')
            ->where('nama_penghuni', 'like',  $search)
            ->orWhere('kontrakan', 'like',  $search)
            ->paginate(6);


        return view('livewire.backend.penghuni-kontrakan', ['data_penghuni' => $data_penghuni])
            ->extends('layouts.main')->section('content');
    }
}
