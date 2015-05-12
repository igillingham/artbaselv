<!-- /resources/views/galleries/create.blade.php -->
@extends('app')
 
@section('content')
    <h2>Create Gallery</h2>
<div class="container">
{!! Form::open(array('method' => 'POST', 'route' => array('gallery.create'))) !!}
        @include('galleries/fragments/_form', array('submit_text' => 'Create Gallery', 'is_new'=>true))
{!! Form::close() !!}

</div>
@endsection
 