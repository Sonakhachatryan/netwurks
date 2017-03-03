@extends('admin.layouts.index')

@section('content')
    <h1>
        @if($associate->deleted_at != NULL)
            <a href="{{ url('admin/associates/activate/' . $associate->id) }}" title="activate">
                <span class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></span>
            </a>
            <a href="{{ url('admin/associates/reject/' . $associate->id) }}" title="activate">
                <span class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
            </a>
        @endif
    </h1>
    <img class="show-user-image" alt="user-image" src = "{{ url('images/associates/' . $associate->avatar) }}">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
            <tr>
                <th> Name</th>
                <td> {{ $associate->name }} </td>
            </tr>
            <tr>
                <th> Email</th>
                <td> {{ $associate->email }} </td>
            </tr>
            <tr>
                <th> Phone</th>
                <td> {{ $associate->phone }} </td>
            </tr>
            <tr>
                <th> Expertise </th>
                <td> {{ $associate->expertise_area }} </td>
            </tr>
            <tr>
                <th> Linked IN </th>
                <td> <a href ="{{  $associate->linked_in }}">{{  $associate->linked_in }}</a> </td>
            </tr>
            <tr>
                <th> Status</th>
                <td>
                    @if($associate->deleted_at != NULL)
                        Not Active
                    @else
                        Active
                    @endif
                </td>
            </tr>
            <tr>
                <th> Resume </th>
                <td><a href="{{ url('customers/download/' . $associate->id) }}">{{ $associate->resume }}</a></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h1>Information</h1>
    <p>{{ $associate->information }}</p>

@stop

@section('script')
@endsection
