@extends('admin')

@section('admin_info')

<div class="col-md-9">
    <div class="panel panel-info">
        <div class="panel-heading">Obavestenja</div>
		<div class="panel-body">
			@if(count($errors->info)>0)
				<ul>
		    @foreach ($errors->info->all() as $error)
		          <li  class="alert alert-warning" >{{ $error }}</li>
		      @endforeach
		    </ul>
		    @endif

		    
			<h3>Azuriraj obavestenje</h3>
		    <a href="{{url('/admin/postavi_obavestenje/')}}"><button class="pull-right"><img style="width: 25px;height: 20px;" src="/pics/back.png"></button></a>
		    <form class="pull-right"action="{{url('/admin/delete/info/'.$edit->id)}}" method="post">
		                                {{csrf_field()}}   
		                                {{method_field('DELETE')}} 
		                                <button type="submit" style="margin-right: 5px;"><img style="width: 25px;height: 20px;" src="/pics/delete.png"></button>
		                            </form>
		    <div class="form-group">
		        <form method="post" action="{{url('/admin/update/info/'.$edit->id)}}">
		            <br>
		            {{csrf_field()}}
		                <label>Poruka:</label><br>
		                
		                <textarea class="form-control" rows="3" id="comment" name="n_poruka">{{$edit->info}}</textarea>
		                  
		                
		                <br><br>
		                <input type="Submit" value="Sacuvaj"/>
		                <input type="Reset" value="Ponisti"/>
		            
		        </form>
      </div>
   </div>
  </div>
</div>

@endsection