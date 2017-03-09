@extends('layouts.app')

@section('content')
    {{ $associate }}
    <div><a href="{{ url('associates/logout') }}">Log Out</a></div>
@stop