@extends('layouts.app')

@section('content')
<div class="container">
     <div class="row justify-content-start">
        <div class="col-md-3">
            <div class="panel panel-primary">
                <div class="panel-heading"><img class="img-thumbnail" src="/pics/logo.png"></div>
                <br>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>!!Admin mode:ON!!</p><br>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/home/obavestenja" class="stretched-link">Obavestenja</a></li>
                        <li class="list-group-item"><a href="/home/prijava_ispita" class="stretched-link">Prijava ispita</a></li>
                        <li class="list-group-item"><a href="/home/ispiti" class="stretched-link">Ispiti</a></li>
                        <li class="list-group-item"><a href="/home/aktivnosti" class="stretched-link">Aktivnosti</a></li>
                        <li class="list-group-item"><a href="/home/moji_predmeti" class="stretched-link">Moji predmeti</a></li>
                        <li class="list-group-item"><a href="/home/biranje_predmeta" class="stretched-link">Biranje predmeta</a></li>
                        <li class="list-group-item"><a href="/home/skolarine_i_uplata" class="stretched-link">Skolarine i uplate</a></li>
                        <li class="list-group-item"><a href="/home/administracija" class="stretched-link">Administracija</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('info')
    </div>
</div>
@endsection