@extends('admin.layouts.index')

@section('content')
    <h1>
        @if($customer->deleted_at != NULL)
            <a href="{{ url('admin/customers/activate/' . $customer->id) }}" title="activate">
                <span class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></span>
            </a>
            <a href="{{ url('admin/customers/reject/' . $customer->id) }}" title="activate">
                <span class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </a>
        @endif
    </h1>
    <div class="table-responsive">
        @include('layouts.messages')
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th> Name</th>
                <td> {{ $customer->name }} </td>
            </tr>
            <tr>
                <th> Email</th>
                <td> {{ $customer->email }} </td>
            </tr>
            <tr>
                <th> Phone</th>
                <td> {{ $customer->phone }} </td>
            </tr>
            <tr>
                <th> Industry </th>
                <td> {{ $customer->industry->name }} </td>
            </tr>
            <tr>
                <th> Expertise area</th>
                <td> {{ $customer->expertise_area }} </td>
            </tr>
            <tr>
                <th> Status</th>
                <td>
                    @if($customer->deleted_at != NULL)
                        Not Active
                    @else
                        Active
                    @endif
                </td>
            </tr>
            <tr>
                <th> Description file</th>
                <td><a href="{{ url('/admin/customers/download/' . $customer->id) }}">{{ $customer->desc_file }}</a></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h1>Objective</h1>
    <p>{{ $customer->objective }}</p>

    <h1>Outline of topic</h1>
    <p>{{ $customer->outline_of_topic }}</p>

@stop

@section('script')
@endsection
