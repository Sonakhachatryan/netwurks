@extends('layouts.app')

@section('content')
    {{ $customer }}
    <div>
        <a href="{{ url('logout/customer') }}">Log Out</a>
    </div>
@stop