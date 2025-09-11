class WishlistManager {
    constructor() {
        this.init();
    }

    init() {
        this.setupCSRFToken();
        this.bindEvents();
        this.updateWishlistCount();
    }

    setupCSRFToken() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

    bindEvents() {
        // Toggle wishlist (heart icon)
        $(document).on('click', '.wishlist-toggle', (e) => {
            e.preventDefault();
            this.toggleWishlist(e.currentTarget);
        });

        // Remove from wishlist
        $(document).on('click', '.wishlist-remove', (e) => {
            e.preventDefault();
            this.removeFromWishlist(e.currentTarget);
        });

        // Clear wishlist
        $(document).on('click', '.wishlist-clear', (e) => {
            e.preventDefault();
            this.clearWishlist();
        });

        // Add all to cart
        $(document).on('click', '.add-all-to-cart', (e) => {
            e.preventDefault();
            this.addAllToCart();
        });
    }

    toggleWishlist(element) {
        const $element = $(element);
        const productId = $element.data('product-id');

        if (!this.isAuthenticated()) {
            this.showLoginPrompt();
            return;
        }

        // Add loading state
        $element.prop('disabled', true);
        
        $.ajax({
            url: '/user/wishlist/toggle',
            method: 'POST',
            data: { product_id: productId },
            success: (response) => {
                if (response.success) {
                    this.updateWishlistButton($element, response.in_wishlist);
                    this.updateWishlistCount(response.wishlist_count);
                    this.showNotification(response.message, 'success');
                } else {
                    this.showNotification(response.message, 'error');
                }
            },
            error: (xhr) => {
                this.showNotification('An error occurred. Please try again.', 'error');
                console.error('Wishlist toggle error:', xhr);
            },
            complete: () => {
                $element.prop('disabled', false);
            }
        });
    }

    removeFromWishlist(element) {
        const $element = $(element);
        const productId = $element.data('product-id');

        if (!confirm('Remove this item from your wishlist?')) {
            return;
        }

        $.ajax({
            url: `/user/wishlist/${productId}`,
            method: 'DELETE',
            success: (response) => {
                if (response.success) {
                    // Remove the item from DOM
                    $element.closest('.wishlist-item').fadeOut(300, function() {
                        $(this).remove();
                        // Check if wishlist is empty
                        if ($('.wishlist-item').length === 0) {
                            $('#empty-wishlist').removeClass('hidden');
                            $('.wishlist-grid').addClass('hidden');
                        }
                    });
                    
                    this.updateWishlistCount(response.wishlist_count);
                    this.showNotification(response.message, 'success');
                } else {
                    this.showNotification(response.message, 'error');
                }
            },
            error: (xhr) => {
                this.showNotification('Failed to remove item from wishlist.', 'error');
                console.error('Remove from wishlist error:', xhr);
            }
        });
    }

    clearWishlist() {
        if (!confirm('Are you sure you want to clear your entire wishlist?')) {
            return;
        }

        $.ajax({
            url: '/user/wishlist',
            method: 'DELETE',
            success: (response) => {
                if (response.success) {
                    $('.wishlist-item').fadeOut(300);
                    setTimeout(() => {
                        $('#empty-wishlist').removeClass('hidden');
                        $('.wishlist-grid').addClass('hidden');
                    }, 300);
                    
                    this.updateWishlistCount(0);
                    this.showNotification(response.message, 'success');
                } else {
                    this.showNotification(response.message, 'error');
                }
            },
            error: (xhr) => {
                this.showNotification('Failed to clear wishlist.', 'error');
                console.error('Clear wishlist error:', xhr);
            }
        });
    }

    addAllToCart() {
        const availableItems = $('.wishlist-item .add-to-cart:not(:disabled)').length;
        
        if (availableItems === 0) {
            this.showNotification('No available items to add to cart.', 'warning');
            return;
        }

        if (!confirm(`Add all ${availableItems} available items to your cart?`)) {
            return;
        }

        // This would integrate with your cart system
        // For now, we'll simulate the action
        $('.wishlist-item .add-to-cart:not(:disabled)').each((index, element) => {
            setTimeout(() => {
                $(element).click();
            }, index * 200); // Stagger the clicks
        });
    }

    updateWishlistButton(element, inWishlist) {
        const $element = $(element);
        const $icon = $element.find('svg path');
        
        if (inWishlist) {
            $element.addClass('text-red-500 bg-red-50').removeClass('text-gray-400');
            // Update icon to filled heart
            $icon.attr('d', 'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z');
        } else {
            $element.removeClass('text-red-500 bg-red-50').addClass('text-gray-400');
            // Update icon to outline heart
            $icon.attr('d', 'M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z');
        }
    }

    updateWishlistCount(count = null) {
        if (count !== null) {
            $('.wishlist-count').text(count);
            
            // Update header count display
            const $headerCount = $('.wishlist-badge');
            if (count > 0) {
                $headerCount.text(count).show();
            } else {
                $headerCount.hide();
            }
        } else {
            // Fetch current count
            $.get('/wishlist/count', (response) => {
                this.updateWishlistCount(response.count);
            });
        }
    }

    showNotification(message, type = 'info') {
        // Remove existing notifications
        $('.notification').remove();

        const bgColor = {
            'success': 'bg-green-500',
            'error': 'bg-red-500',
            'warning': 'bg-yellow-500',
            'info': 'bg-blue-500'
        }[type] || 'bg-blue-500';

        const $notification = $(`
            <div class="notification fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full opacity-0 transition-all duration-300">
                <div class="flex items-center">
                    <span>${message}</span>
                    <button class="ml-4 text-white hover:text-gray-200" onclick="$(this).parent().parent().remove()">
                        <svg width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/>
                        </svg>
                    </button>
                </div>
            </div>
        `);

        $('body').append($notification);

        // Animate in
        setTimeout(() => {
            $notification.removeClass('translate-x-full opacity-0');
        }, 100);

        // Auto remove after 4 seconds
        setTimeout(() => {
            $notification.addClass('translate-x-full opacity-0');
            setTimeout(() => $notification.remove(), 300);
        }, 4000);
    }

    isAuthenticated() {
        return $('meta[name="user-authenticated"]').attr('content') === 'true';
    }

    showLoginPrompt() {
        this.showNotification('Please log in to add items to your wishlist.', 'warning');
        // Optionally redirect to login
        // window.location.href = '/login';
    }
}

// Initialize when document is ready
$(document).ready(function() {
    window.wishlistManager = new WishlistManager();
});