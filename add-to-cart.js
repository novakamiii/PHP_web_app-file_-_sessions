$(function () {
    let selectedSize = $('.size-btn.active').data('size') || 'medium';

    //Size Selection
    $('.size-btn').on('click', function () {
        $('.size-btn').removeClass('active');
        $(this).addClass('active');
        selectedSize = $(this).data('size');
    });

    //Quantity
    $('#increaseQty').on('click', function () {
        let val = parseInt($('#quantityInput').val());
        if (val < 10) $('#quantityInput').val(val + 1);
    });

    $('#decreaseQty').on('click', function () {
        let val = parseInt($('#quantityInput').val());
        if (val > 1) $('#quantityInput').val(val - 1);
    });

    // redirect to Cart
    $('#addToCartBtn').on('click', function (e) {
        e.preventDefault();

        const productId = $(this).data('id');
        const quantity = $('#quantityInput').val();
        const size = selectedSize;

        const redirectUrl = `cart.php?action=add&id=${productId}&size=${encodeURIComponent(size)}&qty=${quantity}`;
        window.location.href = redirectUrl;
    });
});
