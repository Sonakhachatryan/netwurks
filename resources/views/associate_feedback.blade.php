@extends('layouts.app')

@section('content')
    <div class="associates-page">
        <div class="container-fluid padding131 padding0">
            <div class="associates-page-inner">
                <div class="associates-page-inner-bg">
                    <div class="associates-inner">
                        <h2>ASSOCIATE FEEDBACK</h2>
                        <form name="">
                            <div class="feedback-input-top">
                                <input type="text" placeholder="Enter name">
                            </div>
                            <div class="feedback-input-bottom">
                                <textarea name="" placeholder="This is a required field"></textarea>
                            </div>
                            <p>Submit your answer for review:</p>
                            <div class="radio-button-block">
                                <div class="radio-button-left pull-left">
                                    <div class="radio-button-list pull-left" style="margin-right: 100px;">
                                        <input type="radio" id="yes" name="area" checked>
                                        <label for="yes">Yes</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="radio-button-list pull-right">
                                        <input type="radio" id="no" name="area">
                                        <label for="no">No</label>
                                        <div class="clear-both"></div>
                                    </div>
                                    <div class="clear-both"></div>
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