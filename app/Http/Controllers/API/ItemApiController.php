<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Item;

class ItemApiController extends Controller
{
    public function index()
    {
        return ItemResource::collection(
            Item::all()
    
        ); 
    }

    public function store(Request $request)
    {   
      
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename =time().'.'.$extension;
            Storage::disk('public')->put('items/'.$filename, File::get($file));
        } else {
            $filename = 'item.jpg';
        }
        
        $request->validate([
            'price' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        $date= \Carbon\Carbon::createFromFormat( 'm-d-Y',$request->expiration_date); 
        $item= Item::create([
            'price' => $request->price,
            'description' =>  $request->description,
            'expiration_date' =>  $date,
            'quantity' =>  $request->quantity,
            'image'=>$filename,
            'in_stock' => $request->in_stock,
        ]);
        return new ItemResource($item);
    }
}
