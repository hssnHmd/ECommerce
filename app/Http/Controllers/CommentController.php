<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,Items $item)
    {
        $this->validate($request,[
            'comment'=>'required'
        ]);
        $item->comments()->create([
        'user_id'=>auth()->user()->id,
        'comment'=>$request->comment
        ]);
        return redirect()->route('details',$item);
        
    }
}