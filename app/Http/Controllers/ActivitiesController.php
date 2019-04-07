<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Activities;
use App\User;
use App\Student;
use App\Subject;
use App\Exam;


class ActivitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $em=Auth::user()->email;
        $stud = Student::where('email',$em)->pluck('student_id');
        $ex= Exam::with('subject')->where('code_stud',$stud)->get();
        return view('links.aktivnosti',compact('ex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kolokvijum1'=>'required|numeric|digits:2',
            'kolokvijum2'=>'required|numeric|digits:2',
            'seminarski1'=>'required|numeric|digits:2',
            'ispit'=>'required|numeric|min:0|max:50|digits:2'
        ]);

        $store=new Activities;
        $store->test_1=request('kolokvijum1',0);
        $store->test_2=request('kolokvijum2',0);
        $store->test_3=request('kolokvijum3',0);
        $store->term_paper_1=request('seminarski1',0);
        $store->term_paper_2=request('seminarski2',0);
        $store->exam=request('ispit',0);
        $store->save();

        return redirect('/home/administracija');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $em=Auth::user()->email;
        $stud = Student::where('email',$em)->pluck('student_id');
        $ex= Exam::with('subject','activities')->where('code_stud',$stud)->where('code_act',$id)->get();
        return view('aktivnosti-info.infoact',compact('ex'));
    }

    public function showInfo($id)
    {
        $em=Auth::user()->email;
        $stud = Student::where('email',$em)->pluck('student_id');
        $ex= Exam::with('subject','activities')->where('code_stud',$stud)->where('code_act',$id)->get();
        return view('aktivnosti-info.examinfo',compact('ex'));
    }

    public function showSubjectName(){

        $subject= new Subject;
        $subject=$subject::all();
        return view('admin.update_students_activities')->with('subject',$subject);
        
    }

    public function UpdateActivities(Request $request){

        $this->validate($request,[
            'stud'=>'required|numeric|digits:2',
            'pred'=>'required|numeric|digits:2',
            'kol1'=>'required|numeric|digits:2',
            'ispit'=>'required|numeric|min:0|max:50|digits:2'
        ]);

        $stud=request('stud');
        $pred=request('pred');

        $update=Exam::where('code_stud',$stud)->where('code_subject',$pred)->value('code_act');
        $store=Activities::find($update);
        $store->test_1=request('kol1');
        $store->test_2=request('kol2');
        $store->test_3=request('kol3');
        $store->term_paper_1=request('sem1');
        $store->term_paper_2=request('sem2');
        $store->exam=request('ispit');
        $store->save();

        $points=($store->test_1)+($store->test_2)+($store->test_3)
        +($store->term_paper_2)+($store->term_paper_1)+($store->exam);

        $grade=0;

        if($points<60)
            $grade=6;
        elseif($points<70)
            $grade=7;
        elseif($points<80)
            $grade=8;
        elseif($points<90)
            $grade=9;
        elseif($points<100)
            $grade=10;
        elseif($points<51)
            $grade=5;
        

        $exam=Exam::where('code_stud',$stud)->where('code_subject',$pred)->update(array('points' => $points,'grade'=>$grade));

        return redirect()->back()->with('success','Azurirane su aktivnosti studenta '.$stud);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $update=Activities::find($id);
        $update->test_1=request('kolokvijum1');
        $update->test_2=request('kolokvijum2');
        $update->test_3=request('kolokvijum3');
        $update->term_paper_1=request('seminarski1');
        $update->term_paper_2=request('seminarski2');
        $update->save();

        return redirect('/home/administracija');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
