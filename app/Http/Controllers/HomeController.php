<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use DB;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function searchDni(Request $request){

        $dni = $request->dni;
        $query = DB::table('dbo.CONSOLIDADO_GENERAL')->where('NUM_DOC', $dni)->get();
        return response()->json($query, 200);
    }
}