@extends('links.administracija')

@section('tool_create_student')
	
	<form method="post" action="#">
		<fieldset>
			 <legend>Novi Student</legend>
		<label>Sifra studenta</label>
		<input type="text" name="sifra" value="{{old('sifra')}}" />
		<label> Ime</label>
		<input type="text" name="ime" value="{{old('ime')}}"/>
		<label> Prezime</label>
		<input type="text" name="prezime" value="{{old('prezime')}}"/><br><br>
		<label> Ime jednog roditelja</label>
		<input type="text" name="ime_roditelja" value="{{old('ime_roditelja')}}"/>
		<label> Pol</label>
		<select name="pol">
			<option value="M">Muski</option>
			<option value="Z">Zenski</option>
		</select>
		<label> Datum rodjenja</label>
		<input type="text" name="datum_rodjenja" value="{{old('datum_rodjenja')}}"/><br><br>
		<label> Mesto</label>
		<input type="text" name="mesto" value="{{old('mesto')}}"/>
		<label> JMBG</label>
		<input type="text" name="jmbg" value="{{old('jmbg')}}"/>
		<label> E-mail</label>
		<input type="email" name="email" value="{{old('email')}}"/><br><br>
		<label> Broj Telefona</label>
		<input type="text" name="phone_num" value="{{old('phone_num')}}"/>
		<label> Broj Mobilnog telefona</label>
		<input type="text" name="mobile_num" value="{{old('mobile_num')}}"/><br><br>
		<input type="Submit" value="Sacuvaj"/>
		<input type="Reset" value="Ponisti"/>
		</fieldset>
	</form>
	

@endsection
