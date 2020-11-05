@extends('admin.master')
@section('body')
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <label>Correct: <small>{{Session::get('correctans') }}</small> </label>
                <label>Incorrect: <small>{{Session::get('wrongans') }}</small> </label>
                <label>Result: <small>{{Session::get('correctans') }}/{{Session::get('correctans') + Session::get('wrongans') }}</small></label>
                <br>
                <a href="{{ route('quiz') }}"><button style="margin-left: 10%" class="btn btn-primary">Finish Quiz</button></a>
            </div>
            <div class="col-md-3">
            </div>
        </div>
@endsection
