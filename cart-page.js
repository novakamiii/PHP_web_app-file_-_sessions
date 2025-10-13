(function(){
  const CART_KEY = 'weyewear_cart_v1';
  function readCart(){ try { return JSON.parse(localStorage.getItem(CART_KEY)) || [] } catch(e){ return [] } }
  function writeCart(c){ localStorage.setItem(CART_KEY, JSON.stringify(c)); }
  function formatPrice(n){ return parseFloat(n||0).toFixed(2); }

  function render(){
    const container = document.getElementById('cart-page-items');
    const totalEl = document.getElementById('cart-page-total');
    if(!container) return;
    const cart = readCart();
    container.innerHTML = '';
    if(cart.length === 0){
      container.innerHTML = '<div class="alert alert-secondary">Your cart is empty</div>';
      if(totalEl) totalEl.textContent = '0.00';
      return;
    }

    let total = 0;
    cart.forEach(item=>{
      total += (item.price || 0) * (item.qty || 1);
      const row = document.createElement('div');
      row.className = 'list-group-item d-flex align-items-center';
      row.innerHTML = `
        <img src="${item.img||''}" alt="${item.name||''}" style="width:64px;height:64px;object-fit:cover;border-radius:6px;margin-right:12px">
        <div class="flex-fill">
          <div class="fw-bold">${item.name}</div>
          <div>Qty: <span class="qty">${item.qty}</span> &middot; ₱${formatPrice(item.price)}</div>
        </div>
        <div>
          <div class="text-end">₱${formatPrice((item.price||0)*(item.qty||1))}</div>
          <div class="btn-group mt-2" role="group">
            <button class="btn btn-sm btn-outline-secondary decrease">−</button>
            <button class="btn btn-sm btn-outline-secondary increase">+</button>
            <button class="btn btn-sm btn-outline-danger remove">Remove</button>
          </div>
        </div>
      `;

      row.querySelector('.decrease').addEventListener('click', ()=>{
        changeQty(item.id, -1);
      });
      row.querySelector('.increase').addEventListener('click', ()=>{
        changeQty(item.id, +1);
      });
      row.querySelector('.remove').addEventListener('click', ()=>{
        removeItem(item.id);
      });

      container.appendChild(row);
    });
    if(totalEl) totalEl.textContent = formatPrice(total);
  }

  function changeQty(id, delta){
    const cart = readCart();
    const idx = cart.findIndex(x=>x.id===id);
    if(idx === -1) return;
    cart[idx].qty = (cart[idx].qty||1) + delta;
    if(cart[idx].qty <= 0) cart.splice(idx,1);
    writeCart(cart);
    render();
  }
  function removeItem(id){
    let cart = readCart();
    cart = cart.filter(x=>x.id!==id);
    writeCart(cart);
    render();
  }
  function clearCart(){ writeCart([]); render(); }

  document.addEventListener('DOMContentLoaded', ()=>{
    const clearBtn = document.getElementById('cart-page-clear');
    const checkoutBtn = document.getElementById('cart-page-checkout');
    if(clearBtn) clearBtn.addEventListener('click', ()=>{
      if(confirm('Clear cart?')) clearCart();
    });
    if(checkoutBtn) checkoutBtn.addEventListener('click', ()=>{
      alert('Checkout placeholder — implement payment flow');
    });
    render();
  });
})();
