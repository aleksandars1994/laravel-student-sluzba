<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    public function index(){
    	$index=new Subject;
    	$index=$index::all();
    	return view('links.moji_predmeti',compact('index'));
    }
    public function store(Request $request){

    	$this->validate($request,[
          
            'naziv'=>'required',
            'ngr'=>'required',
            'tip_nastave'=>'required',
            'skolska_godina'=>'required',
            'tip_prijave'=>'required',
            'semestar'=>'required',

    	]);

    	   $store=new Subject;
        $store->name=request('naziv');
        $store->type_of_teaching=request('tip_nastave');
        $store->type_of_application=request('tip_prijave');
        $store->school_year=request('skolska_godina');
        $store->n_gr=request('ngr');
       	$store->term=request('semestar');
       	$store->test_1=request('test1');
       	$store->test_2=request('test2');
       	$store->test_3=request('test3');
       	$store->term_paper_1=request('term_paper_1');
       	$store->term_paper_2=request('term_paper_2');
       	$store->exam=request('exam');
        $store->save();

        return redirect('/admin/kreiraj_novog_studenta');
    }
    public function edit(){}
    public function update($id){

        $update=Subject::find($id);
    	$update->code=request('sifra');
        $update->name=request('naziv');
        $update->type_of_teaching=request('tip_nastave');
        $update->type_of_application=request('tip_prijave');
        $update->school_year=request('skolska_godina');
       	$update->term=request('semestar');
       	$update->test1=request('test1');
       	$update->test2=request('test2');
       	$update->test3=request('test3');
       	$update->term_paper_1=request('term_paper_1');
       	$update->term_paper_2=request('term_paper_2');
       	$update->exam=request('exam');
        $update->save();

        return redirect('/home/moji_predmeti');
    }
    public function remove($id){

    	$delete=Student::find($id)->delete();
    	return redirect('/home/administracija');
    }
}
