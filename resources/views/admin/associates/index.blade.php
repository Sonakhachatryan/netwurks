@extends('admin.layouts.index')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Editable Table in- combination with jEditable</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="">
                <a onclick="fnClickAddRow();" href="javascript:void(0);" class="btn btn-primary ">Add a new row</a>
            </div>
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
                @foreach($associates as $associate)
                    <tr class="gradeX">
                        <td>{{ $associate->name }}</td>
                        <td>{{ $associate->email }}</td>
                        <td>{{ $associate->phone }}</td>
                        <td>{{ $associate->role->name }}</td>
                        <td>{{ $associate->branch->name }}</td>
                        <td>
                            @if($associate->deleted_at != NULL)
                                Not Active
                            @else
                                Active
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('admin/associates/' . $associate->id) }}" title="show">
                                <span class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></span>
                            </a>
                            @if($customer->deleted_at != NULL)
                                <a href="{{ url('admin/associates/activate/' . $associate->id) }}" title="activate">
                                    <span class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i></span>
                                </a>
                                <a href="{{ url('admin/associates/reject/' . $associate->id) }}" title="activate">
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

        </div>
    </div>
@stop