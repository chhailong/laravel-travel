<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PlaceController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $place = Place::all() ; 

        return response()->json([
            'success' => true,
            'message' => 'place list successful',
            'data' => $place
        ]);
        dd($place);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'province_id'=> 'required',
            'image1'=> 'required', 
            'image2'=> 'required',
            'image3'=> 'required',
            'description'=>'required',
        
        ]);
        return Place::create($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $places = Place::find($id);

         // eloquent relationship one to many relatioship
        $provinces = $places->province ;
        $places->province = $provinces ;

        return response()->json([
            'success' => true,
            'message' => 'places show by id successfully ',
            'data' => $places
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {
    


        $place = Place::find($id) ;
        $place->update($request->all()) ;
        // return $place ;
        
         //Erorr update data but shore new id

        // $place->title = $request->get('title') ;
        // $place->province_id = $request->get('province_id') ;
        // $place->image1 = $request->get('image1') ;
        // $place->image2 = $request->get('image2') ;
        // $place->image3 = $request->get('image3') ;
        // $place->description = $request->get('description') ;
        // $place->videos = $request->get('videos') ;
        // $place->location = $request->get('location') ;
        // $place->save() ;

        return response()-> json([
            'success' => true,
            'message' => 'place update successfully',
            'data' => $place
        ]);
        
    }


    /**
     * Remove the specified resource from storage.
     */



     
    public function destroy(string $id)
    {
        // return Place::destroy($id) ;

        $delete = Place::destroy($id) ; 

        return response([

            'message'=> 'delete successfully', 
            'status' => true ,
            'data' => $delete 
        ]);
    }
        //create function search place
        public function search($title){
            return Place::where('title' , 'like' ,'%'.$title.'%')->get() ; 
    
        }
}
