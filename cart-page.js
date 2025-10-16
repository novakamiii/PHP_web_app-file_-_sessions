// cart-page.js (robust jQuery version)
$(document).ready(function () {
  // helper: parse money-like strings into a float (strips currency symbols, commas, spaces)
  function parseMoney(text) {
    if (!text && text !== 0) return 0;
    // remove everything except digits and dot
    const cleaned = String(text).replace(/[^0-9.]/g, '');
    return parseFloat(cleaned) || 0;
  }

  // initialize unit price for each row (store on row as data-unit)
  $('#cart-page-items .list-group-item').each(function () {
    const $row = $(this);
    const qty = parseInt($row.find('.qty').text()) || 0;
    const total = parseMoney($row.find('.item-total').text());
    // avoid division by zero: if qty is 0, try to use a data attribute or leave 0
    const unit = qty > 0 ? total / qty : parseMoney($row.data('unit') || $row.attr('data-unit') || 0);
    $row.data('unit', unit);
    // normalize display to two decimals (optional)
    $row.find('.item-total').text(unit * qty ? (unit * qty).toFixed(2) : '0.00');
  });

  // recalc the cart total
  function updateTotal() {
    let total = 0;
    $('#cart-page-items .list-group-item').each(function () {
      total += parseMoney($(this).find('.item-total').text());
    });
    $('#cart-page-total').text(total.toFixed(2));
  }

  // increase qty
  $(document).on('click', '.increase', function (e) {
    e.preventDefault();
    const $row = $(this).closest('.list-group-item');
    const $qty = $row.find('.qty');
    let qty = parseInt($qty.text()) || 0;
    qty++;
    $qty.text(qty);
    const unit = parseFloat($row.data('unit')) || 0;
    $row.find('.item-total').text((unit * qty).toFixed(2));
    updateTotal();
  });

  // decrease qty
  $(document).on('click', '.decrease', function (e) {
    e.preventDefault();
    const $row = $(this).closest('.list-group-item');
    const $qty = $row.find('.qty');
    let qty = parseInt($qty.text()) || 0;
    if (qty <= 1) return; // keep at least 1
    qty--;
    $qty.text(qty);
    const unit = parseFloat($row.data('unit')) || 0;
    $row.find('.item-total').text((unit * qty).toFixed(2));
    updateTotal();
  });

  // remove item
  $(document).on('click', '.remove', function (e) {
    e.preventDefault();
    $(this).closest('.list-group-item').remove();
    // if no items left, show empty message
    if ($('#cart-page-items .list-group-item').length === 0) {
      $('#cart-page-items').html('<div class="alert alert-secondary">Your cart is empty.</div>');
    }
    updateTotal();
  });

  // clear cart (visual only)
  $('#cart-page-clear').on('click', function (e) {
    e.preventDefault();
    $('#cart-page-items').html('<div class="alert alert-secondary">Your cart is empty.</div>');
    $('#cart-page-total').text('0.00');
  });

  // initial total calc on load
  updateTotal();
});
