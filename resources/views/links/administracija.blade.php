@extends('home')

@section('info')
	<div class="col-md-8">
            <div class="well">
                <div class="well well-sm">Administracija</div>

                <div class="jumbotron">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Trenutno nema obavestenja
                </div>
            </div>
        </div>
@endsection