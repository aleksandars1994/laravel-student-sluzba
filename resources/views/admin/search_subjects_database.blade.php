@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Pretraga predmeta</div>




                <div class="panel-body">
                  <form action="rezultat_predmeti" method="POST" role="search" required>
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                        placeholder="Pretrazi predmete"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <img src="/pics/search.png" style="width: 20px;height: 20px;"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        <br>
                        <br>
                                 @if (\Session::has('success'))
                            <div class="alert alert-success">
                                 <ul>
                             <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                                 @endif
                        <div class="panel">
                            @if(isset($details))
                                <p> Rezultat pretrage za vas pojam <b> {{ $query }} </b> je :</p>
                            <h2>Detalji</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Naziv</th>
                                        <th>Profesor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->signed_by}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                            <br>
                            
                        </div>
                </div>
            </div>
        </div>
@endsection