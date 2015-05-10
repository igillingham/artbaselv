<!-- /resources/views/media/update.blade.php -->
@extends('app')

@section('content')

<div class="container">
{!! Form::model($medium, array('method' => 'PATCH', 'route' => array('medium.update', $medium->id))) !!}
        @include('media/fragments/_form', array('submit_text' => 'Update Medium', 'is_new'=>false))
{!! Form::close() !!}
</div>

@endsection
