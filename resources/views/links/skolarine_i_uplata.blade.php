@extends('home')

@section('info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Skolarine i uplate</div>

                <div class="panel-bodys">
                    <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Skolska godina</th>
                                    <th>Godina studija</th>
                                    <th>Status upisa</th>
                                    <th>Nacin upisa</th>
                                    <th>Tip uplate</th>
                                    <th>Rata</th>
                                    <th>Br.rata</th>
                                    <th>Iznos</th>
                                    <th>Rok uplate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($fee) > 0)
                                <tr>
                                    @foreach($fee as $ind)
                                        
                                            
                                            <td>{{$ind->school_year}}</td>
                                            <td>{{$ind->study_year}}</td>
                                            <td>{{$ind->status_of_registration}}</td>
                                            <td>{{$ind->method_of_registration}}</td>
                                            <td>{{$ind->type_of_payment}}</td>
                                            <td>{{$ind->rate}}</td>
                                            <td>{{$ind->rate_number}}</td>
                                            <td>{{$ind->amount}}</td>
                                            <td>{{$ind->payment_deadline}}</td>
                                        
                                    @endforeach
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        <br><br><br>
                        <div class="well">
                            <p>
                                Nacin popunjavanja uplatnica:
                            </p>
                                <ul>
                                    <li>Uplatilac: Ime i prezime studenta</li>
                                    <li>Svrha uplate: Prijava godine/Ispita za _(Tekuca godina)_</li>
                                    <li>Primalac: Visoka Tehnicka Skola "5 Maj" - Zrenjanin</li>
                                    <li>Iznos: Ukupan iznos</li>
                                    <li>Ziro racun:840-4323451-78</li>
                                    <li>Poziv na broj: Broj Studenta/Godina Studija</li>
                                </ul>
                        </div>
                </div>
            </div>
        </div>
@endsection