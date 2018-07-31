$(document).ready(function () {


});

function getSubCategories() {
    url = $('#url').data('url');

    var category_ids = [];
    $("#categories_form .category").each(function () {
        if ($(this).is(":checked")) {
            category_ids.push($(this).val());
        }
    });

    $.post(url + "/ajax/getSubCategories",
        {
            category_ids: JSON.stringify(category_ids)
        },
        function (data, status) {

            $("#sub_categories_container").empty();
            $.each(data, function (index) {
                $("#sub_categories_container").append("" +
                    "<label>" +
                    "<input class='sub_category'" +
                   // "onchange='getProducts()'" +
                    "name=sub_category_id[]" + " " +
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
    $('#sub_categories_form').submit();
}