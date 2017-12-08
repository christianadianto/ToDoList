@extends('layouts.header_ab')

@section('content')
    <div class="content">
        <div class="container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="35%">Task</th>
                    <th width="30%">PIC</th>
                    <th width="15%">Created At</th>
                    <th width="10">Status</th>
                    <th width="5%"></th>
                    <th width="5%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <input type="hidden" value="{{$task->id}}">
                        <td>{{$task->task_name}}</td>
                        <td>
                            @foreach($task->users as $user)
                                {{$user->initial}}
                            @endforeach
                        </td>
                        <td>{{$task->created_at->toDateString()}}</td>
                        <td>{{$task->task_status}}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-lg btn-edit" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
                            </button>
                        </td>

                        <td>
                            <button type="button" class="btn btn-info btn-lg btn-delete" data-token="{{ csrf_token() }}">
                                <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 id="task_name" class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <textarea id="detail" class="form-control" rows="5" name="task_detail"></textarea>
                            <p>pic</p>
                            <select class="selectpicker" multiple data-live-search="true"
                                    title="choose PIC" name="initials[]" data-size="3"
                                    data-actions-box="true">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->initial}}</option>
                                @endforeach
                            </select>
                            <p id="status">status</p>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p id="creator">creator</p>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default btn-update" data-dismiss="modal">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function () {

                var token = $(this).data('token');
                var id = $(this).parents('tr').find('input').val();
                $.ajax({
                    method:'post',
                    url:'/delete_task',
                    data:{'id' : id, _method: 'delete', _token :token},
                    success: function (response) {
                        if(response.status){
                            var a = $(this).parent().html();
                            console.log(a);
                            location.reload();
                        }
                    }
                });
            });

            $('.btn-edit').click(function(){
                var id = $(this).parents('tr').find('input').val();
                $.ajax({
                    method: 'get', // Type of response and matches what we said in the route
                    url: '/view_detail/'+id, // This is the url we gave in the route
                    success: function(response){ // What to do if we succeed
                        console.log(response);
                        $('#task_name').html(response.task.task_name);
                        $('#detail').html(response.task.task_detail);
                        $pic = new Array();
                        for($i=0;$i<response.pic.length;$i++){
                            $pic[$i] = " "+response.pic[$i].initial;
                        }
                        $('#pic').html("PIC: "+$pic);
                        $('#creator').html("Creator: "+response.creator.initial);
                        $('#status').html("Status: "+response.task.task_status);
                    }
                });
            });

            $('.btn-update').click(function () {

            });
        });
    </script>
@endsection