<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Activities;
use App\User;
use App\Student;
use App\Exam;


class ActivitiesController extends Controller
{
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
            'kolokvijum1'=>'required',
            'kolokvijum2'=>'required',
            'seminarski1'=>'required',
            'ispit'=>'required'
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
