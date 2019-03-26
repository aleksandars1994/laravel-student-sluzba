@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Administracija</div>

                <div class="panel-body">
                   <table class="table table-hover">
                                <tr>
                                    <th col-sm-3>Broj</th>
                                    <td>{{$stud->student_id}}</td>
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
                        <br>
                        <br>
                        @yield('tool_create_student')
                </div>
            </div>
        </div>
@endsection