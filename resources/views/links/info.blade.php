@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Obavestenja</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     @if(count($index)>0)
                    @foreach($index as $i)
                        <div class="alert alert-info" role="alert">
                            <small>Objavljeno: {{$i->created_at}}</small><br><br>
                            <p>{{$i->info}}</p>
                        </div>
                    @endforeach

                    @else
                        <div class="jubmotron">
                            <p>Nema obavestenja!</p>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
@endsection