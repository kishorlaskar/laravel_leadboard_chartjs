<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Quiz App
                </div>

                <div class="content">

                        <div class="col-md-6 mt-4">
                            <h3 class="page-title">Topics</h3>
                            @foreach($topics as $topic)
                                <div class="row">
                                    <div class="card-body mb-2">
                                        <h5 class="card-title">{{$topic->title}}</h5>

                                        <br>
                                        <a href="{{route('topics.show', $topic->id)}}" class="inline_block btn btn-primary">Go
                                            To Quiz</a>
                                        <br>
                                        <br>
{{--                                        <a href="{{route('start-quiz')}}" class="inline_block btn btn-secondary">Next Option</a>--}}
{{--                                        @if(Auth::user())--}}
{{--                                            @if(Auth::user()->role == 'admin')--}}
{{--                                                <a href="{{route('topics.edit', $topic->id)}}"--}}
{{--                                                   class="inline_block btn btn-warning">Edit</a>--}}
{{--                                                <form class="inline_block" action="{{route('topics.destroy', $topic->id)}}"--}}
{{--                                                      method="post">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <button class="btn btn-xs btn-danger" type="submit">Delete</button>--}}
{{--                                                </form>--}}
{{--                                            @endif--}}
{{--                                        @endif--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>

                </div>
            </div>
        </div>
    </body>
</html>
