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
            @if(count($associates) > 0)
                <table class="table table-striped table-bordered table-hover " id="editable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Expertise</th>
                        <th>Linked IN</th>
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
                            <td>{{ $associate->expertise_area }}</td>
                            <td>{{ $associate->linked_in }}</td>
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
                                @if($associate->deleted_at != NULL)
                                    <a href="{{ url('admin/associates/activate/' . $associate->id) }}" title="activate">
                                        <span class="btn btn-primary"><i class="fa fa-check"
                                                                         aria-hidden="true"></i></span>
                                    </a>
                                    <a href="{{ url('admin/associates/reject/' . $associate->id) }}" title="activate">
                                        <span class="btn btn-danger"><i class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></span>
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
                {{ $associates->links() }}
            @else
                <span>Nothing to show</span>
            @endif
        </div>
    </div>
@stop