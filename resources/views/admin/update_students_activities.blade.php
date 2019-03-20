@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Azuriranje aktivnosti studenata</div>

                <div class="panel-body">
                   <form method="post" action="#" autocomplete="off">

                        {{csrf_field()}}
                        <label>Student</label>
                        <input type="text" name="stud" value="{{old('stud')}}"/>

                        <label>Predmet</label>
                        <input type="text" name="pred" value="{{old('pred')}}"/><br><br>

                        <label>Kolokvijum 1</label>
                        <input type="text" name="kol1" value="{{old('kol1')}}"/><br><br>

                        <label>Kolokvijum 2</label>
                        <input type="text" name="kol2" value="{{old('kol2')}}"/><br><br>

                        <label>Kolokvijum 3</label>
                        <input type="text" name="kol3" value="{{old('kol3')}}"/><br><br>

                        <label>Seminarski 1</label>
                        <input type="text" name="sem1" value="{{old('sem1')}}"/><br><br>

                        <label>Seminarski 2</label>
                        <input type="text" name="kol1" value="{{old('sem2')}}"/><br><br>

                        <label>Ispit</label>
                        <input type="text" name="kol1" value="{{old('kol1')}}"/><br><br>

                        <input type="submit" value="Sacuvaj"/>
                        <input type="reset" value="Ponisti"/>
                   </form>
                </div>
            </div>
        </div>
@endsection