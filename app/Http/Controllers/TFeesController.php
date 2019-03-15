<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TFee;

class TFeesController extends Controller
{
    public function index(){
    	$index=new TFee;
    	$index=$index::all();
    	return view('links.skolarine_i_uplata',compact('index'));
    }
    public function store(Request $request){

    	$this->validate($request,[
    		'skolska_godina'='required',
            'godina_upisa'='required',
            'status_upisa'='required',
            'nacin_upisa'='required',
            'tip_uplate'='required',
            'rata'='required',
            'broj_rata'='required',
            'iznos'='required',
            'rok_uplate'='required'
    	]);
    	 
    	$store=new TFee;
    	$store->school_year=request('skolska_godina');
        $store->study_year=request('godina_upisa')
        $store->status_of_registration=request('status_upisa');
        $store->method_of_registration=request('nacin_upisa');
        $store->type_of_payment=request('tip_uplate');
       	$store->rate=request('rata');
       	$store->rate_number=request('broj_rata');
       	$store->amount=request('iznos');
       	$store->payment_deadline=request('rok_uplate');
        $store->save();

        return redirect('/home/skolarine_i_uplata');
    }
    public function edit(){}
    public function update($id){

        $store=TFee::find($id);
    	$store->school_year=request('skolska_godina');
        $store->study_year=request('godina_upisa')
        $store->status_of_registration=request('status_upisa');
        $store->method_of_registration=request('nacin_upisa');
        $store->type_of_payment=request('tip_uplate');
       	$store->rate=request('rata');
       	$store->rate_number=request('broj_rata');
       	$store->amount=request('iznos');
       	$store->payment_deadline=request('rok_uplate');
        $store->save();

        return redirect('/home/skolarine_i_uplata');
    }
    public function remove($id){

    	$delete=Student::find($id)->delete();
    	return redirect('/home/administracija');
    }
}
