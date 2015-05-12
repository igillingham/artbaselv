@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Media</div>

				<div class="panel-body">
					Media List:
                                        
                                    <table class="table  table-bordered">
                                        <thead>
                                        <tr>
                                          <th class="col-md-3">Medium Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($mediumlist as $medium)
                                                  <tr>
                                                  <td>
                                                  <a href="{{action('MediaController@edit', $medium->id)}}">{{$medium->medium}}</a>
                                                  </td>
                                                  <td>
                                                  <a href="{{ route('medium.delete', $medium->id) }}" onclick="if(!confirm('Are you sure to delete this item?')){return false;};" title="Delete this Item"><i class="glyphicon glyphicon-trash"></i></a>
                                                  </td>
                                                  </tr>
                                                @endforeach
                                        </tbody>                    
                                    </table>
                                        
				</div>
                                
                    		<div class="panel">
                                    <div class="panel-body">
                                        <a href="{{action('MediaController@show_create')}}">Create new</a>
                                    </div>
                                </div>

			</div>
		</div>
	</div>
</div>
@endsection
