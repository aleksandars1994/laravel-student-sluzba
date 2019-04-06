@extends('admin')

@section('admin_info')
	<div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading">Obavestenja</div>

                <script type="text/javascript" src="/js/infos_buttons.js"></script>

                <div class="panel-body">

                 @if(count($info)>0)
                @foreach($info as $i)   
            
                        <div class="alert alert-info" role="alert">
                        
                            <a href="{{url('/admin/update/'.$i->id)}}"><button  type="button" class="pull-right"><img style="width: 25px;height: 20px;" src="/pics/update.png"></button></a>
                            <form class="pull-right"action="{{url('/admin/delete/info/'.$i->id)}}" method="post">
                                {{csrf_field()}}   
                                {{method_field('DELETE')}} 
                                <button type="submit" style="margin-right: 5px;"><img style="width: 25px;height: 20px;" src="/pics/delete.png"></button>
                            </form>
                            <small>Objavljeno: {{$i->created_at}}</small><br><br>
                            <h4>{{$i->info}}</h4>
                            <br><br>
                         </div>
                @endforeach

                @else
                    <div class="jubmotron">
                        <p>Nema obavestenja</p>
                    </div>
                @endif


                <div class="form-group">
                <form method="post" action="/admin/sacuvajinfo">
                    
                    
                        @if(count($errors)>0)
                        <ul>
                        @foreach ($errors->all() as $error)
                              <li  class="alert alert-warning" >{{ $error }}</li>
                          @endforeach
                        </ul>
                        @endif
                         <legend>Novo Obavestenje</legend>
                    {{csrf_field()}}
                    <label>Poruka:</label><br>
                    <textarea class="form-control" rows="5" id="comment" name="Poruka">
                        
                    </textarea>
                    <br><br>
                    <input type="Submit" value="Sacuvaj"/>
                    <input type="Reset" value="Ponisti"/>
                    
                </form>
            </div>         
        </div>
    </div>
@endsection