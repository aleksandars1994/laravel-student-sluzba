<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Subject;
use App\Info;
use App\User;
use App\Exam;


class SubjectsController extends Controller
{
    public function indexCheck(){

        $em = Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        $exam = Exam::where('code_stud',$stud)->pluck('code_subject');
        $index=Subject::whereNotIn('id',$exam)->get();                
    	return view('links.biranje_p',compact('index'));
    
    }
    public function indexPreview(){

        $em = Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        $exam = Exam::where('code_stud',$stud)->pluck('code_subject');
        $index=Subject::whereIn('id',$exam)->get();                
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
            'espb'=>'required',
            'rok'=>'required',
            'profesor'=>'required',
            'datum_polaganja'=>'required'
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
        $store->espb=request('espb');
        $store->deadline=request('rok');
        $store->signed_by=request('profesor');
        $store->date=request('datum_polaganja');
        $store->save();

        return redirect()->back()->with('success', 'Kreiran je nov predmet!'); 
    }
    public function SearchSubject(){
        $q = Input::get ( 'q' );
        $user = Subject::where('name','LIKE','%'.$q.'%')->get();
        
         if(count($user) > 0 && $q!="")
            return view('admin.search_subjects_database')->withDetails($user)->withQuery ( $q );
        else
         return view ('admin.search_subjects_database');
    }
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
        $update->espb=request('espb');
        $update->deadline=request('rok');
        $update->signed_by=request('potpisao');
        $update->deadline=request('rok');
        $update->date=request('date');
        $update->save();

        return redirect('/home/moji_predmeti');
    }
    public function remove($id){

    	$delete=Subject::find($id)->delete();
    	return redirect('/home/administracija');
    }
}
