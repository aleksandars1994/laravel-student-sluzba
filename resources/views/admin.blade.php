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
                    <div class="alert alert-success" role="alert">
                            <p>Admin mode:ON</p>
                        </div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="/admin/postavi_obavestenje/" class="stretched-link">Postavi obavestenje</a></li>
                        <li class="list-group-item"><a href="/admin/kreiraj_novog_studenta/" class="stretched-link">Kreiraj novog studenta</a></li>
                        <li class="list-group-item"><a href="/admin/pretrazi_bazu_s/" class="stretched-link">Pretrazi bazu studentata</a></li>
                        <li class="list-group-item"><a href="/admin/kreiraj_pr/" class="stretched-link">Kreiraj nov predmet</a></li>
                        <li class="list-group-item"><a href="/admin/pregledaj_predmete/" class="stretched-link">Pregledaj spisak predmeta</a></li>
                        <li class="list-group-item"><a href="/admin/azuriraj_aktivnosti_studenta/" class="stretched-link">Azuriraj aktivnosti studenta</a></li>
                        <li class="list-group-item"><a href="/admin/azuriraj_skolarine/" class="stretched-link">Azuriraj Skolarine i uplate</a></li>
                        <li class="list-group-item"><a href="/login" class="stretched-link">Kraj rada</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @yield('admin_info')
    </div>
</div>
@endsection