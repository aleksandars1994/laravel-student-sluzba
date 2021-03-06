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
     public function __construct()
    {
        $this->middleware('auth');
    }    
    
     public function indexCheck(){

        $em = Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        $s_year=Student::where('student_id',$stud)->value('s_year');
        $extract=substr($stud, 0, 2);
        $exam = Exam::where('code_stud',$stud)->pluck('code_subject');
        $index=Subject::whereNotIn('id',$exam)->where('school_year',$s_year)->get();
        $niz=array();
        $niz2=array();
        $dot=array();
        for($i=0;count($index)>$i;$i++)
        {    
            $sifra=$index[$i]->id;
            $smer=$index[$i]->sectors;
            $dot[$sifra]=$smer;
        }
        // return dd($index);
        foreach($dot as $key=>$value)
        {
            $p=explode(",",$value);
            if($extract==$value)
            {
                array_push($niz,$key);
            }
            elseif(in_array($extract,$p))
            {
                array_push($niz,$key); 
            }
        } 
        //return dd($niz);
        $index=array();
            for($i=0;count($niz)>$i;$i++)
            {
                $index[]=Subject::where('id',$niz[$i])->first();
            }
            
        $index=array_values($index);
        //return dd($niz);
        return view('links.biranje_p',compact('index'));
    }
    
    public function indexPreview(){

        $em = Auth::user()->email;
        $stud = Student::where('email',$em)->value('student_id');
        $index= Exam::with('subject','activities')->where('code_stud',$stud)->get();
        return view('links.moji_predmeti',compact('index'));
    
    }

    public function view($id){

        $subj=Subject::find($id);
        return view('admin.helper.subjinfo',compact('subj'));

    }

    public function store(Request $request){

    	$this->validate($request,[
          
            'naziv'=>'required',
            'ngr'=>'required',
            'tip_nastave'=>'required',
            'skolska_godina'=>'required',
            'tip_prijave'=>'required',
            'semestar'=>'required',
            'espb'=>'required|integer',
            'rok'=>'required',
            'profesor'=>'required',
            'datum_polaganja'=>'required|date',
            'sector'=>'required'
    	]);
    	

    	   $store=new Subject;
        $store->name=request('naziv');
        $store->type_of_teaching=request('tip_nastave');
        $store->type_of_application=request('tip_prijave');
        $store->school_year=request('skolska_godina');
        $store->n_gr=request('ngr');
       	$store->term=request('semestar');
       	$store->sectors=implode(",",request('sector'));
       	$store->test_max_1=request('testmax1');
       	$store->test_max_2=request('testmax2');
       	$store->test_max_3=request('testmax3');
       	$store->test_min_1=request('testmin1');
       	$store->test_min_2=request('testmin2');
       	$store->test_min_3=request('testmin3');
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
        /*$q = Input::get ( 'q' );
        $subject = Subject::where('name','LIKE','%'.$q.'%')->get();
        
         if(count($subject) > 0 && $q!="")
            return view('admin.search_subjects_database')->withDetails($subject)->withQuery ( $q );
        else
         return view ('admin.search_subjects_database');*/
         
    }
    
    public function ShowAll()
    {
        $subject=new Subject;
        $subject=$subject->paginate(10);
        return view('admin.search_subjects_database',compact('subject'));
    }
    
    public function update(Request $request,$id){

        $this->validate($request,[
          
            'n_naziv'=>'required',
            'n_tipn'=>'required',
            'n_tipp'=>'required',
            'n_sg'=>'required',
            'n_sem'=>'required',
            'n_max_t1'=>'required',
            'n_max_t2'=>'required',
            'n_max_t3'=>'required',
            'n_min_t1'=>'required',
            'n_min_t2'=>'required',
            'n_min_t3'=>'required',
            'n_s1'=>'required',
            'n_s2'=>'required',
            'n_ispit'=>'required',
            'n_espb'=>'required',
            'n_rok'=>'required',
            'n_pro'=>'required',
            'n_date'=>'required'
        ]);
        $ide=$id;
        $update=Subject::find($id);
        $update->name=request('n_naziv');
        $update->type_of_teaching=request('n_tipn');
        $update->type_of_application=request('n_tipp');
        $update->school_year=request('n_sg');
       	$update->term=request('n_sem');
       	$update->test_max_1=request('n_max_t1');
       	$update->test_max_2=request('n_max_t2');
       	$update->test_max_3=request('n_max_t3');
       	$update->test_min_1=request('n_min_t1');
       	$update->test_min_2=request('n_min_t2');
       	$update->test_min_3=request('n_min_t3');
       	$update->term_paper_1=request('n_s1');
       	$update->term_paper_2=request('n_s2');
       	$update->exam=request('n_ispit');
        $update->espb=request('n_espb');
        $update->deadline=request('n_rok');
        $update->signed_by=request('n_pro');
        $update->date=request('n_date');
        $update->save();

        return redirect('/admin/subj/info/'.$ide);
    }

    public function removeSubject($id){

        $delete1=Exam::where('code_subject',$id)->delete();
    	$delete2=Subject::find($id)->delete();

    	return redirect()->to('/admin/pregledaj_predmete/')->send();
    }
}
