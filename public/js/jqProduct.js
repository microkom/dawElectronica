$(document).ready(function () {

    $(this).on("click", ".shopDetail", function () {
        var productId = $('.productIdDetail').text();
        $.ajax({
            url: "/carrito/" + productId,
            type: "get",
            success: function (data) {
                $('.totalItemsCart').text(data);
            }, error: function () {
                alert("Error agregando al carrito!!!!");
            }
        });
    }
    );
});