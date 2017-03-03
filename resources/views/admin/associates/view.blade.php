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
                <th> Role</th>
                <td> {{ $associate->role->name }} </td>
            </tr>
            <tr>
                <th> Branch</th>
                <td> {{ $customer->branch->name }} </td>
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
                <td><a href="{{ url('customers/download/' . $customer->id) }}">{{ $customer->desc_file }}</a></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h1>Textarea1</h1>
    <p>{{ $customer->textarea1 }}</p>

    <h1>Textarea2</h1>
    <p>{{ $customer->textarea2 }}</p>

@stop

@section('script')
@endsection
