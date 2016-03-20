@extends('layouts.app')

@section('content')

    <div class="content">

        <div class="filter">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title">Filter</h4>
                </div>
                <div class="panel-body">
                    <div class="btn-group" role="group">
                        <?php
                        $filter_options = ["Actions", "Tasks"];
                        ?>

                        @foreach($filter_options as $filter_option)
                            <?php $lower_option = strtolower(preg_replace('/[^a-z0-9]+/i', '', $filter_option)); ?>
                            <a type="button" class="btn btn-primary" href="/tasks/sort/{{ $lower_option }}" @if($lower_option == $option) disabled="disabled" @endif>{{ $filter_option }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">{{ strtoupper($option) }}</h4>
            </div>

            <!-- Action table -->
            <table class="table table-bordered table-striped table-hover filter-table tablesorter">
                <thead>
                <tr>
                    <th class="item">Item</th>
                    <th class="desc">Description</th>
                    <th class="due">Due</th>
                    <th class="dept">Department/Team</th>
                    <th class="action-lead">Lead</th>
                    <th class="suc">Success Measures</th>
                    <th class="stat">Status</th>
                </tr>
                </thead>

                <tbody>
                <?php
                    if ($option == 'actions') {
                        $results = DB::table('actions')->orderBy('item', 'asc')->get();
                    } else {
                        $results = DB::table('tasks')->orderBy('body', 'asc')->get();
                    }
                ?>

                @foreach($results as $data)

                    <tr>
                        @if($option == 'actions') <td class="item">{{ $data->item }}</td> @endif
                        <td class="desc">{{ $data->body }}</td>
                        <td class="due">{{ $data->date }}</td>
                        <td class="dept">{{ $data->owner }}</td>
                        <td class="action-lead">{{ $data->lead }}</td>
                        <td class="suc">{{ $data->success }}</td>
                        <td class="stat">{{ $data->status }}</td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script type="application/javascript" src="/js/jquery.tablesorter.min.js"></script>

    <script type="application/javascript">
        $(document).ready(function()
            {
                $(".filter-table").tablesorter();
            }
        );
    </script>


@stop
