<?php

namespace App\Http\Controllers;

use Auth; 
use App\Http\Resources\Storie\StorieResource;
use App\Http\Resources\Storie\StorieCollection;
use App\Model\Story;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //return StorieCollection::collection(Story::all());
       return Story::select('stories.id', 'stories.story', 'stories.picture_path', 'stories.bg_position_x',  
                            'stories.bg_position_y','stories.user_id', 'users.lastname', 'users.firstname')
                    ->join('users', 'users.id', '=', 'stories.user_id')
                    ->get();
     //return view('auth.image');
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
    public function store(Request $request, $id)
    {
        
        if($request->hasFile('image')){

         // On récupère l'id de l'utilisateur connecté
           $user_id =  $id;
           
           $picture = $request->file('image');
           
           $filename = $request->image->getClientOriginalName();
           
           $file_path = 'resources/pictures';

           $request->image->move($file_path, $filename);

           $storie = new Story;
           $storie->picture_path =  $filename;
           $storie->bg_position_x =  "center";
           $storie->bg_position_y =  "center";
           $storie->is_active =  0;
           $storie->is_done =  0; 
           $storie->is_demo =  1;
           $storie->user_id = $user_id;
        // $storie->story =  "blablabla";

           $storie->save();

           //return $filename;
           
        } else {
            return "no file";
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Storie  $storie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        //return new StorieResource($story);
        $story = Story::select('stories.id', 'stories.story', 'stories.picture_path', 
        'stories.user_id', 'users.lastname', 'users.firstname')
                                    ->where('stories.id', '=', $id)
                                    ->join('users', 'users.id', '=', 'stories.user_id')
                                    ->get();
        return $story;
                                   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Storie  $storie
     * @return \Illuminate\Http\Response
     */
    public function edit(Storie $storie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requests
     * @param  \App\Model\Storie  $storie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // On récupère l'id de l'utilisateur
        $user_id = $id;
       // On récupère tous les champs de la storie
        $storie = Story::where('stories.user_id', '=', $user_id)->first();
//return $storie;
        //On met à jour les informations de recadrage 
        // On ajoute la story de l'utilisateur

        $storie->story = $request->input('storie');
        $storie->bg_position_x = $request->input('bg_position_x');
        $storie->bg_position_y = $request->input('bg_position_y');
        $storie->is_active =  0;
        $storie->is_done =  1; 
        $storie->is_demo =  1;
        $storie->user_id = $user_id;
       
        $storie->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Storie  $storie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storie $storie)
    {
        //
    }
}
