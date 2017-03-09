@extends('admin.layouts.index')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title pb">
            <h5>Contact Details</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            <div id="message"></div>
            <table class="table table-striped table-bordered table-hover " id="editable">
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                    <th class="w100">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="gradeX">
                    <td>Phone</td>
                    <td>{{ $details != NULL ? $details->phone : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/phone') }}" title="activate" class="hidden"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Address</td>
                    <td>{{ $details != NULL ? $details->address : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/address') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Hours</td>
                    <td>{{ $details != NULL ? $details->hours : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/hours') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>E-Mail</td>
                    <td>{{ $details != NULL ? $details->email : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/email') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                            </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Facebook</td>
                    <td>{{ $details != NULL ? $details->facebook : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/facebook') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Linked In</td>
                    <td>{{ $details != NULL ? $details->linkedin : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/linkedin') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Twitter</td>
                    <td>{{ $details != NULL ? $details->twitter : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/twitter') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Skype</td>
                    <td>{{ $details != NULL ? $details->skype : ''}}</td>
                    <td class="w100 actions">
                        <span>
                        <a class='hidden' href="{{ url('admin/contact-details/update/skype') }}" title="activate"></a>
                            <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                        </span>
                    </td>
                </tr>
                <tr class="gradeX">
                    <td>Google +</td>
                    <td>{{ $details != NULL ? $details->google : ''}}</td>
                    <td class="w100 actions">
                                <span>
                                    <a class='hidden' href="{{ url('admin/contact-details/update/google') }}" title="activate"></a>
                                    <span class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                </span>
                    </td>
                </tr>

                </tbody>
                <tfoot>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                    <th class="w100">Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@stop

@section('script')
    <script>
        $('span').on('click',function() {

            var tds = $(this).closest('tr').find('td');
            var val=$(tds[1]).text();
            var url=$(tds[2]).find('a').attr('href');
            swal({
                        title: "Update",
                        text: "Please fill the filed",
                        type: "input",
                        inputType :'text',
                        inputValue :val,
                        showCancelButton: true,
                        confirmButtonColor: "#1ab394",
                        confirmButtonText: "Update",
                        closeOnConfirm: true,
                        allowOutsideClick: true,
                        showLoaderOnConfirm: true
                    },
                    function(inputValue){
                        if(inputValue != false) {
                            $.ajax({
                                url: url,
                                method: 'post',
                                data: {value: inputValue},
                                success: function (result) {

                                    if(result.success) {
                                        $(tds[1]).text(inputValue);
                                        var message = '<div id="success" class="error_message alert alert-success alert-dismissible" role="alert">' +
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                '<p>Column updated.</p>' +
                                                '</div>'

                                        $('#message').append(message);
                                    }
                                }
                            });
                        }
                    });
        })
    </script>
@stop
