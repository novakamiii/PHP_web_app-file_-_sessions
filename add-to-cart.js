// (function(){
//   // add-to-cart.js
//   // Adds clicked product to localStorage cart then redirects to cart.html
//   const CART_KEY = 'weyewear_cart_v1';

//   function readCart(){ try { return JSON.parse(localStorage.getItem(CART_KEY)) || [] } catch(e){ return [] } }
//   function writeCart(c){ localStorage.setItem(CART_KEY, JSON.stringify(c)); }

//   function parseProduct(el){
//     if(!el) return null;
//     // Try common patterns used in your pages
//     // 1) Bootstrap card: h5.card-title and p.card-text
//     const titleEl = el.querySelector('.card-title') || el.querySelector('h5') || el.querySelector('.vis-tag') || el.querySelector('.Fashion-tag') || el.querySelector('.sun-tag') || el.querySelector('.pro-tag');
//     const priceEl = el.querySelector('.card-text') || el.querySelector('p.card-text') || el.querySelector('.vis-tag span') || el.querySelector('p') || el.querySelector('.Fashion-tag span') || el.querySelector('.sun-tag span');

//     let name = '';
//     if(titleEl) name = titleEl.textContent.trim();
//     else {
//       // fallback: first <p> text without currency amount
//       const p = el.querySelector('p');
//       if(p) name = p.textContent.replace(/[\$₱]\s*[0-9]+(?:\.[0-9]+)?/,'').trim();
//     }

//     // price: look for $ or ₱ followed by number anywhere inside element text
//     const text = el.textContent || '';
//     const m = text.match(/[\$₱]\s*([0-9]+(?:\.[0-9]+)?)/);
//     const price = m ? parseFloat(m[1]) : 0;

//     const imgEl = el.querySelector('img');
//     const img = imgEl ? imgEl.src : '';

//     // produce an id safe key: use name + price
//     const id = (name + '|' + price).replace(/\s+/g,' ').trim();
//     return { id, name: name || 'Item', price: price || 0, img, qty: 1 };
//   }

//   function addProduct(product){
//     if(!product) return;
//     const cart = readCart();
//     const existing = cart.find(i=>i.id === product.id);
//     if(existing){ existing.qty = (existing.qty||0) + 1; }
//     else { cart.push(product); }
//     writeCart(cart);
//   }

//   // Listen for clicks on Add to Cart buttons (supports <a class="btn"> and <button>)
//   document.addEventListener('click', function(e){
//     const target = e.target.closest && (e.target.closest('a.btn') || e.target.closest('button.btn'));
//     if(!target) return;
//     // ensure it's an Add to Cart button by checking text content
//     const txt = (target.textContent || '').toLowerCase();
//     if(!/add to cart|addtocart|add to basket/.test(txt)) return;

//     e.preventDefault();
//     // find nearest product container: card, Vision-item, protection-item, sunglasses-item, Fashion-item
//     const container = target.closest('.card, .Vision-item, .protection-item, .sunglasses-item, .Fashion-item, .Vision, .protection, .sunglasses, .Fashionbox') || target.parentElement;
//     const product = parseProduct(container);
//     addProduct(product);

//     // Redirect immediately to cart page
//     try{ window.location.href = 'cart.html'; } catch(err){ console.error(err); }
//   }, false);
// })();
