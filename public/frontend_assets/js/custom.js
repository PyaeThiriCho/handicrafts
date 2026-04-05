$(document).ready(function(){
    // --- 1. BEST SELLER SLIDER ---
    $('.best-seller-slider').slick({
        dots: true,
        infinite: true,
        speed: 800,
        slidesToShow: 4, 
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        responsive: [
            {
                breakpoint: 1024,
                settings: { slidesToShow: 3 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 480,
                settings: { slidesToShow: 1 }
            }
        ]
    });

    // --- 2. SHOPPING CART LOGIC ---
    
    // Memory: Load existing items or start empty
    let basket = JSON.parse(localStorage.getItem('psm_cart_data')) || [];

    // Global Function: Add Item
    window.addItem = function(id, name, price, image) {
        let search = basket.find((x) => x.id === id);
        if (search === undefined) {
            basket.push({ id: id, name: name, price: price, image: image, item: 1 });
        } else {
            search.item += 1;
        }
        saveAndRender();
        $('#cartModal').modal('show');
    };

    // Global Function: Change Quantity (+ or -)
    window.updateQuantity = function(id, amount) {
        let search = basket.find((x) => x.id === id);
        if (search) {
            search.item += amount;
            if (search.item < 1) {
                if(confirm("Remove this item from your basket?")) {
                    basket = basket.filter((x) => x.id !== id);
                } else {
                    search.item = 1;
                }
            }
            saveAndRender();
        }
    };

    // Global Function: Remove Item Completely
    window.removeItem = function(id) {
        basket = basket.filter((x) => x.id !== id);
        saveAndRender();
    };

    // Main Sync Function
    window.saveAndRender = function() {
        localStorage.setItem('psm_cart_data', JSON.stringify(basket));
        
        // 1. Update Navbar Badge
        let cartCount = document.getElementById('cartCount');
        if (cartCount) {
            let totalItems = basket.reduce((sum, x) => sum + x.item, 0);
            cartCount.innerHTML = totalItems;
            cartCount.style.display = totalItems > 0 ? 'block' : 'none';
        }

        // 2. Update the Modal (Rosiva Modal)
        let cartItems = document.getElementById('cartItems');
        if (cartItems) {
            cartItems.innerHTML = basket.map((x) => `
                <div class="d-flex align-items-center mb-3 border-bottom pb-2">
                    <img src="${x.image}" width="50" height="50" style="object-fit:cover;" class="me-3 rounded">
                    <div class="flex-grow-1">
                        <h6 class="mb-0 fw-bold" style="font-size:0.85rem;">${x.name}</h6>
                        <small class="text-muted">${x.price} MMK x ${x.item}</small>
                    </div>
                    <button class="btn btn-sm text-danger border-0" onclick="removeItem('${x.id}')">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </div>`).join("") || '<p class="text-center text-muted py-3">Your cart is empty</p>';
        }

        // 3. Update the Modal Total Display
        let cartTotal = document.getElementById('cartTotalDisplay');
        if (cartTotal) {
            let totalAmount = basket.reduce((sum, x) => sum + (x.item * x.price), 0);
            cartTotal.innerHTML = totalAmount.toLocaleString();
        }

        // 4. Update the Full Cart Page (if the user is on /cart)
        if (typeof renderFullCartPage === "function") {
            renderFullCartPage();
        }
    };

    saveAndRender();
});