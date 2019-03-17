@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Kreiraj nov predmet</div>

                <div class="panel-body">
                    <form method="post" action="#">
                        <fieldset>
                             <legend>Novi Predmet</legend>
                        <label>Sifra</label>
                        <input type="text" name="sifra" value="{{old('sifra')}}" /><br><br>
                        <label>Naziv</label>
                        <input type="text" name="naziv" value="{{old('naziv')}}"/><br><br>
                        <label> Tip nastave</label>
                        <select name="tip_nastave">
                            <option value="predavanje">Predavanje</option>
                            <option value="vezbe">Vezba</option>
                        </select><br><br>
                        <label> Tip prijave</label>
                        <select name="tip_prijave">
                            <option value="izborni">Izborni</option>
                            <option value="obavezni">Obavezni</option>
                        </select><br><br>
                        <label>Skolska godina</label>
                        <input type="text" name="skolska_godina" value="{{old('skolska_godina')}}"/><br><br>
                        <label>Semestar</label>
                        <select name="semestar">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select><br><br><hr>
                        <input type="Submit" class="btn" value="Sacuvaj"/>
                        <input type="Reset" class="btn" value="Ponisti"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
@endsection