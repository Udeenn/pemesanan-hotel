<?php

namespace App\Http\Controllers;

use App\Models\M_room;
use Illuminate\Http\Request;

class MRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = M_room::all();
        return view('admin.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_name'=>'required',
            'room_description'=>'required',
            'room_price'=>'required',
            'room_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $imageName = null;

        if($request->hasFile('room_picture')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('pictures'), $imageName);
        }

        M_room::create([
            'room_name'=>$request->room_name,
            'room_description'=>$request->room_description,
            'room_price'=>$request->room_price,
            'room_picture'=>$request->$imageName
        ]);

        return redirect()->route('admin.index')->with('room has successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(M_room $m_room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rooms = M_room::findOrFail($id);
        return view('admin.edit', compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_name'=>'required',
            'room_description'=>'required',
            'room_price'=>'required'
        ]);

        $rooms = M_room::findOrFail($id);

        $rooms->update([
            'room_name'=>$request->room_name,
            'room_description'=>$request->room_description,
            'room_price'=>$request->room_price
        ]);

        return redirect()->route('admin.index')->with('produk berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rooms = M_room::where('id_product', $id)->firstOrFail();
        if ($rooms->image && file_exists(public_path('images/' . $rooms->image))) {
            unlink(public_path('images/' . $rooms->image));
        }
        $rooms->delete();
        return redirect()->route('admin.index')->with('produk berhasil dihapus');
    
    }
}
