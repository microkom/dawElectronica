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
                alert("Error agregando al qqqq carrito!!!!");
            }
        });
    }
    );


    $('.mas').click(function () {
        var productId = $(this).parent().attr('id').split('uds')[1];
        var price = $(this).parent().find('.priceDB').html();
        $.ajax({
            url: "/carrito/" + productId,
            type: "get",
            success: function (data) {
                var valor = $('#uds' + productId).find('.valor');
                var val = parseInt(valor.html()) + 1;
                /**
                 * Muestra el precio  total de los productos
                 */
                realizarCompra();
                
                valor.html(val);
                //calcular el precio calculado del producto
                var sellPrice = showProductSellPrice(val, price);
                $('#price' + productId).text(sellPrice);

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

                    realizarCompra();

                    //calcular el precio calculado del producto
                    var sellPrice = showProductSellPrice(val, price);
                    $('#price' + productId).text(sellPrice);


                    $('.totalItemsCart').text(data);
                } else if (val === 1) {
                    $.ajax({
                        url: "/carrito/borrar/" + productId,
                        type: "get",
                        success: function (dataDel) {
                            $('#uds' + productId).parent().parent().fadeOut(function () {
                                $(this).remove();
                                $('.totalItemsCart').text(dataDel);
                            });
                            $('#totalPrice').html(parseFloat($('#totalPrice').html()) - parseFloat(price));
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
        var price = $(this).parent().parent().find('.subtotal').text();
        $.ajax({
            url: "/carrito/borrar/" + productId,
            type: "get",
            success: function (data) {
                
                $('#uds' + productId).parent().parent().fadeOut(function () {
                    $(this).remove();
                });
                /**
                 * Muestra el precio  total de los productos
                 */
                realizarCompra();
                $('.totalItemsCart').text(data);
            }
        });
    });


});

function showProductSellPrice(qty, price) {
    return qty * price;
}

function realizarCompra() {
    //$('#totalPrice').html(parseInt($('#totalPrice').html()) - parseInt(price));
    var totalTax = Math.round((parseFloat($('#totalPrice').html()) * 0.21),2);
    console.log(totalTax);
    var totalBeforeTax = Math.round((parseFloat($('#totalPrice').html()) / 1.21),2);
    $('#totalTax').html(totalTax);
    $('#totalBeforeTax').html(totalBeforeTax);
    $('#totalPrice').html(totalTax+totalBeforeTax);
}