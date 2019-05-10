@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">INFO: {{$stud->name}} {{$stud->last_name}} {{$stud->student_id}}</div>

                <div class="panel-body">
                   
                    <div class="box">

                        <script type="text/javascript" src="/js/button_function.js"></script>
                        
                            <button class="btn btn-warning pull-right" style="display: none;" onclick="Hide()" id="hide">Otkazi Azuriranje</button>
                            <button  type="button" class="btn btn-warning pull-right" style="display: block;" onclick="Show()" id="show">Azuriraj</button>

                            <form class="pull-right"action="{{url('/admin/delete/'.$stud->student_id)}}" method="post">
                                {{csrf_field()}}   
                                {{method_field('DELETE')}} 
                                <button type="submit" style="margin-right: 5px;" class="btn btn-danger">Izbrisi</button>
                            </form>

                            <br><br>
                               <div id="data1" style="display: block;"> 
                                
                                    <div style="display: none;">
                                    
                                    </div>     
                                    <table class="table table-hover">    
                                    <br>
                                    <tr>
                                        <th col-sm-3>Broj</th>
                                        <td>{{$stud->student_id}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Skolska godina</th>
                                        <td>{{$stud->s_year}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Ime</th>
                                        <td>{{$stud->name}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Prezime</th>
                                        <td>{{$stud->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Ime jednog roditelja</th>
                                        <td>{{$stud->parent_name}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Pol</th>
                                        <td>{{$stud->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Datum rodjenja</th>
                                        <td>{{$stud->date_of_birth}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Mesto</th>
                                        <td>{{$stud->city}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>JMBG</th>
                                        <td>{{$stud->pin}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>E-mail</th>
                                        <td>{{$stud->email}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Mobilni</th>
                                        <td>{{$stud->mobile_num}}</td>
                                    </tr>
                                    <tr>
                                        <th col-sm-3>Telefon</th>
                                        <td>{{$stud->phone_num}}</td>
                                    </tr>
                                    </table>
                                </div>
                                <div id="data2" style="display: none;">
                                    @if(count($errors)>0)
                                    <ul>
                                       @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                    </ul>
                                    @endif
                                    
                                    <form action="{{url('/admin/sacuvaj/studenta/'.$stud->student_id)}}" method="post">   
                                    {{csrf_field()}}
                                     
                                    
                                        <table class="table table-hover">
                                        <input type="hidden" id="num" value ='{{(count($errors))}}'/>    
                                        <br>
                                        <tr>
                                            <th col-sm-3>Broj</th>
                                            <td>{{$stud->student_id}}</td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Skolska godina</th>
                                            <td><input type="text" name="n_skolska_godina" value="{{$stud->s_year}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Ime</th>
                                            <td><input type="text" name="n_ime" value="{{$stud->name}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Prezime</th>
                                            <td><input type="text" name="n_prez" value="{{$stud->last_name}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Ime jednog roditelja</th>
                                            <td><input type="text" name="n_rod" value="{{$stud->parent_name}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Pol</th>
                                            <td>
                                                <select name="n_pol" value="{{$stud->gender}}">
                                                    <option value="M">M</option>
                                                    <option value="Z">Z</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Datum rodjenja</th>
                                            <td><input type="date" name="n_datum" value="{{$stud->date_of_birth}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Mesto</th>
                                            <td><input type="text" name="n_mesto" value="{{$stud->city}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>JMBG</th>
                                            <td><input type="text" name="n_jmbg" value="{{$stud->pin}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>E-mail</th>
                                            <td><input type="email" name="n_email" value="{{$stud->email}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Sifra</th>
                                            <td><input type="text" name="n_sif"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Mobilni</th>
                                            <td><input type="text" name="n_mob" value="{{$stud->mobile_num}}"></td>
                                        </tr>
                                        <tr>
                                            <th col-sm-3>Telefon</th>
                                            <td><input type="text" name="n_tel" value="{{$stud->phone_num}}"></td>
                                        </tr>
                                        </table>
                                        <button  type="submit" class="btn btn-info pull-right" >Sacuvaj</button>
                                    </form>
                                </div>
                        <a href="/admin/nazad/"><button type="button" class="btn btn-primary">Idi Nazad</button></a>
                        <br>
                        <br>
                </div>
            </div>
        </div>
@endsection