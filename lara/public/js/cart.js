(function( $ ) {
    let properties = {
        csrfToken: null
    };

    let methods = {
        addProductToCart: function (e) {
            e.stopPropagation();
            e.preventDefault();

            $.ajax({
                method: 'post',
                url: '/cart/add-product',
                data: {
                    _token: properties.csrfToken,
                    productId: $(this).data('productId')
                },
                success: function (data) {
                    methods.refreshCartRow(data);
                }
            })
        },
        refreshCartRow: function (cartData) {
            let cartWrapper = $('#products-cart');
            let row = cartWrapper.find('tr[data-id="' + cartData.id + '"]');
            if (row.length) {
                row.find('.quantity').text(cartData['quantity']);
                row.find('.price').text(
                    '$' + (cartData['product']['price'] * cartData['quantity'])
                );
                return row;
            }

            row = $('<tr/>').attr('data-id', cartData.id)
                .append($('<td/>').text(cartData['product_id']))
                .append($('<td/>').text(cartData['product']['title']))
                .append($('<td/>').addClass('quantity').text(cartData['quantity']))
                .append($('<td/>').addClass('price').text(
                    '$' + (cartData['product']['price'] * cartData['quantity'])
                ))

            cartWrapper.append(row);
        }
    };

    $.fn.initCart = function(csrfToken) {
        properties.csrfToken = csrfToken;

        $('.add-to-cart').on('click', methods.addProductToCart);

        return this;
    };
}( jQuery ));
