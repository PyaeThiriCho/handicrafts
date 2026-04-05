@extends('frontend.layout')

@section('content')
<section class="py-5" style="background-color: #f8f9fa; min-height: 90vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    
                    <div class="card-header bg-white py-3 px-4 border-bottom d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold" style="font-family: 'Inter', sans-serif;">
                            <i class="fas fa-shopping-cart me-2"></i> Shopping Cart
                        </h5>
                        <a href="{{ route('homepage') }}" class="btn-close" aria-label="Close"></a>
                    </div>

                    <div class="card-body p-0">
                        <div id="cartPageItems" class="p-4" style="max-height: 500px; overflow-y: auto;">
                            </div>

                        <div id="emptyCartPage" class="text-center py-5" style="display: none;">
                            <i class="fas fa-shopping-basket fa-3x text-muted mb-3"></i>
                            <h4 class="text-muted">Your cart is empty</h4>
                            <p class="small text-secondary">Add some handcrafted items to get started!</p>
                            <a href="{{ route('homepage') }}" class="btn btn-outline-primary rounded-pill px-4 mt-2">Shop Now</a>
                        </div>
                    </div>

                    <div id="cartPageSummary" class="card-footer bg-white p-4 border-top" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="h6 mb-0 fw-bold text-secondary">Total:</span>
                            <span class="h5 mb-0 fw-bold text-dark" id="pageTotal">0 MMK</span>
                        </div>
                        
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-secondary px-4 py-2 fw-semibold" style="background-color: #6c757d; border: none;" onclick="window.location.href='/'">
                                Continue Shopping
                            </button>
                            <button class="btn btn-primary px-4 py-2 fw-semibold" id="checkoutBtn" style="background-color: #0d6efd; border: none;">
                                Checkout
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-link text-muted text-decoration-none small" onclick="clearFullCart()">
                        <i class="fas fa-trash-alt me-1"></i> Clear entire cart
                    </button>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
    /* Styling to match the "Rosiva" screenshot exactly */
    .cart-item-row {
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        transition: all 0.2s ease;
    }

    .qty-box-modal {
        border: 1px solid #ccc;
        border-radius: 4px;
        display: flex;
        align-items: center;
        overflow: hidden;
    }

    .qty-btn-modal {
        background: #fff;
        border: none;
        padding: 0 10px;
        font-size: 1.2rem;
        color: #888;
        cursor: pointer;
    }

    .qty-btn-modal:hover { background: #f8f9fa; color: #333; }

    .qty-input-modal {
        width: 60px;
        text-align: center;
        border: none;
        border-left: 1px solid #ccc;
        border-right: 1px solid #ccc;
        font-weight: 500;
        font-size: 0.9rem;
    }

    .delete-btn-rosiva {
        border: 1px solid #dc3545;
        color: #dc3545;
        background: transparent;
        border-radius: 4px;
        padding: 5px 10px;
        transition: 0.3s;
    }

    .delete-btn-rosiva:hover {
        background: #dc3545;
        color: #fff;
    }
</style>

<script>
window.renderFullCartPage = function() {
    let basket = JSON.parse(localStorage.getItem('psm_cart_data')) || [];
    const container = document.getElementById('cartPageItems');
    const emptyMsg = document.getElementById('emptyCartPage');
    const summary = document.getElementById('cartPageSummary');

    if (!container) return;

    if (basket.length === 0) {
        container.innerHTML = '';
        emptyMsg.style.display = 'block';
        summary.style.display = 'none';
        return;
    }

    emptyMsg.style.display = 'none';
    summary.style.display = 'block';

    let subtotal = 0;
    container.innerHTML = basket.map(item => {
        let itemTotal = item.price * item.item;
        subtotal += itemTotal;

        return `
            <div class="cart-item-row">
                <div class="row align-items-center g-3">
                    <div class="col-3 col-md-2">
                        <img src="${item.image}" alt="${item.name}" class="img-fluid rounded" style="width: 70px; height: 70px; object-fit: cover;">
                    </div>
                    
                    <div class="col-9 col-md-3">
                        <h6 class="fw-bold mb-0">${item.name}</h6>
                        <small class="text-muted">${item.price.toLocaleString()} MMK</small>
                    </div>
                    
                    <div class="col-6 col-md-3 d-flex justify-content-center">
                        <div class="qty-box-modal">
                            <button class="qty-btn-modal" onclick="updateQuantity('${item.id}', -1)">-</button>
                            <input type="text" class="qty-input-modal" value="${item.item}" readonly>
                            <button class="qty-btn-modal" onclick="updateQuantity('${item.id}', 1)">+</button>
                        </div>
                    </div>
                    
                    <div class="col-4 col-md-3 text-center">
                        <span class="fw-bold text-dark">${itemTotal.toLocaleString()} MMK</span>
                    </div>
                    
                    <div class="col-2 col-md-1 text-end">
                        <button class="delete-btn-rosiva" onclick="removeItem('${item.id}')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>`;
    }).join('');

    // Update total (The model uses a simple total, not split by tax)
    document.getElementById('pageTotal').innerText = subtotal.toLocaleString() + " MMK";
};

// Ensure it renders on first load
document.addEventListener('DOMContentLoaded', renderFullCartPage);

window.clearFullCart = function() {
    if(confirm("Empty your entire basket?")) {
        localStorage.removeItem('psm_cart_data');
        location.reload();
    }
};
</script>
@endsection