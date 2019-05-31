<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use DB;

class PagesController extends Controller
{
    public function menu() {
        $items = Item::where('quantity','>','0')->get();

        return view('menu', compact('items', $items));
    }
    
    public function order() {
        return view('order');
    }
}
