@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Prijava ispita</div>

                <div class="panel-body">
                    <table class="table">

                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                 <ul>
                             <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                                 @endif
                        
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">   </th>
                                    <th scope="col">Sifra</th>
                                    <th scope="col">Naziv</th>
                                    <th scope="col">N.GR</th>
                                    <th scope="col">ESPB</th>
                                    <th scope="col">Br.prijava</th>
                                    <th scope="col">Nastavnik</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($details)>0)
                                @foreach($details as $det)
                                    <tr>
                                        <td><a href="{{ url('prijavi_ispit/'.$det->id) }}"><button>Prijavi</button></a></td>
                                        <td>{{$det->id}}</td>
                                        <td>{{$det->name}}</td>
                                        <td>{{$det->n_gr}}</td>
                                        <td>{{$det->espb}}</td>
                                        <td>{{$det->n_gr}}</td>
                                        <td>{{$det->signed_by}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <h3>Nema predmeta za ispit</h3>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
@endsection