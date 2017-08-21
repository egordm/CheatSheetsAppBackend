@extends('layouts.default')

@section('content')
    @include('crud.partials.browse', compact('parent', 'title', 'models', 'fields', 'route'))
@stop