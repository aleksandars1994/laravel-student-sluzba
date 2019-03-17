@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Obavestenja</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="form-group">
                        <form method="post" action="#">
                            <fieldset>
                                 <legend>Novo Obavestenje</legend>
                            <label>Poruka:</label><br>
                            <textarea class="form-control" rows="5" id="comment" name="Poruka"/>
                                
                            </textarea>
                            <br><br>
                            <input type="Submit" value="Sacuvaj"/>
                            <input type="Reset" value="Ponisti"/>
                            </fieldset>
                        </form>
                     </div>
                </div>
            </div>
        </div>
@endsection