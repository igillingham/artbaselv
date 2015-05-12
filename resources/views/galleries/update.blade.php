@extends('app')

@section('content')
<div class="container">
{!! Form::model($gal, array('method' => 'PATCH', 'route' => array('gallery.update', $gal->id))) !!}
        @include('galleries/fragments/_form', array('submit_text' => 'Update Galley', 'is_new'=>false))
{!! Form::close() !!}
</div>

@endsection
