<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function delete_api()
        {
            
            return Categorie::all();
        }
    public function index()
    {
        $bool=null;
        $categ=null;
        $categorie=Categorie::paginate(5);
        return view('admin.categorie', [
            'categorie'=>$categorie,
            'categ'=>$categ,
            'bool'=>$bool
        ]);
    }
    public function store(Request $request)
    {
        
        
        $this->validate($request, [
            'label'=>'required'
        ]);
        $categorie=new Categorie;
        $categorie->label=$request->label;
        $categorie->save();
        return Categorie::all();
    }
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categorie');
    }
    public function get_update_cat($id)
    {
        $categ=Categorie::find($id);
        $categorie=Categorie::paginate(5);
        $update_bool=1;
        return view('admin.categorie', [
            'categorie'=>$categorie,
            'categ'=>$categ,
            'bool'=>$update_bool
        ]);
    }
    public function update_cat(Categorie $categorie,Request $request)
    {
        $categorie->label=$request->label;
        $categorie->update();
         return redirect()->route('categorie');
    }
}