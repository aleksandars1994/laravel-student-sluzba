@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Pretraga studenata</div>
                    <div class="panel-body">
                            @if(isset($user))
                                <p> Rezultat pretrage za vas pojam <b> {{ $ispis }} </b> je :</p>
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
                                    @foreach($user as $use)
                                    <tr>
                                        <td>{{$use->name}}</td>
                                        <td>{{$use->last_name}}</td>
                                        <td>{{$use->email}}</td>
                                        <td><a href="{{url('/admin/info/'.$use->student_id)}}"><button type="button" class="btn btn-info">Info</button></a></td>
                                        
                                        <td>
                                            <form action="{{url('/admin/delete/'.$use->student_id)}}" method="post">  
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
                </div>
        </div>
</div>
@endsection