@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Azuriranje skolarina studenata</div>

                <div class="panel-body">


                      @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif

                    
                    <form method="post" autocomplete="off" action="/admin/update_tfees">

                        {{csrf_field()}}
                        <label>ID studenta</label>
                        <input type="text" name="student"><br><br>

                        <label>Skolska godina</label>
                        <input type="text" name="sk_god"><br><br>

                        <label>Godina upisa</label>
                        <input type="text" name="god"><br><br>
                        
                        <label>Status upisa</label>
                        <input type="text" name="st_up"><br><br>
                        
                        <label>Nacin upisa</label>
                        <input type="text" name="nup"><br><br>
                        
                        <label>Tip uplate</label>
                        <input type="text" name="tip"><br><br>
                        
                        <label>Rata</label>
                        <input type="text" name="rata"><br><br>
                        
                        <label>Br.rata</label>
                        <input type="text" name="brrata"><br><br>
                        
                        <label>Iznos</label>
                        <input type="text" name="iznos"><br><br>

                        <label>Rok uplate</label>
                        <input type="date" name="rok"><br><br>
                        
                        <input type="Submit" value="Sacuvaj">
                        <input type="Reset" value="Ponisti">
                    </form>
                </div>
            </div>
        </div>
@endsection