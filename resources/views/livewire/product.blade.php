<div
    class="product-card group relative bg-white rounded-2xl overflow-hidden transition-all duration-500 w-[320px] mx-auto hover:shadow-2xl">

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

    <!-- SweetAlert Event Listeners -->
    <script>
        window.addEventListener('toast:wishlistAdd', event => {
            Swal.fire({
                toast: true,
                position: 'top',
                icon: event.detail[0].icon || 'success',
                title: event.detail[0].message || 'Item added to wishlist!',
                showConfirmButton: false,
                timer: 3000
            });
        });
        window.addEventListener('toast:added', event => {
            const detail = event.detail[0];

            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: detail.icon || 'success',
                title: detail.message || 'Item added to cart!',
                text: detail.subtitle || 'Product successfully added to your shopping cart',
                showConfirmButton: false,
                showCloseButton: true,
                timer: 4000,
                timerProgressBar: true,
                width: '400px',
                padding: '1rem',
                background: '#ffffff',
                color: '#1f2937',
                iconColor: '#10b981',
                customClass: {
                    popup: 'enhanced-toast',
                    title: 'toast-title',
                    content: 'toast-content',
                    timerProgressBar: 'toast-progress',
                    closeButton: 'toast-close'
                },
                didOpen: (toast) => {
                    toast.style.animation = 'slideInRight 0.3s ease-out';

                    toast.addEventListener('mouseenter', () => {
                        Swal.stopTimer();
                    });

                    toast.addEventListener('mouseleave', () => {
                        Swal.resumeTimer();
                    });

                    if (detail.productName || detail.viewCart) {
                        const actionButton = document.createElement('button');
                        actionButton.innerHTML = `
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"/>
                        </svg>
                        View Cart
                    `;
                        actionButton.className = 'toast-action-btn';
                        actionButton.onclick = () => {
                            window.location.href = '/cart';
                            Swal.close();
                        };

                        toast.querySelector('.swal2-content').appendChild(actionButton);
                    }
                },
                willClose: (toast) => {
                    toast.style.animation = 'slideOutRight 0.3s ease-in';
                }
            });
        });
    </script>

    <!-- Product Image Section with Overlay Info -->
    <div class="relative h-[400px] bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
        <a name="{{ $item->id }}"
            href="{{ route('shop.show', ['id' => $item->id, 'slug' => Str::slug($item->name_en)]) }}"
            class="block w-full h-full">
            <img src="{{ URL::to('storage/' . $item->main_image_url) }}"
                class="w-full h-full object-cover transition-all duration-700 group-hover:scale-110"
                alt="{{ $item->name }}" loading="lazy">
        </a>

        <!-- Dark Gradient Overlay on Hover -->
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
        </div>

        <!-- Wishlist Button - Always Visible -->
        {{-- <button id="whishlist-{{ $item->id }}" wire:click="addToWishlist"
            class="absolute top-4 right-4 w-12 h-12 bg-white/95 backdrop-blur-md rounded-full flex items-center justify-center shadow-xl hover:bg-black hover:text-white transition-all duration-300 transform hover:scale-110 z-20">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path
                    d="M21 8.5C21 5.48 18.52 3 15.5 3c-1.74 0-3.41.81-4.5 2.09C9.91 3.81 8.24 3 6.5 3 3.48 3 1 5.48 1 8.5c0 3.14 2.2 5.62 5.55 8.83l3.88 3.7c.26.25.6.37.94.37s.68-.12.94-.37l3.88-3.7C18.8 14.12 21 11.64 21 8.5z" />
            </svg>
        </button> --}}

        <!-- Premium Badge for Sale Items -->
        @if ($item->offer_price > 0)
            <div
                class="absolute top-4 left-4 bg-black text-white px-4 py-2 rounded-full text-xs font-semibold tracking-wider shadow-lg z-20">
                <span class="flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    {{ session('lang') == 'en' ? 'SPECIAL OFFER' : 'عرض خاص' }}
                </span>
            </div>
        @endif

        <!-- Product Info Overlay - Appears on Hover -->
        <div
            class="absolute bottom-0 left-0 right-0 p-6 translate-y-full group-hover:translate-y-0 transition-transform duration-500 z-10">
            <!-- Category Tag -->
            <div
                class="flex items-center gap-2 mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-100">
                <span class="text-xs font-medium tracking-wider text-white/80 uppercase">Home Decor</span>
                <span class="text-white/60">•</span>
                <div class="flex items-center gap-1">
                    <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-xs text-white/80">4.8</span>
                </div>
            </div>

            <!-- Product Name -->
            <h3
                class="font-semibold text-white text-lg mb-3 line-clamp-2 leading-snug tracking-tight opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-150">
                @if (session('lang') == 'en')
                    {{ $item->name_en }}
                @else
                    {{ $item->name_ar }}
                @endif
            </h3>

            <!-- Pricing -->
            <div
                class="flex items-baseline justify-between mb-4 opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-200">
                <div class="flex items-baseline gap-3">
                    @if (!empty($item->offer_price) && $item->offer_price > 0)
                        <span class="text-2xl font-bold text-white">
                            ${{ $item->getFormattedOfferPrice() }}
                        </span>
                        <span class="text-base text-white/60 line-through">
                            ${{ $item->getFormattedPrice() }}
                        </span>
                        <span class="text-xs font-semibold text-green-400 bg-green-400/20 px-2 py-1 rounded-full">
                            Save {{ round((($item->price - $item->offer_price) / $item->price) * 100) }}%
                        </span>
                    @else
                        <span class="text-2xl font-bold text-white">
                            ${{ $item->getFormattedPrice() }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 opacity-0 group-hover:opacity-100 transition-opacity duration-700 delay-300">
                <!-- Add to Cart Button -->
                <button id="p-item-{{ $item->id }}" wire:click="addToCart({{ $item->id }})"
                    class="flex-1 bg-white text-black py-3 px-4 rounded-full font-medium text-sm tracking-wide transition-all duration-300 flex items-center justify-center gap-2 hover:bg-black hover:text-white hover:shadow-xl transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>{{ session('lang') == 'en' ? 'Add to Basket' : 'أضف إلى السلة' }}</span>
                </button>

                <!-- Quick View Button -->
                {{-- <button wire:click="$dispatch('openQuickView', { productId: {{ $item->id }} })"
                    class="w-12 h-12 bg-white/20 backdrop-blur-md text-white rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button> --}}

                <!-- View Details Button -->
                <a href="{{ route('shop.show', ['id' => $item->id, 'slug' => Str::slug($item->name_en)]) }}"
                    class="w-12 h-12 bg-white/20 backdrop-blur-md text-white rounded-full flex items-center justify-center hover:bg-white hover:text-black transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Minimal Product Info - Always Visible -->
    {{-- <div class="p-4 bg-white">
        <!-- Simple Product Name for when not hovering -->
        <h3 class="font-medium text-gray-900 text-sm mb-1 line-clamp-1 group-hover:opacity-50 transition-opacity">
            @if (session('lang') == 'en')
                {{ $item->name_en }}
            @else
                {{ $item->name_ar }}
            @endif
        </h3>

        <!-- Simple Price Display -->
        <div class="flex items-center gap-2 group-hover:opacity-50 transition-opacity">
            @if (!empty($item->offer_price) && $item->offer_price > 0)
                <span class="text-base font-semibold text-gray-900">
                    ${{ $item->getFormattedOfferPrice() }}
                </span>
                <span class="text-sm text-gray-400 line-through">
                    ${{ $item->getFormattedPrice() }}
                </span>
            @else
                <span class="text-base font-semibold text-gray-900">
                    ${{ $item->getFormattedPrice() }}
                </span>
            @endif
        </div>
    </div> --}}
</div>
