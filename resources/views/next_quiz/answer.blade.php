@extends('layouts.app')
@section('content')
        <form method="post" action="{{ route('submit-ans') }}">
            @csrf
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-5">
                    <h4>#{{ Session::get("nextq")}} {{ $q->question }}</h4>
                    <br>
                    <input value="a"  name="answer" type="checkbox">{{ $q->a }}
                    <br>
                    <input value="b"  name="answer" type="checkbox">{{ $q->b }}
                    <br>
                    <input value="c"  name="answer" type="checkbox">{{ $q->c }}
                    <br>
                    <input value="d" name="answer" type="checkbox">{{ $q->d }}
                    <br>
                    <input value="{{ $q->answer }}"style="visibility:hidden" name="dbans">
                </div>
                <div class="col-md-5"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <button type="submit" style="" class="btn btn-primary">Next</button>
                </div>
                <div class="col-md-7"></div>
            </div>
        </form>

@endsection
