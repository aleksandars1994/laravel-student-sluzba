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
    		'Red.Br'='required',
            'Sifra'='required',
            'Naziv'='required',
            'N.GR'='required',
            'Tip prijave'='required',
            'Poeni'='required',
            'Ocena'='required',
            'ESPB'='required',
            'Rok'='required',
            'Datum'='required',
            'Potpisao'='required',
            'Aktivnosti'='required'
    	]);

    	$store=new Exam;
    	$store->code=request('Sifra');
        $store->name=request('Naziv')
        $store->n_gr=request('N.GR');
        $store->type_of_sign=request('Tip prijave');
        $store->points=request('Poeni');
       	$store->grade=request('Ocena');
        $store->espb=request('ESPB');
        $store->deadline=request('Rok');
        $store->exam_date=request('Datum');
        $store->signed_by=request('Potpisao');
        $store->save();

        return redirect('/home/ispiti');
    }

    public function edit(){}

    public function update($id){

    	$update=Exam::find($id);
    	$update->code=request('Sifra');
        $update->name=request('Naziv');
        $update->n_gr=request('N.GR');
        $update->type_of_sign=request('Tip prijave');
        $update->points=request('Poeni');
       	$update->grade=request('Ocena');
        $update->espb=request('ESPB');
        $update->deadline=request('Rok');
        $update->exam_date=request('Datum');
        $update->signed_by=request('Potpisao');
        $update->save();

        return redirect('/home/ispiti');
    }

    public function remove($id){
    	$delete=Exam::find($id)->delete();
    	return redirect('/home/ispiti');
    }
}
