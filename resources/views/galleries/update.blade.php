@extends('app')

@section('content')

<div class="container">
<div class="row centered-form">
  <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Edit Gallery Details</h3>
      </div>
      <div class="panel-body">
        {!! Form::open(array('action' => array('GalleriesController@update', $gal), 'method' => 'post')) !!}

        <!-- text input field -->
        <div class="row">
            <div class="form-group">
                <div class="col-xs-2">
                    {!! Form::label('gallery_name', 'Gallery Name:', array('class'=>'control-label')) !!}
                </div>
                <div class="col-xs-4">
                    {!! Form::text('gallery_name',$gal->gallery_name,array('class'=>'form-control input-sm')) !!}
                </div>
                <span class="col-xs-6">{{ $errors->first('gallery_name') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group">  
                <div class="col-xs-2">
                    {!! Form::label('street','Street',array('class'=>'control-label')) !!}
                </div>
                <div class="col-xs-4">
                    {!! Form::text('street',$gal->street,array('class'=>'form-control input-sm')) !!}
                </div>
                <span class="col-xs-6">{{ $errors->first('street') }}</span>
            </div>
        </div>

        <div class="row">
            <div class="form-group">  
                <div class="col-xs-2">
                    {!! Form::label('town','Town',array('class'=>'control-label')) !!}
                </div>
                <div class="col-xs-4">
                    {!! Form::text('town',$gal->town,array('class'=>'form-control input-sm')) !!}
                </div>
                <span class="col-xs-6">{{ $errors->first('town') }}</span>
            </div>
        </div>
  
        <div class="row">
            <div class="form-group">  
                <div class="col-xs-2">
                    {!! Form::label('postcode','Postcode',array('class'=>'control-label')) !!}
                </div>
                <div class="col-xs-4">
                    {!! Form::text('postcode',$gal->postcode,array('class'=>'form-control input-sm')) !!}
                </div>
                <span class="col-xs-6">{{ $errors->first('postcode') }}</span>
            </div>
        </div>

  @if($errors->any())
    <h4>There are errors in this form</h4>
  @endif
  
    <!-- submit buttons -->
        <div class="row">  
            <div class="form-group">
                <div class="col-xs-6">
                    {!! Form::submit('Save',['class'=>'btn btn-default']) !!}
                </div>
                <div class="col-xs-6">
                    {!! Form::button('Cancel') !!}
                </div>
            </div>
        </div>
  
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  
    {!! Form::close() !!}
    </div> <!-- panel panel-default -->
  </div> <!-- col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4 -->
</div> <!-- row centred-form -->
</div>

@endsection
