<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;

class ExamsController extends Controller
{
    public function index(){
    	$index=new Exam;
    	$index=$index::all();

    	return view('links.ispiti',compact(index));
    }

    public function store(Request $request){
    	$this->validate($request,[
            'sif_stud'=>'required',
            'sif_subject'=>'required',
            'sif_activities'=>'required',
            'poeni'='required',
            'ocena'='required',
            'espb'='required',
            'rok'='required',
            'datum'='required',
            'potpisao'='required'
    	]);

    	$store=new Exam;
    	$store->code_stud=request('sif_stud');
        $store->code_subject=request('sif_subject')
        $store->code_act=request('sif_activities');
        $store->points=request('poeni');
        $store->grade=request('ocena');
        $store->espb=request('espb');
        $store->deadline=request('rok');
        $store->date=request('datum');
        $store->signed_by=request('potpisao');
        $store->save();

        return redirect('/home/ispiti');
    }

    public function edit(){}

    public function update($id){

    	$update=Exam::find($id);
    	$update->code_stud=request('sif_stud');
        $update->code_subject=request('sif_subject')
        $update->code_act=request('sif_activities');
        $update->points=request('poeni');
        $update->grade=request('ocena');
        $update->espb=request('espb');
        $update->deadline=request('rok');
        $update->date=request('datum');
        $update->signed_by=request('potpisao');
        $update->save();

        return redirect('/home/ispiti');
    }

    public function remove($id){
    	$delete=Exam::find($id)->delete();
    	return redirect('/home/ispiti');
    }
}
