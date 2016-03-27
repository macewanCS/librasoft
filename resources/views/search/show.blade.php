@extends('layouts.app')

@section('content')

    <div class="bs-example">
        <div class="panel panel-primary">
        <div class="panel-heading" style="background: #009FD7;"><h4 class="panel-title">Results for "{{ $term }}"</h4></div>
        <div class="panel-body small-panel-body">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                @foreach($results as $result)
                    <?php $result_class = str_replace("app\\", "", strtolower(get_class($result))); ?>
                    @if(in_array($result_class, ["goal", "objective"]))
                        <tr>
                            <td>
                                <a href="/{{ $result_class }}s/show/{{ $result->id }}">{{ ucwords($result_class) }}: {{ $result->body }}</a>
                            </td>
                        </tr>
                    @elseif($result_class == "action")
                        <tr>
                            <td>
                                <a href="/{{ $result_class }}s/show/{{ $result->id }}">Action: {{ $result->body }}</a>
                            </td>
                        </tr>
                    @elseif($result_class == "task")
                        <tr>
                            <td>
                                <a href="/{{ $result_class }}s/show/{{ $result->id }}">Task: {{ $result->body }}</a>
                            </td>
                        </tr>
                    @elseif(in_array($result_class, ["team", "department", "user"]))
                        <tr>
                            <td>
                                <a href="/{{ $result_class }}s/show/{{ $result->id }}">{{ ucfirst($result_class) }}: {{ $result->name }}</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>
                                <a href="/{{ $result_class }}s/show/{{ $result->id }}">{{ ucfirst($result_class) }}: "{{ $result->content }}" on task {{ $result->task->body }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
    </div>


@stop
