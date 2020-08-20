@extends('layouts.app')

@section('content')

    <div class="fixed-top">
        <h1> SharpNotes</h1>

    </div>

<div class="container">

    <div class="col-sm-offset-2 col-sm-8">


    <!-- Notes -->

        <div class="panel panel-default">
            <div class="panel-heading">
                Notes
            </div>

            @if(Auth::user())
                <li>{{Auth::user()->name}}</li>
            @endif

            <div class="panel-body">
                <table class="table table-striped task-table" id="notes-table">
                    <thead>
                    <tr>
                        <!-- New Note Button -->
                        <td>
                            <button type="button" id="new-note" class="btn btn-primary" data-toggle="modal" data-target="#note-modal">
                                <i class="fa fa-btn fa-trash"></i>New Note
                            </button>

                        </td>

                        <!-- Logout Button -->
                        <td>
                            <form action="{" method="POST">


                                <button type="submit" id="logout-" class="btn btn-primary">
                                    <i class="fa fa-btn fa-trash"></i>Logout
                                </button>
                            </form>
                        </td>

                    </tr>

                    <th>&nbsp;</th>
                    </thead>
                    @if (count($notes) > 0)
                    <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td class="table-text"><div>{{ $note->title }}</div></td>
                            <td class="table-text"><div>{{$note->content}}</div></td>

                            <!-- Note Edit Button -->
                            <td>
                                <button type="submit" id="edit-note-button" name="{{$note->id}}" class="btn btn-info" data-toggle="modal" data-target="#note-modal">
                                    <i class="fa fa-btn fa-trash"></i>Edit
                                </button>
                            </td>

                            <!-- Note Delete Button -->
                            <td>
                                <form action="{{url('notesdash/delete/' . $note->id)}}" method="POST">


                                    <button type="submit" id="delete-note-{{ $note->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>

    <div class="modal fade" id="note-modal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Note Editor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="note-modal-form">

                    <div class="modal-body">

                            <div class="form-group">
                                <label for="title" class="col-form-label">Note Title</label>
                                <input type="text" class="form-control" id="note-title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="note-content" class="col-form-label">Content:</label>
                                <textarea class="form-control" id="note-content" name="content"></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            $('#note-modal-form').on('submit', function(event){
                event.preventDefault();
                if ($('#note-title').val() == "") {
                    alert("A note title is required");
                } else {

                    $.ajax({
                        url:"/notesdash",
                        method:"POST",
                        data:$('#note-modal-form').serialize(),
                        success:function (data){
                            $('#note-modal-form')[0].reset();
                            $('#note-modal').modal('hide');

                        }
                    })

                }
            })
            $('#edit-note-button').click(function () {
                let id = $(this).attr('name');

                $.ajax({
                    url: '/notesdash/' + id,
                    type: 'GET',
                    data: {id: id},
                    success: function(response) {
                        console.log('note load successful');
                        console.log(response);
                        //$('.modal-body').html(response);
                        $('#note-modal-form').modal('show');
                    }
                })
            })

        })</script>

@stop




