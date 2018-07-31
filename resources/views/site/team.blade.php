@extends('layouts.container')
@section('title')SkyMax @endsection
@section('css')
    <link rel="stylesheet" href="{{asset("assets/")}}/css/tree.css">
    <link rel="stylesheet" href="{{asset("assets/")}}/css/main.css">

    <style>
        table {
            border-spacing: 0;
            border-collapse: separate;
        }
    </style>


@endsection
@section('content')
    <div id="page-inside4" class="insd ">
        <div class="top-bg"></div>

        <div class="logo">
            <a href="{{url('/')}}" target="_self">
                <img src="{{asset("assets/")}}/img/logo.png" alt="SkyMax"></a>
        </div>

        <div class="team-bg"></div>


    </div>
    <div class="contents">
        <script src="{{asset('admin-panel/assets/global/scripts/loader.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
            google.charts.load('current', {packages:["orgchart"]});
            google.charts.setOnLoadCallback(drawChart);
            var data
            function drawChart() {
                data = new google.visualization.DataTable();
                data.addColumn('string', 'Node');
                data.addColumn('string', 'Parent');
                data.addColumn('string', 'ToolTip');

                @if($bool)
                // For each orgchart box, provide the name, manager, and tooltip to show.
                data.addRows([
                    [{ v: '{!! json_encode($client->id) !!}'
                        , f: '<div style="color:red; font-style:italic">{!! json_encode($client->username) !!}</div> <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $client->activation == 0 ? 'danger' : 'success'!!}"> {!! $client->activation == 0 ? 'Not Qualified' : 'Qualified'!!} </span> </div>' },
                        '', @if($client->pright == 0)'Right' @else 'Left'@endif],
                    @if($children !== null)
                        @foreach($children as $child)
                            [{ v: '{!! json_encode($child->id) !!}'
                            , f: '<div style="color:red; font-style:italic">{!! json_encode($child->username) !!}</div> <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $child->activation == 0 ? 'danger' : 'success'!!}"> {!! $child->activation == 0 ? 'Not Qualified' : 'Qualified'!!} </span> </div>' },
                            '{!! json_encode($child->parent_id) !!}', @if($child->pright == 1)'Right' @else 'Left'@endif],
                        @endforeach
                    @endif
                ]);
                @else
                // For each orgchart box, provide the name, manager, and tooltip to show.
                data.addRows([
                        @if($user !== null)
                    [{ v: '{!! json_encode($user->id) !!}'
                        , f: '<div style="color:red; font-style:italic">{!! json_encode($user->username) !!}</div> <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $user->activation == 0 ? 'danger' : 'success'!!}"> {!! $user->activation == 0 ? 'Not Qualified' : 'Qualified'!!} </span> </div>' },
                        '', @if($user->pright == 1)'Right' @else 'Left'@endif],
                        @endif
                        @if($children !== null)
                        @foreach($children as $child)
                    [{ v: '{!! json_encode($child->id) !!}'
                        , f: '<div style="color:red; font-style:italic">{!! json_encode($child->username) !!}</div> <div class="profile-usertitle-job"> <span class="label label-sm label-{!!   $child->activation == 0 ? 'danger' : 'success'!!}"> {!! $child->activation == 0 ? 'Not Qualified' : 'Qualified'!!} </span> </div>' },
                        '{!! json_encode($child->parent_id) !!}', @if($child->pright == 1)'Right' @else 'Left'@endif],
                    @endforeach
                    @endif

                ]);
                @endif


                // Create the chart.
                var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
                // Draw the chart, setting the allowHtml option to true for the tooltips.
                chart.draw(data, {allowHtml:true});


                // orgChart is my global orgchart chart variable.
                google.visualization.events.addListener(chart, 'select', selectHandler);

                // Notice that e is not used or needed.
                function selectHandler(e) {
                    var x = data.getValue(chart.getSelection()[0].row,0);
                    var array1 = {!! json_encode($children) !!}
                    var count = 0;
                    for(i=0 ; i<array1.length; i++){
                        if(array1[i].parent_id == x)
                        {
                            count++;
                        }
                    }
                    console.log(count);
                    if(count>=2){
                        console.log('cant add users');
                        $("#squarespaceModal-6789").modal();
                    }
                    else{
                        $(".modal-body #user_id").val(x);
                        $("#squarespaceModal-7595").modal();
                        console.log('add new user');
                    }
                }
            }
        </script>

        <div class="col-sm-12 col-md-12 no-pd ">

            <div class="col-md-6 col-sm-6 col-xs-12">
                <ul class="cl-map">
                    <li class="gry"><i class="fa fa-circle"></i> Not Qualified</li>
                    <li class="blck"><i class="fa fa-circle"></i> Qualified</li>
                    <li class="blu"><i class="fa fa-circle"></i> Active</li>

                </ul>
            </div>
            <div class="col-md-3 col-sm-5 col-xs-12 pull-right">
                <div id="srch">
                    <div class="search-bar">
                        {{Form::open(['route' => ['team.search'] , 'class' => 'icon','method' => 'post','files'=>true]) }}
                            <input type="text" name="user_id" placeholder="Search for user by ID">
                            <input type="submit" value="Search">
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>

        </div>
        <div style="overflow: scroll;width: 80%; height: auto; margin: 40px auto;" id="chart_div" ></div>



    </div>


<div class="modal fade" id="squarespaceModal-7595" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal mdl">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <div class="wrapper">

                    <ul class="tabs mytabs clearfix" data-tabgroup="first-tab-group">
                        <li><h4 class=" blue">Register By</h4></li>
                    </ul>
                    <section id="first-tab-group" class="tabgroup">
                        {{Form::open(['route' => ['teams.store'] , 'method' => 'post','files'=>true]) }}

                        <input type="hidden" name="user_id" id="user_id">


                            <div class="form-group col-md-4  lft">

                                <input required id="name" value="{{ old('name') }}" name="name"
                                       type="text"
                                       class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-4 rght1">
                                <input required id="middle_name" value="{{ old('mid_name') }}"
                                       name="middle_name"
                                       type="text"
                                       class="form-control" placeholder="Middle Name">
                            </div>
                            <div class="form-group col-md-4  rght">

                                <input required id="last_name" value="{{ old('last_name') }}"
                                       name="last_name"
                                       type="text"
                                       class="form-control" placeholder="Last Name">
                            </div>

                            <div class="form-group col-md-4  lft">

                                <select required id="country" class="form-control selecty"
                                        name="country">
                                    <option value="0" disabled selected>Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4 rght1">

                                <select required id="state" class="form-control selecty"
                                        name="state">
                                    <option value="0" disabled selected>State</option>
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}">{{$state->name_eng}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4  rght">
                                <input required id="city" name="city" type="text" class="form-control"
                                       placeholder="city" value="{{ old('city')}}">
                            </div>

                            <div class="form-group col-sm-6 lft">
                                <div class="form-control" style="height: 35px;">
                                    <label style="margin-right: 25px" class="radio-inline">
                                        <input style="margin-top:7px" checked type="radio" value="1" name="position">Left
                                    </label>
                                    <label class="radio-inline">
                                        <input style="margin-top:7px" type="radio" value="2" name="position">Right
                                    </label>
                                </div>
                            </div>

                            <div class="form-group nw-pd">

                                <input required id="address" name="address" type="text"
                                       class="form-control"
                                       value="{{ old('address')}}"
                                       placeholder="Address">
                            </div>

                            <div class="form-group col-md-6  lft">

                                <input required id="Nationaid" maxlength="10" name="Nationaid"
                                       type="number"
                                       value="{{ old('Nationaid')}}"
                                       class="form-control"
                                       placeholder="National ID">
                            </div>
                            <div class="form-group col-md-6 rght">

                                <input required style="line-height: 1" name="birth_date" type="date"
                                       class="form-control"
                                       id="datepicker"
                                       placeholder="Date of birth">
                            </div>

                            <div class="form-group col-md-6  lft">

                                <input required id="phone" maxlength="10" name="phone" type="text"
                                       class="form-control"
                                       value="{{ old('phone')}}"
                                       placeholder="Phone">
                            </div>
                            <div class="form-group col-md-6  lft">

                                <input required id="username" name="username" type="text"
                                       class="form-control"
                                       value="{{ old('username')}}"
                                       placeholder="Username">
                            </div>
                            <div class="form-group nw-pd">

                                <input required id="mail" name="mail" type="email"
                                       class="form-control"
                                       value="{{ old('mail')}}"
                                       placeholder="E-mail">
                            </div>


                            <div class="form-group col-md-6 rght">

                                <input required id="beneficiary" name="beneficiary" type="text"
                                       class="form-control"
                                       value="{{ old('beneficiary')}}"
                                       placeholder="Beneficiary">
                            </div>

                            <div class="form-group col-md-6 rght">

                                <input required id="relation" name="relation" type="text"
                                       class="form-control"
                                       value="{{ old('relation')}}"
                                       placeholder="Relation">
                            </div>

                            <div class="form-group col-md-6  lft">

                                <input required id="password" maxlength="20" name="password"
                                       type="password"
                                       class="form-control"
                                       placeholder="Password">
                            </div>
                            <div class="form-group col-md-6 rght">

                                <input required id="password_confirmation" maxlength="20"
                                       name="password_confirmation"
                                       type="password" class="form-control"
                                       placeholder="Re-Password">
                            </div>

                            <div class="form-group col-md-6  lft">

                                <input required id="inside_password" maxlength="20"
                                       name="inside_password"
                                       type="password" class="form-control"
                                       placeholder="Inside Password">
                            </div>
                            <div class="form-group col-md-6 rght">

                                <input required id="inside_password_confirmation"
                                       name="inside_password_confirmation" maxlength="20"
                                       type="password"
                                       class="form-control"
                                       placeholder="Re-Inside Password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="checkbox">
                                <label class="chk">
                                    <input id="terms" type="checkbox"> I accept the <a href="#"
                                                                                       target="_self">Terms
                                        of Use.</a>
                                </label>
                            </div>
                            <button id="submit_btn" type="submit" class="btn nwbtn4">Sign up</button>

                        {!! Form::close() !!}

                    </section>
                </div>



            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="squarespaceModal-6789" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content mymodal">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <div class="modal-body ">
                <h2 class="rd text-center"><i class="fa fa-close"></i> Sorry!</h2>
                <h5 class="rd text-center">You Reach the maximum Children</h5>
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')
    <script>
        $(document).on('click', '.person', function (event) {

            unique_id = $(this).data('unique_id');
            obj = $(this);
            $.post("ajax/getDownLines",
                {
                    unique_id: unique_id
                },
                function (data, status) {
                    if (data.RightDownLine && data.LeftDownLine) {
                        obj.parent().parent().append(
                            '<div class="hv-item-children"></div> '
                        ).find('.hv-item-children')
                            .append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person" data-unique_id="' + data.LeftDownLine.unique_id + '" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">' + data.LeftDownLine.name + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            ).append(
                            '<div class="hv-item-child">' +
                            '<div class="hv-item">' +
                            '<div class="hv-item-parent">' +
                            '<div class="person"  data-unique_id="' + data.RightDownLine.unique_id + '" >' +
                            '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                            '<p class="name">' + data.RightDownLine.name + '</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        );

                    }
                    else {
                        if (data.RightDownLine) {
                            obj.parent().parent().append(
                                '<div class="hv-item-children"></div> '
                            ).find('.hv-item-children')
                                .append(
                                    '<div class="hv-item-child">' +
                                    '<div class="hv-item">' +
                                    '<div class="hv-item-parent">' +
                                    '<div class="person" >' +
                                    '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                    '<p class="name">+</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                ).append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person"  data-unique_id="' + data.RightDownLine.unique_id + '" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">' + data.RightDownLine.name + '</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        else if (data.LeftDownLine) {
                            obj.parent().parent().append(
                                '<div class="hv-item-children"></div> '
                            ).find('.hv-item-children')
                                .append(
                                    '<div class="hv-item-child">' +
                                    '<div class="hv-item">' +
                                    '<div class="hv-item-parent">' +
                                    '<div class="person" data-unique_id="' + data.LeftDownLine.unique_id + '" >' +
                                    '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                    '<p class="name">' + data.LeftDownLine.name + '</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                ).append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">+</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                        else {
                            obj.parent().parent().append(
                                '<div class="hv-item-children"></div> '
                            ).find('.hv-item-children')
                                .append(
                                    '<div class="hv-item-child">' +
                                    '<div class="hv-item">' +
                                    '<div class="hv-item-parent">' +
                                    '<div class="person" >' +
                                    '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                    '<p class="name">+</p>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                ).append(
                                '<div class="hv-item-child">' +
                                '<div class="hv-item">' +
                                '<div class="hv-item-parent">' +
                                '<div class="person" >' +
                                '<img src="https://randomuser.me/api/portraits/men/3.jpg">' +
                                '<p class="name">+</p>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                });

        });
    </script>

    <script>
        $('#squarespaceModal').empty();
        $('.add').click(function () {

            unique_id = $(this).data('unique_id');
            position = $(this).data('position');

            $("#parent_id_input").val(unique_id);
            $("#position_input").val(position);
        })

    </script>
@endsection