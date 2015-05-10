<!-- /resources/views/media/fragments/_form.blade.php -->
<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Edit Medium Details</h3>
      </div>
      <div class="panel-body">
        <!-- text input field -->
        <div class="row">
            <div class="form-group">
                <div class="col-xs-2">
                    {!! Form::label('medium_name', 'Medium Name:', array('class'=>'control-label')) !!}
                </div>
                <div class="col-xs-4">
                  @if ($is_new)
                    {!! Form::text('medium_name','',array('class'=>'form-control input-sm')) !!}
                  @else
                    {!! Form::text('medium_name',$medium->medium,array('class'=>'form-control input-sm')) !!}
                  @endif
                </div>
                <span class="col-xs-6">{{ $errors->first('medium_name') }}</span>
            </div>
        </div>


  @if($errors->any())
    <h4>There are errors in this form</h4>
  @endif
  
    <!-- submit buttons -->
        <div class="row">  
            <div class="form-group">
                <div class="col-xs-6">
                    {!! Form::submit($submit_text,['class'=>'btn btn-default']) !!}
                </div>
                <div class="col-xs-6">
                    {!! Form::button('Cancel') !!}
                </div>
            </div>
        </div>
  
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  
    </div> <!-- panel panel-default -->
  </div> <!-- col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 -->
</div> <!-- row centred-form -->
