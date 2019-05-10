@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Pretraga predmeta</div>
                       <div class="panel">
                           <br>
                            @if(count($subject)>0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Naziv</th>
                                        <th>Profesor</th>
                                        <th>Skolska godina</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subject as $sub)
                                    <tr>
                                        <td class="col-md-3">{{$sub->name}}</td>
                                        <td class="col-md-3">{{$sub->signed_by}}</td>
                                        <td class="col-md-3">{{$sub->school_year}}</td>
                                        <td class="col-md-1">
                                           <a href="{{url('/admin/subj/info/'.$sub->id)}}"><button type="button" class="btn btn-info">Informacije</button></a>
                                        </td>
                                        
                                        <td class="col-md-1"><form action="{{url('/admin/delete/subject/'.$sub->id)}}" method="post">
                                            {{csrf_field()}}   
                                            {{method_field('DELETE')}} 
                                            <button type="submit" class="btn btn-danger">Izbrisi Predmet</button>
                                        </form></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p> {{$subject->links()}} </p>
                            @endif
                            <br>
                        </div>
                </div>
            </div>
@endsection