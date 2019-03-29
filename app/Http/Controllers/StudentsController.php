<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Activities;
use App\Subjects;
use App\TFee;
use App\User;
use App\Exam;

class StudentsController extends Controller
{use RegistersUsers;

   public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index(){

    	$em=Auth::user()->email;
        $stud =Student::where('email',$em)->get()->first();
       // $stud=dd($stud);
        
    	return view('links.administracija',compact('stud'));
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
            'email'=>'required|email|unique:users',
            'sifra_email'=>'required|min:6',
            'phone_num'=>'required',
            'mobile_num'=>'required',
    	]);

            $user = User::create([
            'name' => $request['ime'],
            'email' => $request['email'],
            'password' => bcrypt($request['sifra_email']),
            ]);
            /*
            $UserData = new User;
            $UserData->email=request('email');
            $UserData->name=request('ime');
            $UserData->password=bcrypt('sifra_email');
            $UserData->save();
            */
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
            $store->password=bcrypt('sifra_email');
            $store->phone_num=request('phone_num');
            $store->mobile_num=request('mobile_num');
            $store->save();

            $fees=new TFee;
            $fees->stud_id=request('sifra');
            $fees->save();
        
            //return redirect('/admin/kreiraj_novog_studenta/');

            return redirect()->back()->with('success', 'Kreiran je nov student!'); 
        
    }

    public function SearchStudent(){

        $q = Input::get ( 'q' );
            $user = Student::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('last_name','LIKE','%'.$q.'%')->get();
            
             if(count($user) > 0 && $q!="")
                return view('admin.result')->withDetails($user)->withQuery ( $q );
            else
             return view ('admin.result');
    }


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
