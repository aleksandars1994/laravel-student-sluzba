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
            'sifra_kod'=>'required',
            'sifra_deo_1'=>'required|numeric',
            'sifra_deo_2'=>'required|numeric',
            'ime'=>'required|alpha|max:15',
            'prezime'=>'required|alpha|max:20',
            'ime_roditelja'=>'required|alpha|max:15',
            'pol'=>'required',
            'datum_rodjenja'=>'required|date',
            'mesto'=>'required|alpha',
            'jmbg'=>'required|size:11',
            'email'=>'required|email|unique:users',
            'sifra_email'=>'required|min:6',
            'phone_num'=>'required|min:9|max:10',
            'mobile_num'=>'required|min:9|max:10',
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
            $store->student_id=request('sifra_kod')."".request('sifra_deo_1')."/".request('sifra_deo_2');
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
            $fees->stud_id=request('sifra_kod')."".request('sifra_deo_1')."/".request('sifra_deo_2');
            $fees->save();
        
            //return redirect('/admin/kreiraj_novog_studenta/');

            return redirect()->back()->with('success', 'Kreiran je nov student!'); 
        
    }
    
    
    public function SearchStudent(){
        
        $student=request('student');
        $godina=request('prvi-deo')."/".request('drugi-deo');
        $ispis=$student."".$godina;
        //return dd($ispis);
        
        $user = Student::where('student_id','LIKE',$student.'%')->where('s_year',$godina)->get();
        //return dd($user);
       return view('admin.result',compact('user','ispis'));
    }
    
    public function ViewStudent()
    {
        $korisnik=new Student;
        $korisnik=$korisnik->paginate(20);;
        return view ('admin.search_students_database',compact('korisnik'));
    }


    public function update(Request $request,$id){
   
        
        $this->validate($request,[
            'n_skolska_godina'=>'required',
            'n_ime'=>'required|alpha',
            'n_prez'=>'required|alpha',
            'n_rod'=>'required|alpha',
            'n_pol'=>'required',
            'n_datum'=>'required|date',
            'n_mesto'=>'required|alpha',
            'n_jmbg'=>'required|size:11',
            'n_mob'=>'required|min:9|max:10',
            'n_tel'=>'required|min:9|max:10',
            'n_email'=>'required|email',
            'n_sif'=>'required|min:6'
        ]);

        $password=bcrypt(request('n_sif'));
        $usersID=Student::where('student_id',$id)->value('users_id');

        $User = User::with('student')->find($usersID);
        $User->name = $request->input('n_ime');
        $User->email = $request->input('n_email');
        $User->password=$password;
        $User->student->s_year = $request->input('n_skolska_godina');
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
