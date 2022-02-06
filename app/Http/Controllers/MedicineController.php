<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObAlkes;

class MedicineController extends Controller
{
    public function index(){
        $Items = ObAlkes::paginate(27);
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items]);
    }

    public function findMedicine(Request $request){
        $data = $request->validate([
            'text' => ['required'],
        ]);
        $Items = ObAlkes::where('obatalkes_nama', 'LIKE', '%'.$data['text'].'%')->paginate(27);
        return view('medicine.index', ['routes' => 'Medicine List', 'items' => $Items]);
    }
}
