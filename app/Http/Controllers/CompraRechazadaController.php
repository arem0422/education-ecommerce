<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use App\Product;
use App\Compra;
class CompraRechazadaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('carrito.CompraRechazada');
    }
}
