<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TFee;
use App\Student;


class TFeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    	
        $em=Auth::user()->email;
        $stud=Student::where('email',$em)->value('student_id');
        $fee=TFee::where('stud_id',$stud)->get();
        //$fee=dd($fee);
    	return view('links.skolarine_i_uplata',compact('fee'));
    }
    public function store(Request $request){

    	$this->validate($request,[
            'student'=>'required|alpha-dash|size:7',
    		'sk_god'=>'required',
            'god'=>'required|numerical|size:4',
            'st_up'=>'required|alpha|size:8',
            'nup'=>'required|alpha',
            'tip'=>'required|alpha',
            'rata'=>'required|numerical',
            'brrata'=>'required|numerical',
            'iznos'=>'required|numerical',
            'rok'=>'required|date'
    	]);
    	
        $sk=request('student');
    	$store=TFee::where('stud_id',$sk)->first();
        if($store){
    	    $store->school_year=request('sk_god');
            $store->study_year=request('god');
            $store->status_of_registration=request('st_up');
            $store->method_of_registration=request('nup');
            $store->type_of_payment=request('tip');
           	$store->rate=request('rata');
           	$store->rate_number=request('brrata');
           	$store->amount=request('iznos');
           	$store->payment_deadline=request('rok');
            $store->save();
            return redirect()->back()->with('success','Azurirana je skolarina studenta!');
            }
        else
            {
            return redirect()->back()->with('success','Student ne postoji');
            }
        
    }
    public function edit(){}
    public function update($id){

        $store=TFee::find($id);
    	$store->school_year=request('skolska_godina');
        $store->study_year=request('godina_upisa');
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
