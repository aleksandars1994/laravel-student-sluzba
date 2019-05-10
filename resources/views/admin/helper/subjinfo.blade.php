@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">INFO: {{$subj->name}}</div>

                <div class="panel-body">
                   
                    <script type="text/javascript" src="/js/button_function.js"></script>

                            <button class="btn btn-warning pull-right" style="display: none;" onclick="Hide()" id="hide">Otkazi Azuriranje</button>
                            <button  type="button" class="btn btn-warning pull-right" style="display: block;" onclick="Show()" id="show">Azuriraj</button>

                            <form class="pull-right"action="{{url('/admin/delete/subject'.$subj->id)}}" method="post">
                                {{csrf_field()}}   
                                {{method_field('DELETE')}} 
                                <button type="submit" style="margin-right: 5px;" class="btn btn-danger">Izbrisi</button>
                            </form>
                            <br>
                            <br>
                        <div id="data1" style="display: block;">                       
                        <table class="table table-hover">
                                <br>
                                <tr>
                                    <th col-sm-3>ID</th>
                                    <td>{{$subj->id}}</td>
                                </tr>
                                
                                <tr>
                                    <th col-sm-3>Naziv</th>
                                    <td>{{$subj->name}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Tip nastave</th>
                                    <td>{{$subj->type_of_teaching}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Tip prijave</th>
                                    <td>{{$subj->type_of_application}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Skolska godina</th>
                                    <td>{{$subj->school_year}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Semestar</th>
                                    <td>{{$subj->term}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Max 1</th>
                                    <td>{{$subj->test_max_1}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Min 1</th>
                                    <td>{{$subj->test_min_1}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Max 2</th>
                                    <td>{{$subj->test_max_2}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Min 2</th>
                                    <td>{{$subj->test_min_2}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Max 3</th>
                                    <td>{{$subj->test_max_3}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Min 3</th>
                                    <td>{{$subj->test_min_3}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Seminarski 1</th>
                                    <td>{{$subj->term_paper_1}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Seminarski 2</th>
                                    <td>{{$subj->term_paper_2}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Ispit</th>
                                    <td>{{$subj->exam}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>ESPB</th>
                                    <td>{{$subj->espb}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Rok</th>
                                    <td>{{$subj->deadline}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Profesor</th>
                                    <td>{{$subj->signed_by}}</td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Datum ispita</th>
                                    <td>{{$subj->date}}</td>
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
                       
                        <form action="{{url('/admin/sacuvaj_i/'.$subj->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" id="num" value ='{{(count($errors))}}'/>
                                <table class="table table-hover">
                                <tr>
                                    <th col-sm-3>ID</th>
                                    <td>{{$subj->id}}</td>
                                </tr>
                                
                                <tr>
                                    <th col-sm-3>Naziv</th>
                                    <td><input type="text" name="n_naziv" value="{{$subj->name}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Tip nastave</th>
                                    <td><input type="text" name="n_tipn" value="{{$subj->type_of_teaching}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Tip prijave</th>
                                    <td><input type="text" name="n_tipp" value="{{$subj->type_of_application}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Skolska godina</th>
                                    <td><input type="text" name="n_sg" value="{{$subj->school_year}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Semestar</th>
                                    <td><input type="text" name="n_sem" value="{{$subj->term}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Max 1</th>
                                    <td><input type="text" name="n_max_t1" value="{{$subj->test_max_1}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Min 1</th>
                                    <td><input type="text" name="n_min_t1" value="{{$subj->test_min_1}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Max 2</th>
                                    <td><input type="text" name="n_max_t2" value="{{$subj->test_max_2}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Min 2</th>
                                    <td><input type="text" name="n_min_t2" value="{{$subj->test_min_2}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Max 3</th>
                                    <td><input type="text" name="n_max_t3" value="{{$subj->test_max_3}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum Min 3</th>
                                    <td><input type="text" name="n_min_t3" value="{{$subj->test_min_3}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Seminarski 1</th>
                                    <td><input type="text" name="n_s1" value="{{$subj->term_paper_1}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Seminarski 2</th>
                                    <td><input type="text" name="n_s2" value="{{$subj->term_paper_2}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Ispit</th>
                                    <td><input type="text" name="n_ispit" value="{{$subj->exam}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>ESPB</th>
                                    <td><input type="text" name="n_espb" value="{{$subj->espb}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Rok</th>
                                    <td><input type="text" name="n_rok" value="{{$subj->deadline}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Profesor</th>
                                    <td><input type="text" name="n_pro" value="{{$subj->signed_by}}"></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Datum ispita</th>
                                    <td><input type="date" name="n_date" value="{{$subj->date}}"></td>
                                </tr>
                                </table>
                            <button  type="submit" class="btn btn-info pull-right">Sacuvaj</button>
                        </form>
                        </div>

                        <a href="/admin/nazad/subject"><button type="button" class="btn btn-primary">Idi Nazad</button></a>
                        <br>
                        <br>
                </div>
            </div>
        </div>
@endsection