<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;

class InfosController extends Controller
{
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

        return redirect('/admin/postavi_obavestenje/');
    }

    public function edit(){}

    public function update($id){

    	$update=Info::find($id);
    	$update->info=request('Poruka');
        $update->save();

        return redirect('/home/obavestenja');
    }

    public function remove($id){
    	$delete=Info::find($id)->delete();
    	return redirect('/home/obavestenja');
    }
}


