@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Aktivnosti</div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Detalji</th>
                                    <th>Predmet</th>
                                    <th>N.GR</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if(count($ex)>0)
                                @foreach($ex as $exam)
                                <tr>
                                        <td><a href="{{url('pogledaj/'.$exam->code_act)}}">
                                            <button type="submit" class="btn btn-default">
                                            <img src="/pics/search.png" style="width: 20px;height: 20px;"></span>
                                            </button>
                                        </td>
                                        <td>{{$exam->subject->name}}</td>
                                        <td>{{$exam->subject->n_gr}}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>        
                              
                          
                    </div>
                </div>
            </div>
@endsection