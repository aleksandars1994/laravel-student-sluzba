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

    public function CheckInfo($id=null){

        if($id) 
        {
             $stud=Student::where('student_id',$id)->get()->first();
            return view('admin.helper.studinfo')->with('stud',$stud);
        }

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

            $userid = User::insertGetId([
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
            $store->users_id=$userid;
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


    public function update(Request $request,$id){
   
        
        $this->validate($request,[
          
            'n_ime'=>'required',
            'n_prez'=>'required',
            'n_rod'=>'required',
            'n_pol'=>'required',
            'n_datum'=>'required',
            'n_mesto'=>'required',
            'n_jmbg'=>'required',
            'n_mob'=>'required',
            'n_tel'=>'required',
            'n_email'=>'required',
            'n_sif'=>'required'
        ]);

        $password=bcrypt(request('n_sif'));
        $usersID=Student::where('student_id',$id)->value('users_id');

        $User = User::with('student')->find($usersID);
        $User->name = $request->input('n_ime');
        $User->email = $request->input('n_email');
        $User->password=$password;
        $User->student->name = $request->input('n_ime');
        $User->student->last_name = $request->input('n_prez');
        $User->student->parent_name = $request->input('n_rod');
        $User->student->gender = $request->input('n_pol');
        $User->student->date_of_birth = $request->input('n_datum');
        $User->student->city = $request->input('n_mesto');
        $User->student->pin = $request->input('n_jmbg');
        $User->student->email = $request->input('n_email');
        $User->student->password=$password;
        $User->student->phone_num = $request->input('n_tel');
        $User->student->mobile_num = $request->input('n_mob');
        $User->push();

        return redirect('/admin/info/'.$id);//->with('user',$user);
    }

    public function remove($id=null){//prosledjuje id studenta

        if($id){

        	$stud=Student::where('student_id',$id)->value('email');
            $exam=Exam::where('code_stud',$id)->pluck('code_act');

            if(($exam != null)&&($stud != null)){

                $delete3=Exam::where('code_stud',$id)->delete();
                $delete1=Activities::whereIn('id',$exam)->delete();
                $delete4=TFee::where('stud_id',$id)->delete();
                $delete2=Student::where('student_id',$id)->delete();
                $delete5=User::where('email',$stud)->delete();
                   
            }
            
        	return redirect()->to('/admin/pretrazi_bazu_s')->send();
        }
    }
}
