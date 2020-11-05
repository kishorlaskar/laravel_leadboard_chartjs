@extends('admin.master')
@section('body')

    <form method="post" action="#">
        @csrf
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-5">
                <h4>#{{ Session::get("nextq")}} {{ $q->question }}</h4>
                <br>
                <input value="a"  name="answer" type="radio"> : (A)  {{ $q->a }}
                <br>
                <input value="b"  name="answer" type="radio"> : (B)  {{ $q->b }}
                <br>
                <input value="c"  name="answer" type="radio"> : (C)  {{ $q->c }}
                <br>
                <input value="d" name="answer" type="radio">  :  (D)  {{ $q->d }}
                <br>
                <input value="{{ $q->answer }}"style="visibility:hidden" name="dbans">
            </div>
            <div class="col-md-5">

            </div>
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
