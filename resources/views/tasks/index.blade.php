@extends('layouts.app')

@section('content')

    <div class="container">
        @include('common.errors')

        {!! Form::open(['route'=>'tasks.index', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('task-name', trans('messages.task'), ['class'=>'col-sm-3 control-label text-info']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', '', ['id'=>'task-name', 'class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    {!! Form::submit(trans('messages.addTask'), ['class'=>'btn btn-outline-success']) !!}
                </div>
            </div>
        {!! Form::close() !!}
        @if (count($displayTasks) > config('setting.number'))
            <div class="panel panel-default ">
                <div class="col-sm-3 text-info">
                    @lang('messages.currentTasks')
                </div>

                <div class="col-sm-6">
                    <table class="table table-striped task-table">
                        <tbody>
                            @foreach ($displayTasks as $task)
                                <tr>
                                    <td class="table-text col-sm-6">
                                        <div>{{ $task->name }}</div>
                                    </td>

                                    <td>
                                        {!! Form::open(['route'=>['tasks.destroy', $task->id], 'method'=>'DELETE']) !!}
                                            {!! Form::submit(trans('messages.btn_delete'), ['class'=>'btn btn-danger ', 'data-confirm' => trans('messages.confirmDelete')]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

@endsection
