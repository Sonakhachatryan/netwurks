@extends('layouts.app')

@section('content')
    {{ $customer }}
    <div>
        <a href="{{ url('customers/logout') }}">Log Out</a>
    </div>
@stop