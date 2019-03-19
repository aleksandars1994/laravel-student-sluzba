<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Student;
use App\Activities;
use App\Subjects;
use App\TFee;
use App\User;
use App\Exam;

class StudentsController extends Controller
{
    public function index(){
    	$index=new Student;
    	$index=$index::all();
    	return view('links.administracija',compact('index'));
    }
    public function store(Request $request){

    	$this->validate($request,[
            'sifra'=>'required',
            'ime'=>'required',
            'prezime'=>'required',
            'ime_roditelja'=>'required',
            'pol'=>'required',
            'datum_rodjenja'=>'required',
            'mesto'=>'required',
            'jmbg'=>'required|max:11',
            'email'=>'required|unique:users|email',
            'sifra_email'=>'required',
            'phone_num'=>'required',
            'mobile_num'=>'required',
    	]);



            $UserData = new User;
            $UserData->email=request('email');
            $UserData->name=request('ime');
            $UserData->password=request('sifra_email');
            $UserData->save();

            $store=new Student;
            $store->student_id=request('sifra');
            $store->name=request('ime');
            $store->last_name=request('prezime');
            $store->parent_name=request('ime_roditelja');
            $store->gender=request('pol');
            $store->date_of_birth=request('datum_rodjenja');
            $store->city=request('mesto');
            $store->pin=request('jmbg');
            $store->email=request('email');
            $store->password=request('sifra_email');
            $store->phone_num=request('phone_num');
            $store->mobile_num=request('mobile_num');
            $store->save();

            $fees=new TFee;
            $fees->stud_id=request('sifra');
            $fees->save();

            $exam=new Exam;
            $exam->code_stud=request('sifra');
            $exam->save();
        
            return redirect('/admin/kreiraj_novog_studenta/');
        
    }

    public function edit(){}
    public function update($id){

        $update=Student::find($id);
        $update->student_id=request('sifra');
        $update->name=request('ime');
        $update->last_name=request('prezime');
        $update->parent_name=request('ime_roditelja');
        $update->gender=request('pol');
        $update->date_of_birth=request('datum_rodjenja');
        $update->city=request('mesto');
        $update->pin=request('jmbg');
        $update->email=request('email');
        $update->phone_num=request('phone_num');
        $update->mobile_num=request('mobile_num');
        $update->save();

        return redirect('/admin/kreiraj_novog_studenta');
    }
    public function remove($id){

    	$delete=Student::find($id)->delete();
    	return redirect('/home/administracija');
    }
}
