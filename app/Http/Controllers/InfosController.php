<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Info;

class InfosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function index(){
    	$index=new Info;
    	$index=$index::all();

    	return view('links.info',compact('index'));
        
    }


    public function store(Request $request){

    	$this->validate($request,[
    		'Poruka'=>'required'
 			]);

    	$store = new Info;
    	$store->info = request('Poruka');
        $store->save();

        return redirect()->back()->with('success','Napravili ste novo obavestenje!');
    }


    public function edit($id){
        $edit=Info::find($id);
        return view('admin.helper.updateInfo',compact('edit'));
    }

    public function update( Request $request,$id){

         $validator = Validator::make($request->all(), [
            'n_poruka' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator,'info')
                        ->withInput();
        }

    	$update=Info::find($id);
    	$update->info=request('n_poruka');
        $update->save();

        return redirect('/admin/postavi_obavestenje/');
    }

    public function remove($id){
    	$delete=Info::find($id)->delete();
    	return redirect('/admin/postavi_obavestenje/');
    }
}


