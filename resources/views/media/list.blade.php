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
                                            <?php 
                                                foreach ($mediumlist as $medium)
                                                  {
                                                  echo '<tr>';
                                                  echo '<td>';
                                                  $url = action('MediaController@edit', $medium->id);
                                                  echo "<a href=\"".$url."\">".$medium->medium."</a>";
                                                  echo '</td>';
                                                  echo '</tr>';
                                                  }
                                            ?>
                                        </tbody>                    
                                    </table>
                                        
				</div>
                                
                    		<div class="panel">
                                    <div class="panel-body">
                                        <?php
                                        $url = action('MediaController@create');
                                        echo "<a href=\"".$url."\">Create new</a>";
                                        ?>
                                    </div>
                                </div>

			</div>
		</div>
	</div>
</div>
@endsection
