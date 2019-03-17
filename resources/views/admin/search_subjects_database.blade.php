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
                                        placeholder="Search users"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <img src="/pics/search.png" style="width: 20px;height: 20px;"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        <br>
                        <br>
                        
                        <div class="panel">
                            @if(isset($details))
                                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                            <h2>Sample User details</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
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