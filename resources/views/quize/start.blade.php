@extends('admin.master')
@section('body')

        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <h3>Are You Ready?</h3>
                <br>
                <a href="{{ route('start-quiz') }}"><button style="margin-left: 10%" class="btn btn-primary">Start Quiz</button></a>
            </div>
            <div class="col-md-3">
            </div>
        </div>
@endsection
