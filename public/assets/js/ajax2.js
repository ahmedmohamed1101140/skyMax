$(document).ready(function () {


});

function getSubCategories() {
    var category_ids = [];
    $("#categories_form .category").each(function () {
        if ($(this).is(":checked")) {
            category_ids.push($(this).val());
        }
    });

    $.post(location + "ajax/getSubCategories",
        {
            category_ids: JSON.stringify(category_ids)
        },
        function (data, status) {

            $("#sub_categories_container").empty();
            $.each(data, function (index) {
                $("#sub_categories_container").append("" +
                    "<label>" +
                    "<input class='sub_category'" +
                    "onchange='getProducts()'" +
                    "type='checkbox'" +
                    "value=" + data[index].id + ">" +
                    "<span " +
                    "class='label-text'>"
                    + data[index].name +
                    "</span>" +
                    "</label>" +
                    "<br/>" +
                    "");
            });


        });


}

function getProducts() {

    var sub_category_ids = [];
    $("#sub_categories_form .sub_category").each(function () {
        if ($(this).is(":checked")) {
            sub_category_ids.push($(this).val());
        }
    });
    $.post(location + "ajax/getProducts",
        {
            sub_category_ids: JSON.stringify(sub_category_ids)
        },
        function (data, status) {

            $("#products_container").empty();
            $.each(data, function (index) {

                $("#products_container").append("  <div class=\"element element-in\">\n" +
                    "                                <h3><a href=\"{{url(\"products/$product->id\")}}\">{{$product->name}}</a></h3>\n" +
                    "                                <a href=\"{{url(\"products/$product->id\")}}\"><img\n" +
                    "                                            src=\"{{$product->main_image}}\" class=\"img-responsive\"/></a>\n" +
                    "                                <p style=\"word-break: break-word\">\n" +
                    "                                    {{substr($product->desc,0,120)}}\n" +
                    "                                </p>\n" +
                    "                                <a href=\"{{url(\"products/$product->id\")}}\"><strong>More..</strong></a>\n" +
                    "                                <h5 class=\"price\">\n" +
                    "                                    @if($product->offer)\n" +
                    "                                        <span>{{$product->price}}LE</span>\n" +
                    "                                        {{$product->new_price}} LE\n" +
                    "                                    @else {{$product->price}} LE\n" +
                    "                                    @endif\n" +
                    "                                </h5>\n" +
                    "                                @guest\n" +
                    "                                    <a href=\"#squarespaceModal\" data-toggle=\"modal\"\n" +
                    "                                       class=\"btn btn-form nwbtn add \"><span class=\"cart\"></span> Order</a>\n" +
                    "                                @endguest\n" +
                    "                                @auth\n" +
                    "                                    @if(auth()->user()->qualified ==1)\n" +
                    "                                        <a class=\"btn btn-form nwbtn add\"><span class=\"cart\"></span> Order</a>\n" +
                    "                                    @else\n" +
                    "                                        @if($product->product_type_id == 1)\n" +
                    "                                            <a class=\"btn btn-form nwbtn add\"><span class=\"cart\"></span> Order</a>\n" +
                    "                                        @else\n" +
                    "                                            <label class=\"btn btn-form nwbtn add gray_btn\"><span class=\"cart\"></span>\n" +
                    "                                                Order</label>\n" +
                    "                                        @endif\n" +
                    "                                    @endif\n" +
                    "                                @endauth\n" +
                    "                            </div>");

            });


        });


}