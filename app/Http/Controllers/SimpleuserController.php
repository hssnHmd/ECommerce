<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class SimpleuserController extends Controller
{
    public function index()
    {
        $items=Items::all();
        return view('user.item_simple',[
            'items'=>$items
        ]);
    }
    public function index_details(Items $item)
    {
       $comments=$item->comments()->get();
        return view('user.details_item',[
            
            'item'=>$item,
            'comments'=>$comments
        ]);
    }
}