@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Azuriranje aktivnosti studenata</div>

                <div class="panel-body">
                   <form method="post" action="/admin/azuriranje" autocomplete="off">

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

                        {{csrf_field()}}
                        <label>Student</label>
                        <input type="text" name="stud" value="{{old('stud')}}"/>

                        <label>Predmet</label>
                       <label>Predmet</label>
                        <select name='pred'>
                        @if(count($subject)>0)
                        @foreach($subject as $name)
                            <option value="{{$name->id}}">{{$name->name}}</option>
                        @endforeach
                        </select>
                        @else

                        <option selected="select" disabled>Nema predmeta</option>
                        </select><br><br>

                        @endif
                        <br><br>
                        <label>Kolokvijum 1</label>
                        <input type="text" name="kol1" value=0><br><br>

                        <label>Kolokvijum 2</label>
                        <input type="text" name="kol2" value=0><br><br>

                        <label>Kolokvijum 3</label>
                        <input type="text" name="kol3" value=0><br><br>

                        <label>Seminarski 1</label>
                        <input type="text" name="sem1" value=0><br><br>

                        <label>Seminarski 2</label>
                        <input type="text" name="sem2" value=0><br><br>

                        <label>Ispit</label>
                        <input type="text" name="ispit" value=0><br><br>

                        <input type="submit" value="Sacuvaj"/>
                        <input type="reset" value="Ponisti"/>
                   </form>
                </div>
            </div>
        </div>
@endsection