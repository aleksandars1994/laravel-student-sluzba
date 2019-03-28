@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Ispiti</div>

                <div class="panel-body">
                   <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Red.Br</th>
                                    <th>Sifra</th>
                                    <th>Naziv</th>
                                    <th>N.GR</th>
                                    <th>Tip prijave</th>
                                    <th>Poeni</th>
                                    <th>Ocena</th>
                                    <th>ESPB</th>
                                    <th>Rok</th>
                                    <th>Datum polaganja</th>
                                    <th>Potpisao</th>
                                    <th>Aktivnosti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($search)>0)
                                    @foreach($search as $s)
                                        <tr>
                                            <td>{{$s->code}}</td>
                                            <td>{{$s->subject->id}}</td>
                                            <td>{{$s->subject->name}}</td>
                                            <td>{{$s->subject->n_gr}}</td>
                                            <td>{{$s->subject->type_of_application}}</td>
                                            <td>{{$s->points}}</td>
                                            <td>{{$s->grade}}</td>
                                            <td>{{$s->espb}}</td>
                                            <td>{{$s->deadline}}</td>
                                            <td>{{$s->date}}</td>
                                            <td>{{$s->signed_by}}</td>
                                            <td><a href="{{url('aktivnosti/'.$s->code_act)}}"><button type="submit" class="btn btn-default">
                                            <img src="/pics/search.png" style="width: 20px;height: 20px;"></span>
                                        </button></a></td> 
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
@endsection