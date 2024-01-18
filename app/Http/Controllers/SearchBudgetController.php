<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Mark;
use App\Models\PriceRange;

class SearchBudgetController extends Controller
{
    public function index(){
        return view('client.search');
    }

    public function brands(){
        $brands = Mark::all();
        return response()->json($brands);
    }

    public function prices(){
        $prices = PriceRange::orderBy('min', 'asc')->get();
        return response()->json($prices);
    }

    public function cars(){
        $all = Car::with('motorisation.modele.mark', 'generation', 'priceranges')->get();
        $cars = $all->shuffle();
        return CarResource::collection($cars);
    }
}
