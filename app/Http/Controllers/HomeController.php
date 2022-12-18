<?php

namespace App\Http\Controllers;

use App\Models\Kontrakan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin.home');
    }
    public function kontrakan(Request $request)
    {

        if ($request->has('search')) {
            $kontrakan = Kontrakan::where('kontrakan', 'LIKE', '%' . $request->search . '%')->paginate(3);
        } else {
            $kontrakan = Kontrakan::paginate(5);
        }


        return view('admin.kontrakan', compact(['kontrakan']));
    }
}
