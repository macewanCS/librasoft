@extends('layouts.app')


@section('content')

    <div class="accordion" id="accordion2">
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#category-1"><br /><br />
                    Camera Settings<br /><br />
                </a>
            </div>
            <div id="category-1" class="accordion-body collapse" style="height: 0px; ">
                <div class="accordion-inner">
                    <p>The camera settings</p>
                </div>
            </div>
        </div>
        <div class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#category-2"><br /><br />
                    Acquisition Settings<br /><br />
                </a>
            </div>
            <div id="category-2" class="accordion-body collapse">
                <div class="accordion-inner">
                    <p>The acquisition settings.</p>
                </div>
            </div>
        </div>
    </div>



 
    <script>
        $(document).ready(function() {
            $('#category-2').collapse('show');
        });
    </script>

@stop




