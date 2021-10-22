<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Items $item)
    {
        $item->likes()->create([
            'user_id'=>auth()->user()->id
        ]);
        return redirect()->route('details',$item);
    }
    public function unlike(Items $item,Request $request)
    {
        $request->user()->likes()->where('items_id',$item->id)->delete();
        return redirect()->route('details',$item);
    }
}