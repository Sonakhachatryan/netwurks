@extends('layouts.app')

@section('content')
    {{ $associate }}
    <a href="{{ url('logout/associate') }}">Log Out</a>
@stop