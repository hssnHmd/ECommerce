<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categorie;
use App\Exports\TestsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ItemsController extends Controller
{

    public function excel_get_test()
    {
        $export = new TestsExport([
        [1, 2, 3],
        [4, 5, 6]
    ]);

    return Excel::download($export, 'invoices.xlsx');
    }
    public function index()
    {
        $categorie=Categorie::all();
        $items = Items::all();
        return view('admin.items',[
            'categorie'=>$categorie,
            'items'=>$items
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'label'=>'required|max:255',
            'price'=>'required',
            'categorie'=>'required',
        ]);
        $items=new Items;
        $items->label=$request->label;
        $items->price=$request->price;
        $items->categories_id=$request->categorie;
        $items->save();
        return redirect()->route('items');
        
    }
    public function show_categ(Categorie $categorie)
    {
        
         $categorie=Categorie::all();
        // $items = DB::select('select * from items where categorie_id=?',[$id]);
        $items = $categorie->ittems()->where('categorie_id',1)->get();
dd($items);
        return view('admin.items',[
            'categorie'=>$categorie,
            'items'=>$items
        ]);
        
    }
    public function destroy($id)
    {
        Items::destroy($id);
        return redirect()->route('items');
    }
}