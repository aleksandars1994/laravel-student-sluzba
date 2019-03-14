@extends('home')

@section('info')
	<div class="col-md-8">
            <div class="well">
                <div class="well well-sm">Skolarine i uplate</div>

                <div class="jumbotron">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Skolarine i uplate i jos po nesto
                </div>
            </div>
        </div>
@endsection