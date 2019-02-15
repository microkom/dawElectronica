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
        realizarCompra();
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
                valor.html(val);
                //calcular el precio calculado del producto
                var sellPrice = showProductSellPrice(val, price);
                $('#price' + productId).text(sellPrice);
                realizarCompra();
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
                    //calcular el precio calculado del producto
                    var sellPrice = showProductSellPrice(val, price);
                    $('#price' + productId).text(sellPrice);

                    $('.totalItemsCart').text(data);
                    realizarCompra();
                } else if (val === 1) {
                    $.ajax({
                        url: "/carrito/borrar/" + productId,
                        type: "get",
                        success: function (dataDel) {
                            realizarCompra();
                            $('#uds' + productId).parent().parent().fadeOut(function () {
                                $(this).remove();
                                realizarCompra();
                                $('.totalItemsCart').text(dataDel);
                            });
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
                //realizarCompra(); 
                $('#uds' + productId).parent().parent().fadeOut(function () {
                    $(this).remove();
                    realizarCompra();
                });
                /**
                 * Muestra el precio  total de los productos
                 */

                $('.totalItemsCart').text(data);

            }
        });

    });


});

function showProductSellPrice(qty, price) {
    return qty * price;
}

function realizarCompra() {

    var total = 0;
    var tax = 0;

    $('.subtotal').each(function () {
        total += parseFloat($(this).html());
    });
    var subtotal = total / 1.21;
    var tax = subtotal * 0.21;
    $('#totalPrice').html(total.toFixed(2));
    $('#totalTax').html(tax.toFixed(2));
    $('#totalBeforeTax').html(subtotal.toFixed(2));
}


function rsealizarCompra() {
    //$('#totalPrice').html(parseInt($('#totalPrice').html()) - parseInt(price));
    var totalTax = Math.round((parseFloat($('#totalPrice').html()) * 0.21), 2);
    //console.log(totalTax);
    var totalBeforeTax = Math.round((parseFloat($('#totalPrice').html()) / 1.21), 2);
    $('#totalTax').html(totalTax);
    $('#totalBeforeTax').html(totalBeforeTax);
    $('#totalPrice').html(totalTax + totalBeforeTax);
}