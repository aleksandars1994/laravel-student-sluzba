@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Kreiraj nov predmet</div>

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

                <div class="panel-body">
                    <form method="post" action="/admin/sacuvajpr/">
                        {{csrf_field()}}
                        <fieldset>
                             <legend>Novi Predmet</legend>
                        <label>Naziv</label>
                        <input type="text" name="naziv" value="{{old('naziv')}}"/><br><br>
                        <label>N.GR</label>
                        <select name="ngr">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select><br><br>
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
                        </select><br><br>
                         <label>Kolokvijum 1</label>
                        <input type="text" name="test1" value="{{old('test1')}}"/><br><br>
                        <label>Kolokvijum 2</label>
                        <input type="text" name="test2" value="{{old('test2')}}"/><br><br>
                        <label>Kolokvijum 3</label>
                        <input type="text" name="test3" value=0><br><br>
                        <label>Seminarski 1</label>
                        <input type="text" name="term_paper_1" value=0><br><br>
                        <label>Seminarski 2</label>
                        <input type="text" name="term_paper_2" value=0><br><br>
                        <label>Ispit</label>
                        <input type="text" name="exam" value=0><br><br>
                        <hr>
                        <input type="Submit" class="btn" value="Sacuvaj"/>
                        <input type="Reset" class="btn" value="Ponisti"/>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
@endsection