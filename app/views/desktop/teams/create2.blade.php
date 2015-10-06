@extends('Layouts.layout')
@section('content')

    <div class="container">
        {{ Form::open(['url'=>'teams', 'id'=>'teams', 'enctype'=>'multipart/form-data']) }}
        <div class="col-lg-4 text-center col-lg-offset-4">
            {{Form::label('team_name', 'Team Name')}}
            {{ Form::text('team_name', null, ['class'=>'form-control', 'required']) }}
        </div>
        <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
                </thead>
                <tbody>
                @for($i=1;$i<3;$i++)
                    <tr>
                        <td>
                            Player {{$i}}
                            @if($i==1){{'(C)'}}@endif
                        </td>
                        <td>
                            {{ Form::text('name[]', null, ['class'=>'form-control name', 'required']) }}
                        </td>
                        <td>
                            {{ Form::text('email[]', null, ['class' => 'form-control email', 'required']) }}
                        </td>
                        <td>
                            {{ Form::text('mobile[]', null, ['class' => 'form-control mobile', 'required']) }}
                        </td>
                    </tr>
                @endfor
                </tbody>
            </table>
            <div class="text-center">
                <div class="form-group">
                    {{Form::submit('Let\'s have fun !!!', ['class'=>'btn btn-lg btn-primary'])}}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@stop
{{--

@section('pagejavascript')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#teams').bootstrapValidator({
            message: 'This value is not valid',
            fields: {
                team_name: {
                    message: 'Name is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Name is required and cannot be empty'
                        },
                        stringLength: {
                            min: 2,
                            message: 'Name must be more than 2 characters long'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]+(?:(?:\\s+|-)[a-zA-Z ]+)*$/,
                            message: 'Name can only consist of alphabets'
                        }
                    }
                },
                email2: {
                    validators: {
                        notEmpty: {
                            message: 'Email is required and cannot be empty'
                        },
                        emailAddress: {
                            message: 'Input is not a valid email address'
                        }
                    }
                },
                mobile3: {
                    message: 'Mobile number is not valid',
                    validators: {
                        notEmpty: {
                            message: 'Mobile number is required and cannot be empty'
                        },

                        regexp: {
                            regexp: /^[0-9]{10}$/,
                            message: 'Mobile number consists of 10 digits. Skip adding +91 or 0'
                        }
                    }
                }
            }
        });
    });
</script>
@stop
--}}
