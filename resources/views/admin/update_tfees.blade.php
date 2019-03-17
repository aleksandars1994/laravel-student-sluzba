@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Azuriranje skolarina studenata</div>

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
                        </table>
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