<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Image;


class ItemController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $msg = '';
        
        $item = new Item;
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->price = $request->price;
        $item->quantity = $request->quantity;

        if ($request->hasFile('picture')){
            $picture = $request->file('picture');

            $pic = $picture->getPathname();
            $filename  = rand(1, 9) . round(microtime(true) * 1000) . rand(1, 9) . '.' . $picture->extension();
            $location = public_path('media/' . $filename);

            if(Image::make($pic)->save($location)){
                $item->picture = $filename;
            }
        } else {
            $item->picture = 'default.jpg';
            $msg = '.But picture is not uploaded because of size or type.';
        }

        $item->save();

        if($item->save()){
            return redirect()->back()->with('msg', 'Successfuly added item to your website' . $msg);
        }
        else {  
            //DELETE THUMBNAIL
            @unlink('images/' . $filename);

            return redirect()->back()->with('msg', 'Error while adding item');
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $item = Item::find($request->input('id'));

        $item->name        = $request->input('name');
        $item->desc        = $request->input('desc');
        $item->price       = $request->input('price');
        $item->quantity    = $request->input('quantity');

        $item->save();

        return redirect()->back()->with('msg', 'Item '. $item->name . ' is successfuly updated.');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
