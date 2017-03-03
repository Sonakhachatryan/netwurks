@extends('admin.layouts.index')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Editable Table in- combination with jEditable</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if(count($customers) > 0)
            <table class="table table-striped table-bordered table-hover " id="editable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr class="gradeX">
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->role->name }}</td>
                        <td>{{ $customer->branch->name }}</td>
                        <td>
                            @if($customer->deleted_at != NULL)
                                Not Active
                            @else
                                Active
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/customers/' . $customer->id) }}" title="show">
                                <span class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></span>
                            </a>
                            @if($customer->deleted_at != NULL)
                                <a href="{{ url('admin/customers/activate/' . $customer->id) }}" title="activate">
                                    <span class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></span>
                                </a>
                                <a href="{{ url('admin/customers/reject/' . $customer->id) }}" title="activate">
                                    <span class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
                {{ $customers->links() }}
            @else
                <span>Nothing to show</span>
            @endif
        </div>
    </div>
@stop