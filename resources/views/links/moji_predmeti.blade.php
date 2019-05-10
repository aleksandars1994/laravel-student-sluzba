@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Moji predmeti</div>

                <div class="panel-body">
                    <table class="table table-hover">
                         @if(count($index)>0)
                            <thead>
                                <tr>
                                    <th>Sifra</th>
                                    <th>Naziv</th>
                                    <th>N.GR</th>
                                    <th>Tip Prijave</th>
                                    <th>Skolska godina</th>
                                    <th>Semestar</th>
                                    <th>Aktivnosti</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    @foreach($index as $detail)
                                    <tr>
                                        <td>{{$detail->subject->id}}</td>
                                        <td>{{$detail->subject->name}}</td>
                                        <td>{{$detail->subject->n_gr}}</td>
                                        <td>{{$detail->subject->type_of_application}}</td>
                                        <td>{{$detail->subject->school_year}}</td>
                                        <td>{{$detail->subject->term}}</td>
                                        <td><a href="{{url('pogledaj2/'.$detail->activities->id)}}">
                                            <button type="submit" class="btn btn-default">
                                            <img src="/pics/search.png" style="width: 20px;height: 20px;">
                                            </button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <h3>Niste izabrali nijedan predmet</h3>
                                @endif
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
@endsection