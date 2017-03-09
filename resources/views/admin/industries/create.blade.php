@extends('admin.layouts.index')

@section('content')
    @include('layouts.messages')
    <div class="ibox-content">
        <form method="post" action="{{ url('admin/industries/store') }}" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group"><label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10"><input type="text" class="form-control" name="name"></div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
@stop