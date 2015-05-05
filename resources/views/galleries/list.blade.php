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
                                          <th class="col-md-3">Posycode</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                foreach ($gallerylist as $gal)
                                                  {
                                                  echo '<tr>';
                                                  echo '<td>';
                                                  $url = action('GalleriesController@edit', $gal->id);
                                                  echo "<a href=\"".$url."\">Edit</a>";
                                                  echo $gal->gallery_name;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  echo $gal->street;
                                                  echo '</td>';
                                                  echo '<td>';
                                                  //echo $fe->fe_type;
                                                  //dd ($fe->beam_type->name);
                                                  //var_dump($fe->beam_type);
                                                  echo $gal->town;
                                                  echo '<td>';
                                                  echo $gal->postcode;
                                                  echo '</td>';
                                                  echo '</tr>';
                                                  }
                                            ?>
                                        </tbody>                    
                                    </table>
                                        
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
