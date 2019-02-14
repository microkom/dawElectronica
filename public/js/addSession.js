/*Captura el valor e Id del producto  y lo pasa al carrito*/

$(document).ready(function () {

    $(this).on("click", ".shop", function () {
        var productId = $(this).parent().parent().find('.productId').html();
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


    $('.mas').click(function () {
        var productId = $(this).parent().attr('id').split('uds')[1];
        var price = $(this).parent().find('.priceDB').text();
        $.ajax({
            url: "/carrito/" + productId,
            type: "get",
            //headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //data: { id : productId },
            success: function (data) {
                if (data == 1) {
                    alert('Error agregando al carrito.');
                } else {
                    var valor = $('#uds' + productId).find('.valor');
                    var val = parseInt(valor.html()) + 1;
                    valor.html(val);
                    //calcular el precio calculado del producto
                    var sellPrice = showProductSellPrice(val, price);
                    $('#price' + productId).text(sellPrice);
                    totalPrice();
                }
            }, error: function () {
                alert("Error ajax agregando al carrito!!!!");
            }
        });

    });
    $('.menos').click(function () {
        var productId = $(this).parent().attr('id').split('uds')[1];
        var price = $(this).parent().find('.priceDB').text();

        $.ajax({
            url: "/carrito/" + productId + "/menos",
            type: "get",
            success: function (data) {
                var valor = $('#uds' + productId).find('.valor');
                var val = parseInt(valor.html());
                if (val > 1) {
                    val = val - 1;
                    valor.html(val);

                    $('.totalItemsCart').text(data);
                    //calcular el precio calculado del producto
                    var sellPrice = showProductSellPrice(val, price);
                    $('#price' + productId).text(sellPrice);
                    totalPrice();

                } else if (val === 1) {
                    $.ajax({
                        url: "/carrito/borrar/" + productId,
                        type: "get",
                        success: function (dataDel) {
                            $('#uds' + productId).parent().parent().fadeOut(function () {
                                $(this).remove();
                            });
                            $('.totalItemsCart').text(data);
                            totalPrice();
                        }
                    });
                }

            }, error: function () {
                alert("Error ajax agregando al carrito!!!!");
            }
        });

    });
    $('.borrarLinea').click(function () {
        var td1 = $(this).parent().parent().find('td:eq(2)');
        var productId = td1.find('span:eq(0)').attr('id').split('uds')[1];
        $.ajax({
            url: "/carrito/borrar/" + productId,
            type: "get",
            success: function (data) {
                $('#uds' + productId).parent().parent().fadeOut(function () {
                    $(this).remove();
                });
                $('.totalItemsCart').text(data);
                totalPrice();
            }
        });
    });


});

function showProductSellPrice(qty, price) {
    return qty * price;
}

function totalPrice(){
    var total = 0;
    var priceTotal = $('.table').find('.totalPrice');
    var size = $('.table').find('tbody').find('tr').length;
    for(i=0;i<size;i++){
        subtot = $('.table').find('tbody').find('tr').find('td:eq(3)').find('.subtotal'+i).html();
        subtot = parseFloat(subtot);
        total = total + subtot;
    }
    priceTotal.html(total);
}