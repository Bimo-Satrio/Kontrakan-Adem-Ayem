<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\FotoKontrakan;

class Viewkontrakan extends Component
{
    public $lat, $long;
    public $geoJson;





    public function mount($id_kontrakan)
    {
        $kontrakan = Kontrakan::where('id_kontrakan', $id_kontrakan)->first();

        $this->id_kontrakan = $kontrakan->id_kontrakan;
        $this->kontrakan = $kontrakan->kontrakan;
        $this->long = $kontrakan->long;
        $this->lat = $kontrakan->lat;
        $this->deskripsi = $kontrakan->deskripsi;
        $this->lokasi = $kontrakan->lokasi;

        $this->harga = $kontrakan->harga;
        $this->stok = $kontrakan->stok;
    }





    // private function getLocations()
    // {
    //     $locations = Kontrakan::orderBy('created_at', 'desc')->get();

    //     $customLocations = [];

    //     foreach ($locations as $location) {
    //         $customLocations[] = [
    //             'type' => 'Feature',
    //             'geometry' => [
    //                 'coordinates' => [
    //                     $location->long, $location->lat
    //                 ],
    //                 'type' => 'Point'
    //             ],
    //             'properties' => [
    //                 'id_kontrakan' => $location->id_kontrakan,
    //                 'kontrakan' => $location->kontrakan

    //             ]

    //         ];
    //     }
    //     $geoLocations = [
    //         'type' => 'FeatureCollection',
    //         'features' => $customLocations
    //     ];
    //     $geoJson = collect($geoLocations)->toJson();
    //     $this->geoJson = $geoJson;
    // }


    public function render()
    {
        // $this->getLocations();
        $FotoKontrakan = FotoKontrakan::where('id_kontrakan', $this->id_kontrakan)->get();
        return view('livewire.backend.viewkontrakan')
            ->extends('layouts.main')->section('content');
    }
}
