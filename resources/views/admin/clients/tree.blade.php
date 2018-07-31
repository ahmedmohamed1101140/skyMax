@extends('admin.layout')

@section('title', 'Clients')

{{-- start css --}}
@section('css')
    <style>
        table {
            border-spacing: 0;
            border-collapse: separate;
        }
    </style>
@endsection
{{-- end css --}}

{{-- Start Breadcums --}}

@section('home',"Home")
@section('page_title',"Clients")


{{-- End Breadcums--}}


@section('content')
    <script src="{{asset('admin-panel/assets/global/scripts/loader.js')}}" type="text/javascript"></script>

    <script type="text/javascript">
        {{--alert({!! json_encode($client->username) !!});--}}
        google.charts.load('current', {packages:["orgchart"]});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Node');
            data.addColumn('string', 'Parent');
            data.addColumn('string', 'ToolTip');

            // For each orgchart box, provide the name, manager, and tooltip to show.
            data.addRows([
                [{ v: '{!! json_encode($client->id) !!}', f: '<div style="color:red; font-style:italic">{!! json_encode($client->username) !!}</div>' }, '', 'The President'],
                    @foreach($children as $child)
                [{ v: '{!! json_encode($child->id) !!}', f: '<div style="color:red; font-style:italic">{!! json_encode($child->username) !!}</div>' }, '{!! json_encode($child->parent_id) !!}', 'VP'],
                @endforeach
            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {allowHtml:true});
        }
    </script>
    <div id="chart_div"></div>


@endsection


{{-- Start javascript --}}
@section('js')


@endsection

{{-- end javascript --}}