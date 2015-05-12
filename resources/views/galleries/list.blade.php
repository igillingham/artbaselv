@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Galleries</div>

				<div class="panel-body">
					Galleries List:
                                        
                                    <table class="table  table-bordered">
                                        <thead>
                                        <tr>
                                          <th class="col-md-3">Gallery Name</th>
                                          <th class="col-md-1">Street</th>
                                          <th class="col-md-2">Town</th>
                                          <th class="col-md-3">Postcode</th>
                                          <th class="col-md-3">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                               @foreach ($gallerylist as $gal)
                                                  <tr>
                                                  <td>
                                                    <a href="{{action('GalleriesController@edit', $gal->id)}}">{{$gal->gallery_name}}</a>
                                                  </td>
                                                  <td>
                                                      {{$gal->street}}
                                                  </td>
                                                  <td>
                                                      {{$gal->town}}
                                                  </td>
                                                  <td>
                                                      {{$gal->postcode}}
                                                  </td>
                                                  <td>
                                                    <a href="{{ route('gallery.delete', $gal->id) }}" onclick="if(!confirm('Are you sure to delete this item?')){return false;};" title="Delete this Item"><i class="glyphicon glyphicon-trash"></i></a>
                                                  </td>
                                                  </tr>
                                                @endforeach
                                            
                                        </tbody>                    
                                    </table>
                                        
				</div>
                                
                    		<div class="panel">
                                    <div class="panel-body">
                                        <a href="{{action('GalleriesController@show_create')}}">Create new</a>
                                    </div>
                                </div>
                                
			</div>
		</div>
	</div>
</div>
@endsection
