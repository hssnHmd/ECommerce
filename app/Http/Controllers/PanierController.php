<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function api_test()
    {
        return ["user"=>User::all(),"item"=>Items::all()];
    }
    public function index(Request $request)
    {
        $paniers=$request->user()->paniers()->get();

        $items=$paniers->map(function ($paniers) {
            return $paniers->items()->get();
        });
        return view('user.panier', ['items'=>$items]);
      
    }
    public function store(Request $request, Items $items)
    {
        $items->paniers()->create([
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->route('items');
    }
}