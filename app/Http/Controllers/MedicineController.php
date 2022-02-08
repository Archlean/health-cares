<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\ObAlkes;
use App\Models\SignaMaster;
use DateTime;
use SebastianBergmann\Environment\Console;

class MedicineController extends Controller
{
    public function index(){
        $Items = ObAlkes::paginate(27);
        $userRecipe = Recipe::where('username', auth()->user()->username)->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'arData' => [], 'infomessage' => 'nomessage']);
    }

    public function findMedicine(Request $request){
        $data = $request->validate([
            'text' => ['required'],
        ]);
        $Items = ObAlkes::where('obatalkes_nama', 'LIKE', '%'.$data['text'].'%')->paginate(27);
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'arData' => [], 'infomessage' => 'nomessage']);
    }

    public function viewsMedicine($obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->paginate(27);
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'new', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'arData' => [], 'infomessage' => 'nomessage']);
    }
    
    public function PutMedicine($obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->paginate(27);
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'existing', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'ALL', 'arData' => [], 'infomessage' => 'nomessage']);
    }

    public function SaveNewRecipe(Request $request){
        $retrieveData = $request->validate([
            'recipename' => 'required',
            'signa' => 'required',
            'medcode' => 'required',
            'quantity' => 'required'
        ]);
        
        $Items = ObAlkes::where('obatalkes_id', $retrieveData['medcode'])->get();
        $fewsData = [
            'username' => auth()->user()->username,
            'category' => 'recipe / concoction',
            'recipe_name' => $retrieveData['recipename'],
            'recipe_detail' => json_encode(['id'=>$retrieveData['medcode'],'name'=>$Items[0]->obatalkes_nama,'quantity'=>$retrieveData['quantity']]),
            'signa_recipe' => $retrieveData['signa'],
            'quantity' => '1'
        ];
        
        $stok = intval($Items[0]->stok);
        $last_stok = $stok - intval($retrieveData['quantity']);

        Recipe::create($fewsData);
        ObAlkes::where(['obatalkes_id' => $Items[0]->obatalkes_id])->update(['stok' => $last_stok]);

        $Items = ObAlkes::where('obatalkes_id', $retrieveData['medcode'])->get();
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();

        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => $retrieveData, 'infomessage' => 'Successfull to add new recipe into your order list']);
    }

    public function ModifiedDetailRecipe(Request $request){
        $retrieveData = $request->validate([
            'recipename' => 'required',
            'medname' => 'required',
            'medcode' => 'required',
            'quantity' => 'required'
        ]);
        
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();
        $Items = ObAlkes::where('obatalkes_id', $retrieveData['medcode'])->get();

        $detalData[] = json_decode($userRecipe[0]->recipe_detail);
        $newData = ['id'=>$retrieveData['medcode'],'name'=>$Items[0]->obatalkes_nama,'quantity'=>$retrieveData['quantity']];
        
        array_push($detalData, $newData);
        
        $stok = intval($Items[0]->stok);
        $last_stok = $stok - intval($retrieveData['quantity']);

        Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->update(['recipe_detail' => json_encode($detalData)]);
        ObAlkes::where(['obatalkes_id' => $Items[0]->obatalkes_id])->update(['stok' => $last_stok]);

        $Items = ObAlkes::where('obatalkes_id', $retrieveData['medcode'])->get();
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();

        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => $retrieveData, 'infomessage' => 'Successfull to add new medicine into recipe ' . $retrieveData['recipename']]);
    }

    public function SaveOrderMedicineOnly(Request $request){
        $retrieveData = $request->validate([
            'schemname' => 'required',
            'medname' => 'required',
            'quantity' => 'required',
            'signa' => 'required',
            'medcode' => 'required'
        ]);
        
        $fewsData = [
            'username' => auth()->user()->username,
            'category' => 'non recipe / non concoction',
            'recipe_name' => $retrieveData['schemname'],
            'recipe_detail' => json_encode($retrieveData['medname']),
            'signa_recipe' => $retrieveData['signa'],
            'quantity' => $retrieveData['quantity']
        ];
        
        $Items = ObAlkes::where('obatalkes_id', $retrieveData['medcode'])->get();
        $stok = intval($Items[0]->stok);
        $last_stok = $stok - intval($retrieveData['quantity']);

        Recipe::create($fewsData);
        ObAlkes::where(['obatalkes_id' => $Items[0]->obatalkes_id])->update(['stok' => $last_stok]);

        $Items = ObAlkes::where('obatalkes_id', $retrieveData['medcode'])->get();
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();

        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => [], 'infomessage' => 'Successfull to add new medicine scheme into your order list']);
    }
    
    public function MedicineResolver(Request $request){
        $retrieveData = $request->validate([
            'category' => 'required',
            'quantity' => 'required',
            'signa' => 'required',
            'id' => 'required'
        ]);
        $date = new DateTime;
        $Items = ObAlkes::where('obatalkes_id', $retrieveData['id'])->get();
        $retrieveData['orderScheme'] = 'order:med-' . $date->getTimestamp() . '-' . auth()->user()->username;
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();
        if ($retrieveData['category'] == 'Order as recipe list'){
            if ($userRecipe->count()){
                return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'existing recipe', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => $retrieveData, 'infomessage' => 'nomessage']);
            }
            return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'new recipe', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => $retrieveData, 'infomessage' => 'nomessage']);
        }
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => 'non recipe', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => $retrieveData, 'infomessage' => 'nomessage']);
    }

    public function ConSchema(Request $request){
        
    }

    public function singleMedicineInfo($obatalkes_id){
        $Items = ObAlkes::where('obatalkes_id', $obatalkes_id)->get();
        $userRecipe = Recipe::where(['username' => auth()->user()->username, 'category' => 'recipe / concoction'])->get();
        
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items, 'userRecipe' => $userRecipe, 'overlay' => '', 'signa' => SignaMaster::orderBy('signa_nama')->get(), 'views' => 'SPECIFIC', 'arData' => [], 'infomessage' => 'nomessage']);
    }
}
