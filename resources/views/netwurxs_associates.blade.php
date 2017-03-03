@extends('layouts.app')

@section('content')
    <div class="associates-page">
        <div class="container-fluid padding131 padding0">
            <div class="associates-page-inner">
                <div class="associates-page-inner-bg">
                    <div class="associates-inner">
                        <h2>NETWURX ASSOCIATES</h2>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form name="" method="post" action="{{ url('associates/register') }}" enctype="multipart/form-data">
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
                                        <input type="radio" id="managment" name="expertise_area" value="Change Management" checked>
                                        <label for="managment">Change Management</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="planning" name="expertise_area" value="Strategic Planning">
                                        <label for="planning">Strategic Planning</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="resolution" name="expertise_area" value="Dispute Resolution">
                                        <label for="resolution">Dispute Resolution</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="other" name="expertise_area" value="other">
                                        <label for="other">Other</label>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="radio-button-right pull-right">
                                    <div class="radio-button-list">
                                        <input type="radio" id="development" name="expertise_area" value="Leadership Development">
                                        <label for="development">Leadership Development</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="theory" name="expertise_area" value="Organizational Theory">
                                        <label for="theory">Organizational Theory</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list">
                                        <input type="radio" id="business" name="expertise_area" value="Business Development">
                                        <label for="business">Business Development</label>
                                        <div class="clear-both"></div>
                                    </div>
                                </div>
                                <div class="clear-both"></div>
                            </div>
                            <div class="number-block hidden" id="area_input_div">
                                <input type="text" placeholder="Area of expertise" name="area_input" value="{{ old('phone') != NULL ? old('phone') : ''}}">
                            </div>
                            <textarea name="information" placeholder="What makes you knowledgable in these areas?">{{ old('information') != NULL ? old('textarea1') : ''}}</textarea>
                            <div class="select-upload-block">
                                <div class="pull-left">
                                    <input name="linked_in" placeholder="Linked In" value="{{ old('linked_in') != NULL ? old('linked_in') : ''}}">
                                </div>
                                <div class="upload-block pull-left">
                                    <div class="upload">Choose File</div>
                                    <input type="file" name="resume">
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

@section('script')
    <script src="{{ url('js/show-input.js') }}"></script>
@stop