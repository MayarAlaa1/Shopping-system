<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;

class ItemController extends Controller
{
    public function index()
    {

        $items = Item::all();
        return view('items.index', [
            'items' => $items,
        ]);
        
    }


    public function create()
    {
        $categories= Category::all();
        return view ('items.create',[
            'categories' =>$categories,
        ]);
    }

    public function store(Request $request)
    {  

        // for image setup and there is an edit in filesystem.php
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('items/'.$filename, File::get($file));
        } else {
            // to add a default image if not found
            $filename = 'item.jpg';
        }



        $item= new Item;

        $item->price =$request->price;
        $item->quantity=$request->quantity;
        $item->image =$filename;
        $item->in_stock=$request->in_stock;
        $item->description =$request->description;
        $item->brand=$request->brand;
        $item->expiration_date=$request->expiration_date;
        $item->min_allowed_stock=$request->min_allowed_stock;
        $item->save();

        //many to many relation
        $item->categories()->sync($request->categories, false);
     
        return redirect()->route('items.index');
    }



    public function edit($id)
    {
            $request= request();
            $itemId=$request->item;
            $item=Item::find($itemId);
            return view('items.edit',[
                'item'=>$item,
            ]);
    
    }



    public function update(Request $request, $id)
    {
        $request=request();
   
        $itemId= $request->item;
        $item=Item::find($itemId);
        $item->quantity=$request->get('quantity');
        $item->description=$request->get('description');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('items/'.$filename, File::get($file));
            // if image not updated leave the last image
            $item->image= $filename;
        } 
        $item->price=$request->get('price');
        $item->in_stock=$request->get('in_stock');
        $item->brand=$request->get('brand');
        $item->expiration_date=$request->get('expiration_date');
        $item->min_allowed_stock=$request->get('min_allowed_stock');
        $item->save();
         
        return redirect('/items');
    }

}
