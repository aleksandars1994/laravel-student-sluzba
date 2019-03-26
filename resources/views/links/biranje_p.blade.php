@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Biranje predmeta</div>

                <div class="panel-body">
                    <table class="table table-hover">
                        @if(count($index)>0)
                            <thead>
                                <tr>
                                    <th>Prijava</th>
                                    <th>Sifra</th>
                                    <th>Naziv</th>
                                    <th>N.GR</th>
                                    <th>Tip Prijave</th>
                                    <th>Semestar</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach($index as $detail)
                                    <tr>
                                        <td><a href="{{ url('prijavi/'.$detail->id) }}"><button>Prijavi</button></a></td>
                                        <td>{{$detail->id}}</td>
                                        <td>{{$detail->name}}</td>
                                        <td>{{$detail->n_gr}}</td>
                                        <td>{{$detail->type_of_application}}</td>
                                        <td>{{$detail->term}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <h3>Nema predmeta za prijavu</h3>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
@endsection