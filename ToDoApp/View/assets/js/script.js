$(function () {
    $(".answer input").on("change", function (event) {

        var data = {};
        data.checked = event.target.checked==true? 1 : 0;
        data.id = event.target.id;
        data.controller = 'todo';
        data.action = 'update';

        $.ajax({
            type: "GET",
            url: "./index.php",
            data: data,
            success: function(result){
                $('#itemscount').html(result);
            }
        });

    });
});