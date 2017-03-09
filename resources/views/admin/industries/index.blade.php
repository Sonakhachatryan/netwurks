@extends('admin.layouts.index')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title pb">
            <h5>Industries <a href="{{ url('admin/industries/create') }}"><span class="btn btn-success"><i
                                class="fa fa-plus" aria-hidden="true"></i></span></a></h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            @if(count($industries) > 0)
                <table class="table table-striped table-bordered table-hover " id="editable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="w100">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($industries as $industry)
                        <tr class="gradeX">
                            <td>{{ $industry->name }}</td>
                            <td class="w100 actions">
                                <a href="{{ url('admin/industries/update/' . $industry->id) }}" title="activate">
                                    <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                </a>
                                    <span id="{{ $industry->id }}" title="activate">
                                        <a href="{{ url('admin/industries/delete/' . $industry->id . '/' . $industries->currentPage()) }}"></a>
                                        <span class="btn btn-danger"><i class="fa fa-trash-o"
                                                                        aria-hidden="true"></i></span>
                                    </span>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th class="w100">Actions</th>
                    </tr>
                    </tfoot>
                </table>
                {{ $industries->links() }}
            @else
                <span>Nothing to show</span>
            @endif
        </div>
    </div>
@stop

@section('script')
    <script src="{{ url('js/confirmDelete.js') }}"></script>
@stop