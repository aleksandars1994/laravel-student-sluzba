@extends('admin.search_students_database')

@section('result')
<div class="panel">
                            @if(isset($details))
                                <p> Rezultat pretrage za vas pojam <b> {{ $query }} </b> je :</p>
                            <h2>Detalji</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{url('/admin/info/'.$user->student_id)}}"><button type="button" class="btn btn-info">Info</button></a></td>
                                        
                                        <td>
                                            <form action="{{url('/admin/delete/'.$user->student_id)}}" method="post">  
                                                {{csrf_field()}} 
                                                {{method_field('DELETE')}} 
                                                <button type="submit" class="btn btn-danger">Izbrisi</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                            <br>
                            <a href="/admin/pretrazi_bazu_s/">Nazad na pretragu</a>
                        </div>

@endsection