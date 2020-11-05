@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-12 text-right">
            <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-question" onclick="addQuestion()">Add Question</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table id="laravel_crud" class="table table-striped table-bordered" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($question as $q)
                    <tr id="row_{{$q->id}}">
                        <td>{{ $q->id  }}</td>
                        <td>{{ $q->question }}</td>
                        <td>
                            <a href="javascript:void(0)" data-id="{{ $q->id }}" onclick="editQuestion(event.target)" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" data-id="{{ $q->id }}" class="btn btn-danger" onclick="deleteQuestion(event.target)">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="question-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form name="questionForm" id="questionForm" class="form-horizontal" action="{{ route('next-question.store') }}">
                        @csrf
                        <input type="hidden" name="question_id" id="question_id">
                        <div class="row">
                            <h5>Questions</h5>
                            <input name="question" id="question" style="padding:20px" type="text" class="form-control">
                            <span class="text-danger" id="questionError"></span>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>A:</label></div>
                            <div class="col-md-6"><label>B:</label></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="a" name="a" class="form-control">
                                <span class="text-danger" id="aError"></span>
                            </div>
                            <div class="col-md-6">
                                <input id="b" name="b" class="form-control">
                                <span class="text-danger" id="bError"></span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6"><label>C:</label></div>
                            <div class="col-md-6"><label>D:</label></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input id="c" name="c" class="form-control">
                                <span class="text-danger" id="cError"></span>
                            </div>
                            <div class="col-md-6">
                                <input id="d" name="d" class="form-control">
                                <span class="text-danger" id="dError"></span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Select Answer</label>
                                <select name="answer" id="answer" class="form-control">
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="c">C</option>
                                    <option value="d">D</option>
                                </select>
                                <span class="text-danger" id="ansError"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="createQuestion()">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#laravel_crud').DataTable();
        function addQuestion() {
            $("#question_id").val('');
            $('#question-modal').modal('show');
        }

        function editQuestion(event) {
            var id  = $(event).data("id");
            let _url = `/question/${id}`;
            $('#questionError').text('');
            $('#aError').text('');
            $('#bError').text('');
            $('#cError').text('');
            $('#dError').text('');
            $('#ansError').text('');


            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    if(response)
                    {
                        $("#question_id").val(response.id);
                        $("#question").val(response.question);
                        $("#a").val(response.a);
                        $("#b").val(response.b);
                        $("#c").val(response.c);
                        $("#d").val(response.d);
                        $("#answer").val(response.answer)
                        $('#question-modal').modal('show');
                    }
                }
            });
        }

        function createQuestion ()
        {

            var question = $('#question').val();
            var a = $('#a').val();
            var b = $('#b').val();
            var c = $('#c').val();
            var d = $('#d').val();
            var answer = $('#answer').val();
            var id = $('#question_id').val();



            let _url     = `/question`;
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    question: question,
                    a: a,
                    b: b,
                    c: c,
                    d: d,
                    answer:answer,
                    _token: _token

                },
                success: function(response) {
                    if(response.code == 200) {
                        if(id != ""){
                            $("#row_"+id+" td:nth-child(2)").html(response.data.question);
                            // $("#row_"+id+" td:nth-child(3)").html(response.data.a);
                            // $("#row_"+id+" td:nth-child(4)").html(response.data.b);
                            // $("#row_"+id+" td:nth-child(5)").html(response.data.c);
                            // $("#row_"+id+" td:nth-child(6)").html(response.data.d);
                            $("#row_"+id+" td:nth-child(7)").html(response.data.answer);
                        } else {
                            $('table tbody').prepend('<tr id="row_'+response.data.id+'">' +
                                '<td>'+response.data.id+'</td>' +
                                '<td>'+response.data.question+'</td>' +
                                // '<td>'+response.data.a+'</td>' +
                                // '<td>'+response.data.b+'</td>' +
                                // '<td>'+response.data.c+'</td>' +
                                // '<td>'+response.data.d+'</td>' +
                                //  '<td>'+response.data.answer+'</td>' +
                                '<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editQuestion(event.target)" class="btn btn-info">Edit</a></td>' +
                                '<td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="deleteQuestion(event.target)" class="btn btn-danger">Delete</a></td>' +
                                '</tr>');
                        }
                        $('#question').val('');
                        $('#a').val('');
                        $('#b').val('');
                        $('#c').val('');
                        $('#d').val('');
                        $('#answer').val('');
                        $('#question-modal').modal('hide');
                    }
                },
                errors: function(data) {
                    $('#questionError').text(data.errors.question);
                    $('#aError').text(data.errors.a);
                    $('#bError').text(data.errors.b);
                    $('#cError').text(data.errors.c);
                    $('#dError').text(data.errors.d);
                    $('#ansError').text(data.errors.answer);
                }
            });
        }

        function deleteQuestion(event) {
            var id  = $(event).data("id");
            let _url = `/question/${id}`;
            let _token   = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: 'DELETE',
                data: {
                    _token: _token
                },
                success: function(response) {
                    $("#row_"+id).remove();
                },
                error:function (response) {


                }
            });
        }

    </script>
@endsection
