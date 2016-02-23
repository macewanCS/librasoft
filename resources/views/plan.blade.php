@extends('layouts.app')

@section('content')
        <!-- div for filter options-->
<div class="container">
    <div>
        <div>
            <div class="panel panel-default">
                <div class="panel-heading">Filter</div>

                <div class="panel-body">
                    stuff and more stuff
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Body for accordion-->
<body>
<div class="bs-example" style="padding-left: 40px; padding-right: 40px">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Goal 1. Transform Communities</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <!-- Body for accordion 2-->
                    <body>
                    <div class="bs-example2">
                        <div class="panel-group" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerOne">Objective 1</a>
                                    </h4>
                                </div>
                                <div id="collapseInnerOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>HTML stands for HyperText Markup Language. HTML is the main markup language.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerTwo">Objective 2</a>
                                    </h4>
                                </div>
                                <div id="collapseInnerTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>Bootstrap is a powerful front-end framework for faster and easier </p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseInnerThree">Objective 3</a>
                                    </h4>
                                </div>
                                <div id="collapseInnerThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>CSS stands for Cascading Style Sheet. CSS allows you to</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </body>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Goal II. Evolve our Digital Environment</a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>Bootstrap is a powerful front-end framework for faster and easier web development. It is a collection of CSS and HTML conventions. </p>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Goal III. Act as a catalyst for learning, discovery, and creating</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <p>CSS stands for Cascading Style Sheet. CSS allows you to specify various style properties for a given HTML element such as colors, backgrounds, fonts etc.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection