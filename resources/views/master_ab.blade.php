@extends('layouts.header_ab')

@section('content')
    <div class="content">
        <div class="container">
            <div class="col-md-offset-4 col-md-4">
                <div class="box">
                    <form class="form_task" method="post" action="/insert">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="form-text">
                                <span>Task Name</span>
                            </div>
                            <input type="text" class="form-control" name="task_name">
                        </div>
                        <div class="form-group">
                            <div class="form-text">
                                <span>Description</span>
                            </div>
                            <textarea class="form-control" rows="5" name="task_detail"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-text">
                                <span>PIC</span>
                            </div>
                            <select class="selectpicker" multiple data-live-search="true"
                                    title="choose PIC" name="initials[]" data-size="3"
                                    data-actions-box="true">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->initial}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center form-group btn-form-group">
                            <button id="btn_submit" class="btn btn-default btn-submit">Insert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
