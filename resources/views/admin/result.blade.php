@extends('admin.search_students_database')

@section('result')
<div class="panel">
                            @if(isset($details))
                                <p> Rezultat pretrage za vas pojam <b> {{ $query }} </b> je :</p>
                            <h2>Sample User details</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ime</th>
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
                            <a href="/admin/pretrazi_bazu_s/">Nazad na pretragu</a>
                        </div>

@endsection