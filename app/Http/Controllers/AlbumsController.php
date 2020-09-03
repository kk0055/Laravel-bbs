<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumsController extends Controller
{
    public function index()
    {
        
        $albums = Album::orderBy('created_at','desc')->get();

        return view('albums.index',
        ['albums' => $albums]);
    }

    public function create()
    {
        return view('albums.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required|max:50',
           'photo'=> 'required|image'
        ],
       [
           'title.required' => 'ひとこと入力してね',
           'title.max' => '50文字までだよ'
       ]
    );
      
       //Heroku以外で使う
        // if($request->hasFile('photo')){
          
            // $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME); 
            // $extension = $request->file('photo')->getClientOriginalExtension();
    
            // //Create New file name
            // $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // $path = $request->file('photo')->storeAs('public/photos',$fileNameToStore);
    
        // }else {
        //     $fileNameToStore= 'noimage.jpg';
        // }

        // $album = new Album;
        // $album->title =$request->input('title');
        // $album->photo =$fileNameToStore;
        $album = new Album;
        $album->title =$request->input('title'); 
        $uploadImg =  $album->photo =$request->file('photo');
        $path = Storage::disk('s3')->putFile('/album', $uploadImg, 'public');
        $album->photo = Storage::disk('s3')->url($path);
        $album->save();

            return redirect('/albums')->with('success','写真が投稿されました');
    }

  public function show($id)
  {
    $album = Album::findOrFail($id);

    return view('albums.show', [
        'album' => $album,
    ]);
  }

  public function destroy($id)
  {
      $album = Album::find($id);
      $album->delete();
    //    return view('albums.delete')->with('album',$album);   
     
      return redirect()->route('album');
  }
}
