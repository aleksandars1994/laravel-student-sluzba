@extends('admin')

@section('admin_info')
	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Pretraga studenata</div>
                    <div class="panel-body">
                       <form action="rezultat" method="POST" role="search" required>
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q"
                                        placeholder="Search users"> <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default">
                                            <img src="/pics/search.png" style="width: 20px;height: 20px;"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        <br>
                        <br>
                        
                        @yield('result')
                    </div>
                </div>
            </div>
@endsection