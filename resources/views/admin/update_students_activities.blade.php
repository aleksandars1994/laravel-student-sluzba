@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Azuriranje aktivnosti studenata</div>

                <div class="panel-body">
                    <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">   </th>
                                    <th scope="col">Sifra</th>
                                    <th scope="col">Naziv</th>
                                    <th scope="col">N.GR</th>
                                    <th scope="col">ESPB</th>
                                    <th scope="col">Br.prijava</th>
                                    <th scope="col">Nastavnik</th>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
@endsection