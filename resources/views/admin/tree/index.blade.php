@extends('admin.layout')

@section('title', 'Tree')

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
@section('page_title',"Tree")


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
                @if($client !== null)
                    [{ v: '{!! json_encode($client->id) !!}',
                        f: '<div style="color:red; font-style:bold">{!! json_encode($client->username) !!}</div> <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $client->activation == 0 ? 'danger' : 'success'!!}"> {!! $client->activation == 0 ? 'inactive' : 'active'!!} </span> </div> ' },
                    '', 'The President'],
                @endif
                @if($children !== null)
                    @foreach($children as $child)
                [{ v: '{!! json_encode($child->id) !!}',
                    f: '<div style="color:red; font-style:italic">{!! json_encode($child->username) !!}</div>  <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $child->activation == 0 ? 'danger' : 'success'!!}"> {!! $child->activation == 0 ? 'inactive' : 'active'!!} </span> </div> ' },
                    '{!! json_encode($child->parent_id) !!}', 'VP'],
                @endforeach
                @endif
            ]);

            // Create the chart.
            var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
            // Draw the chart, setting the allowHtml option to true for the tooltips.
            chart.draw(data, {allowHtml:true});
        }
    </script>

    <div class="portlet-body">
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-9">
                {{Form::open(['route' => ['tree.store'] , 'method' => 'post','files'=>true]) }}


                <div class="form-group">
                    <label class="col-md-3 control-label">Find User Tree By His Code</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-icon">
                                <i class="fa fa-search fa-fw"></i>
                                <input id="newpassword" value="{{old('user_id')}}" class="form-control" type="text" name="user_id" placeholder="Client Code"> </div>
                            <span class="input-group-btn">
                                <button  id="genpassword" class="btn btn-success" type="submit">
                                    <i class="fa fa-arrow-left fa-fw"></i> Search</button>
                            </span>
                        </div>
                    </div>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <br><br><br>
    <div style="overflow: scroll;width: auto; height: auto; min-height: 500px; margin: auto;" id="chart_div"></div>


@endsection


{{-- Start javascript --}}
@section('js')


@endsection

{{-- end javascript --}}