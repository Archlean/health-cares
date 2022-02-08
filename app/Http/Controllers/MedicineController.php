<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\ObAlkes;
use App\Models\SignaMaster;

class MedicineController extends Controller
{
    public function index(){
        $Items = ObAlkes::paginate(27);
        $userRecipe = Recipe::where('username', auth()->user()->username)->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL']);
    }

    public function findMedicine(Request $request){
        $data = $request->validate([
            'text' => ['required'],
        ]);
        $Items = ObAlkes::where('obatalkes_nama', 'LIKE', '%'.$data['text'].'%')->paginate(27);
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'Concoction'])->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'aVData' => []]);
    }

    public function viewsMedicine($obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->paginate(27);
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'Concoction'])->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'new', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'aVData' => []]);
    }
    
    public function PutMedicine($obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->paginate(27);
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'Concoction'])->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'existing', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'aVData' => []]);
    }

    public function saveSchema(Request $request){
        $Items = ObAlkes::where('obatalkes_kode', $request['medcode'])->get();
        $retrieveData = $request->validate([
            'category' => 'required',
            'recipename' => 'required',
            'quantity' => 'required',
            'signa' => 'required',
            'medcode' => 'required'
        ]);
        
        $fewsData = [
            'username' => auth()->user()->username,
            'category' => $retrieveData['category'],
            'recipe_name' => $retrieveData['recipename'],
            'signa_recipe' => $retrieveData['signa'],
            'quantity' => $retrieveData['quantity'],
            'recipe_detail' => $Items[0]->obatalkes_nama
        ];
        
        $stok = intval($Items[0]->stok);
        $last_stok = $stok - intval($retrieveData['quantity']);

        Recipe::create($fewsData);
        ObAlkes::where(['obatalkes_id' => $Items[0]->obatalkes_id])->update(['stok' => number_format($last_stok)]);

        return redirect('/medicine-list')->with('post-success','Successfull to add new medicine to sheet ' . $retrieveData['recipename'] . ' with category ' . $retrieveData['category']);
    }
    
    public function MedicineResolver(Request $request){
        $retrieveData = $request->validate([
            'category' => 'required',
            'quantity' => 'required',
            'signa' => 'required',
            'id' => 'required'
        ]);
        $Items = ObAlkes::where('obatalkes_id', $retrieveData['id'])->get();
        if ($retrieveData['category'] == 'Order as recipe list'){
            $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'Concoction'])->get();
            if ($userRecipe->count()){
                return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'existing recipe', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'aVData' => $retrieveData]);
            }
            return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'new recipe', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'aVData' => $retrieveData]);
        }
        return back()->with(['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => '', 'overlay' => 'non recipe', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'aVData' => $retrieveData]);
    }

    public function ConSchema(Request $request){
        
    }

    public function singleMedicineInfo($obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->get();
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'Concoction'])->get();
        
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'aVData' => []]);
    }
}
