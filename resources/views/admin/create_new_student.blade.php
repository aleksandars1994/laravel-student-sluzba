@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Kreiraj novog studenta</div>

                <div class="panel-body">


                    @if(count($errors)>0)
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    @endif

                    @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif

                   <form method="post" autocomplete="off" action="/admin/novstudent">
                        <fieldset>
                             <legend>Novi Student</legend>
                             {{ csrf_field() }}
                        <label>Sifra studenta</label>
                        <select name="sifra_kod">
                            <option value="IT">IT</option>
                            <option value="EP">EP</option>
                            <option value="MM">MM</option>
                            <option value="ZP">ZP</option>
                            <option value="CZ">CZ</option>
                            <option value="EE">EE</option>
                            <option value="VD">VD</option>
                            <option value="GI">GI</option>
                            <option value="BZ">BZ</option>
                        </select>
                        <input type="text" name="sifra_deo_1" maxlength="3" size="3" value="{{old('sifra2')}}" />/
                        <input type="text" name="sifra_deo_2" maxlength="2" size="2" value="{{old('sifra')}}" /><br><hr>
                        <label> Ime</label>
                        <input type="text" name="ime" value="{{old('ime')}}"/>
                        <label> Prezime</label>
                        <input type="text" name="prezime" value="{{old('prezime')}}"/>
                        <label> Ime jednog roditelja</label>
                        <input type="text" name="ime_roditelja" value="{{old('ime_roditelja')}}"/><br><hr>
                        <label> Pol</label>
                        <select name="pol">
                            <option value="M">Muski</option>
                            <option value="Z">Zenski</option>
                        </select>
                        <label> Datum rodjenja</label>
                        <input type="date" name="datum_rodjenja" value="{{old('datum_rodjenja')}}"/>
                        <label> Mesto</label>
                        <input type="text" name="mesto" value="{{old('mesto')}}"/><br><hr>
                        <label> JMBG</label>
                        <input type="text" name="jmbg" value="{{old('jmbg')}}"/>
                        <label> E-mail</label>
                        <input type="email" name="email" value="{{old('email')}}"/>
                        <label> Sifra za email</label>
                        <input type="text" name="sifra_email" value="{{old('sifra_email')}}"/><br><hr>
                        <label> Broj Telefona</label>
                        <input type="text" name="phone_num" value="{{old('phone_num')}}"/>
                        <label> Broj Mobilnog telefona</label>
                        <input type="text" name="mobile_num" value="{{old('mobile_num')}}"/><br><hr>
                        <input type="Submit" class="btn" value="Sacuvaj"/>
                        <input type="Reset" class="btn" value="Ponisti"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
@endsection