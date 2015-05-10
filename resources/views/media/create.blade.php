<!-- /resources/views/media/create.blade.php -->
@extends('app')
 
@section('content')
    <h2>Create Medium</h2>
<div class="container">
{!! Form::open(array('method' => 'POST', 'route' => array('medium.create'))) !!}
        @include('media/fragments/_form', array('submit_text' => 'Create Medium', 'is_new'=>true))
{!! Form::close() !!}

</div>
@endsection
 