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
        // $(document).on('click', '.add-all-to-cart', (e) => {
        //     e.preventDefault();
        //     this.addAllToCart();
        // });
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
            console.log('Toggle response:', response); // Debug line
            if (response.success) {
                this.updateWishlistButton($element, response.in_wishlist);
                this.updateWishlistCount(response.wishlist_count);
                this.showNotification(response.message, 'success');
            } else {
                this.showNotification(response.message, 'error');
            }
        },
        error: (xhr) => {
            console.error('Wishlist toggle error:', xhr);
            this.showNotification('An error occurred. Please try again.', 'error');
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
    const $icon = $element.find('svg');
    
    if (inWishlist) {
        $element.removeClass('bg-white text-gray-400 hover:bg-secondary hover:text-white')
                .addClass('text-red-500 bg-red-50 hover:bg-red-500 hover:text-white');
        $icon.attr('fill', 'currentColor').attr('stroke-width', '0');
    } else {
        $element.removeClass('text-red-500 bg-red-50 hover:bg-red-500 hover:text-white')
                .addClass('bg-white text-gray-400 hover:bg-secondary hover:text-white');
        $icon.attr('fill', 'none').attr('stroke-width', '2');
    }
    $element.attr('data-in-wishlist', inWishlist.toString());
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
            $.get('wishlist/count', (response) => {
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