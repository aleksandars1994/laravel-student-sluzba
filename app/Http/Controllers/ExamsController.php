<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Activities;
use App\Exam;
use App\Student;
use App\Subject;

class ExamsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	
        $em = Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        $exam = Exam::where('code_stud',$stud)->where('start','!=','1')->pluck('code_subject');
        $details=Subject::whereIn('id',$exam)->get();

    	return view('links.prijava_ispita',compact('details'));
    }

    public function startExam($id){

        $sign=Exam::where('code_subject',$id)->update(['start' => 1]);

        return redirect()->back()->with('success','Prijavili ste predmet');
    }

    public function store(Request $request){
    	$this->validate($request,[
            'sif_stud'=>'required',
            'sif_subject'=>'required',
            'sif_activities'=>'required',
            'poeni'=>'required',
            'ocena'=>'required',
            'espb'=>'required',
            'rok'=>'required',
            'datum'=>'required',
            'potpisao'=>'required'
    	]);

    	$store=new Exam;
    	$store->code_stud=request('sif_stud');
        $store->code_subject=request('sif_subject');
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

    public function ShowExam(){

        //izvadili smo studenta
        $em = Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        //izvukli smo predmete koje student moze da polaze
        $search=Exam::with('subject')->where('start','=','1')->where('code_stud','=',$stud)->get();
        //Izvlacimo podatke o predmetu koje je student prijavio da polaze
        
        return view('links.ispiti',compact('search'));

    }

    public function update($id){

    	$update=Exam::find($id);
    	$update->code_stud=request('sif_stud');
        $update->code_subject=request('sif_subject');
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



    public function SubmitSubject($id){
        
        $objects=array();
        $subj = Subject::find($id);
        //izvlacenje podataka o predmetu
        $em=Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        //Izvadili smo id studenta
        
        
        $student=Student::find($stud);
        $predmet_zamena=Subject::where('name',$subj->name)->where('school_year','!=',$subj->school_year)->get();
        for($co=0;count($predmet_zamena)>$co;$co++)
        {
            $objects[$co]=$predmet_zamena[$co]->id;    
        }
        
        $ispis=array();
        
            foreach($objects as $pk=>$pv)
            {
                $ispis[$pk]=Exam::where('code_stud',$student->student_id)->where('code_subject',$pv)->first();
            }
            $mini=array_values($ispis);
            if(!(in_array(null,$ispis)))
            {
                $go=array();
    
                    for($io=0;count($mini)>$io;$io++)
                    {
                        $go[$io]=$mini[$io]->code_act;
                    }

                $delete=array();
                foreach($go as $g=>$o)
                {
                    $delete[$g]=Activities::find($o)->delete();
                }
                $delete=null;
                $delete2=array();
                foreach($ispis as $is=>$it)
                {
                    $delete2[$is]=Exam::where('code_stud',$student->student_id)->where('code_subject',$it)->delete();
                }
                $delete2=null;
            }
            
         $actId=Activities::insertGetId([
        'test_1' => '0',
        'test_2' => '0',
        'test_3' => '0',
        'term_paper_1'=>'0',
        'term_paper_2'=>'0',
        'exam'=>'0'
        ]);
        //napravili smo novu aktivnost i preuzeli id te aktivnosti

        $submit=new Exam;
        $submit->code_stud=$stud;
        $submit->code_subject=$subj->id;
        $submit->code_act=$actId;
        $submit->espb=$subj->espb;
        $submit->deadline=$subj->deadline;
        $submit->date=$subj->date;
        $submit->signed_by=$subj->signed_by;
        $submit->save();
        
        
        return redirect()->back()->with('success','Izabrali ste predmet');
    
    }

    public function remove($id){
    	$delete=Exam::find($id)->delete();
    	return redirect('/home/ispiti');
    }
}
