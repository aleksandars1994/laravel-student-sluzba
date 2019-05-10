@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Pretraga studenata</div>
                    <div class="panel-body">
                        <p>Pretraga:</p>
                        <form method="post" action="/admin/pretrazi_bazu_s/rezultat" >
                            {{csrf_field()}}
                            <label>Smer: </label>
                            <select name="student">
                                <option value="IT">IT</option>
                                <option value="EP">EP</option>
                                <option value="MM">MM</option>
                                <option value="ZP">ZP</option>
                                <option value="CZ">CZ</option>
                                <option value="EE">EE</option>
                                <option value="MS">MS</option>
                                <option value="GI">GI</option>
                                <option value="VD">VD</option>
                            </select>
                            <label> Skolska godina: </label>
                            <input type="text" name="prvi-deo" size="4" maxlength="4">/
                            <input type="text" name="drugi-deo" size="4" maxlength="4">
                            <input type="Submit" value="Idi"><br>
                        </form>
                        
                        
                        <br>
                        <br>
                        
                            @if(count($korisnik)>0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sifra</th>
                                        <th>Skolska godina</th>
                                        <th>Ime</th>
                                        <th>Prezime</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($korisnik as $use)
                                    <tr>
                                        <td>{{$use->student_id}}</td>
                                        <td>{{$use->s_year}}</td>
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
                            <br>
                            <br>
                            <p>{{ $korisnik->links() }}</p>
                            @else
                            <p>Nema studenata</p>
                            @endif
                    </div>
                </div>
            </div>
@endsection