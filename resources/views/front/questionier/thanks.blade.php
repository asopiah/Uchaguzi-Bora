@extends('layouts.front')
@section('content')
    <div class="col-sm-6" align="left">
        <h5><a href="{{route('report.create')}}" class="btn btn-success btn-xs" id="edit_goal"><i class="fas fa-arrow-circle-left"></i>&nbsp;&nbsp;Back</a>
            Thank You Note
        </h5>
    </div>
<div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
    <h3>Thank you for your response!</h3> {{--<span>Thanks for your valuable information. It helps us to improve our services!</span>--}}
</div>
@endsection
