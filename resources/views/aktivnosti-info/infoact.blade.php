@extends('home')

@section('info')

	<div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">Aktivnosti</div>

                <div class="panel-body">
                   <div class="panel-body">
                   <table class="table table-hover">
                             <div class="panel-body">
                             	@if(count($ex)>0)

                             	@foreach($ex as $info)
                             <thead>
                             	<tr>
                             		<th>Tip</th>
                             		<th>Minimum</th>
                             		<th>Maksimum</th>
                             		<th>Osvojeno</th>
                             	</tr>
                             </thead>
                             <tbody>	
                                <tr>
                                    <th col-sm-3>Kolokvijum 1</th>
                                    <td><input type="text" value="{{$info->subject->test_min_1}}" readonly/></td>
                                    <td><input type="text" value="{{$info->subject->test_max_1}}" readonly/></td>
                                    <td><input type="text" value="{{$info->activities->test_1}}" readonly/></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum 2</th>
                                    <td><input type="text" value="{{$info->subject->test_min_2}}" readonly/></td>
                                    <td><input type="text" value="{{$info->subject->test_max_2}}" readonly/></td>
                                    <td><input type="text" value="{{$info->activities->test_2}}" readonly/></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Kolokvijum 3</th>
                                    <td><input type="text" value="{{$info->subject->test_min_3}}" readonly/></td>
                                    <td><input type="text" value="{{$info->subject->test_max_3}}" readonly/></td>
                                    <td><input type="text" value="{{$info->activities->test_3}}" readonly/></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Seminarski 1</th>
                                    <td><input type="text" value=0 readonly/></td>
                                    <td><input type="text" value="{{$info->subject->term_paper_1}}" readonly/></td>
                                    <td><input type="text" value="{{$info->activities->term_paper_1}}" readonly/></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Seminarski 2</th>
                                    <td><input type="text" value=0 readonly/></td>
                                    <td><input type="text" value="{{$info->subject->term_paper_2}}" readonly/></td>
                                    <td><input type="text" value="{{$info->activities->term_paper_2}}" readonly/></td>
                                </tr>
                                <tr>
                                    <th col-sm-3>Ispit</th>
                                    <td><input type="text" value=0 readonly/></td>
                                    <td><input type="text" value="{{$info->subject->exam}}" readonly/></td>
                                    <td><input type="text" value="{{$info->activities->exam}}" readonly/></td>
                                </tr>
                             </tbody>
                                @endforeach
                                @endif
                        </table>
                        <a href="/home/nazad"><button>Nazad</button></a>
                        <br>
                        <br>
                </div>
            </div>
        </div>

@endsection