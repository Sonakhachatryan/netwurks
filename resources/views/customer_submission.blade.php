@extends('layouts.app')

@section('content')
    <div class="submission-page">
        <div class="container-fluid padding131 padding0">
            <div class="associates-page-inner">
                <div class="associates-page-inner-bg">
                    <div class="associates-inner">
                        <h2>CUSTOMER SUBMISSION</h2>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form name="" method="post" action="{{ url('customer/register') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="name-email-block">
                                <input type="text" placeholder="Name" name="name" value="{{ old('name') != NULL ? old('name') : ''}}">
                                <input type="email" placeholder="E-mail address" name="email" value="{{ old('email') != NULL ? old('email') : ''}}">
                            </div>
                            <div class="number-block">
                                <input type="text" placeholder="Phone number" name="phone" value="{{ old('phone') != NULL ? old('phone') : ''}}">
                            </div>
                            <div class="radio-button-block">
                                <div class="radio-button-left pull-left">
                                    <div class="radio-button-list">
                                        <input type="radio" id="managment" name="role" value="1" checked>
                                        <label for="managment">Change Management</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="planning" name="role" value="2">
                                        <label for="planning">Strategic Planning</label>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="radio-button-right pull-right">
                                    <div class="radio-button-list">
                                        <input type="radio" id="development" name="role" value="3">
                                        <label for="development">Leadership Development</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="theory" name="role" value="4">
                                        <label for="theory">Organizational Theory</label>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="clear-both"></div>
                            </div>
                            <textarea name="textarea1" class="submission-textarea" placeholder="Objective:">{{ old('textarea1') != NULL ? old('textarea1') : ''}}</textarea>
                            <textarea name="textarea2" placeholder="Outline of topic:">{{ old('textarea2') != NULL ? old('textarea2') : ''}}</textarea>
                            <div class="select-upload-block">
                                <div class="select-block pull-left">
                                    <select name="branch" id="">
                                        <option value="1">Industry:</option>
                                        <option value="2">Industry:</option>
                                        <option value="3">Industry:</option>
                                    </select>
                                </div>
                                <div class="upload-block pull-left">
                                    <div class="upload">Choose File</div>
                                    <input type="file" name="desc_file">
                                </div>
                                <div class="clear-both"></div>
                            </div>
                            <button>Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="associates-page-right-bg"></div>
    </div>
@stop