<div x-data="{ show: true }" class="md:mx-auto w-full md:max-w-6xl px-4">
    <!-- Redesigned Header Section -->
    <div @click="show = !show" class="group relative mb-8 cursor-pointer">

        <!-- Main Header Container -->
        <div class="relative overflow-hidden rounded-2xl  p-8 shadow-xl transition-all duration-500 hover:shadow-2xl">

            <!-- Decorative Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute -top-24 -right-24 h-64 w-64 rounded-full bg-white/20 blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 h-64 w-64 rounded-full bg-white/20 blur-3xl"></div>
            </div>

            <!-- Content Container -->
            <div class="relative flex items-center justify-between">

                <!-- Left Side - Title and Subtitle -->
                <div class="flex-1">
                    <!-- Category Label -->
                    {{-- <div class="mb-2 inline-flex items-center gap-2">
                        <span class="h-px w-8 bg-gradient-to-r from-transparent to-white/50"></span>
                        <span class="text-xs font-medium uppercase tracking-widest text-black/70">Featured
                            Collection</span>
                    </div> --}}

                    <!-- Main Title -->
                    <h2
                        class="mb-2 text-3xl font-bold text-black transition-all duration-300 group-hover:text-black/90 md:text-4xl">
                        {{ $title }}
                    </h2>

                    <!-- Product Count Badge -->
                    {{-- <div class="flex items-center gap-3">
                        <span
                            class="inline-flex items-center rounded-full bg-white/10 px-3 py-1 text-sm font-medium text-black/80 backdrop-blur-sm">
                            <svg class="mr-1.5 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 3.5a1.5 1.5 0 013 0V4a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-.5a1.5 1.5 0 000 3h.5a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-.5a1.5 1.5 0 00-3 0v.5a1 1 0 01-1 1H6a1 1 0 01-1-1v-3a1 1 0 00-1-1h-.5a1.5 1.5 0 010-3H4a1 1 0 001-1V6a1 1 0 011-1h3a1 1 0 001-1v-.5z" />
                            </svg>
                            {{ count($products) }} Products
                        </span>
                        <span class="text-sm text-black/60">
                            Click to <span x-text="show ? 'collapse' : 'expand'"></span>
                        </span>
                    </div> --}}
                </div>

                <!-- Right Side - Toggle Button -->
                <div class="flex items-center gap-4">
                    <!-- Decorative Element -->
                    <div class="hidden md:flex items-center gap-2">
                        <div class="h-12 w-px bg-gradient-to-b from-transparent via-black/20 to-transparent"></div>
                        <div class="flex flex-col gap-1">
                            <div class="h-1 w-1 rounded-full bg-black/40"></div>
                            <div class="h-1 w-1 rounded-full bg-black/60"></div>
                            <div class="h-1 w-1 rounded-full bg-black/40"></div>
                        </div>
                    </div>

                    <!-- Animated Toggle Icon -->
                    <div
                        class="relative h-14 w-14 rounded-full bg-black/10 backdrop-blur-sm transition-all duration-300 group-hover:bg-black/20">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="transform transition-all duration-500" :class="{ 'rotate-180': !show }">
                                <svg class="h-6 w-6 text-black" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>
                        <!-- Pulse Effect -->
                        <div class="absolute inset-0 rounded-full bg-white/20 animate-ping"></div>
                    </div>
                </div>
            </div>

            <!-- Bottom Decorative Line -->
            <div
                class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-white/30 to-transparent">
            </div>
        </div>

        <!-- Shadow Effect -->
        <div class="absolute -bottom-4 left-8 right-8 h-8 bg-gradient-to-b from-gray-900/20 to-transparent blur-xl">
        </div>
    </div>

    <!-- Products Grid with Enhanced Animation -->
    <div x-show="show" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-4"
        class="grid md:grid-cols-3 grid-cols-1 gap-6 justify-items-center">
        @foreach ($products as $item)
            <div class="w-full transform transition-all duration-300 hover:scale-105">
                <livewire:product :item="$item" wire:key="product-{{ $item->id }}">
            </div>
        @endforeach
    </div>

    @if ($hasMoreProducts)
        <div x-data="{
            observe() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            @this.loadMore()
                        }
                    })
                }, { threshold: 0.5 })
        
                observer.observe(this.$el)
            }
        }" x-init="observe" class="w-full flex items-center justify-center my-12">
            <!-- Enhanced Loading Spinner -->
            <div wire:loading wire:target="loadMore" class="relative">
                <div class="animate-spin rounded-full h-12 w-12 border-4 border-gray-200 border-t-gray-900"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="h-6 w-6 rounded-full bg-gray-900/10 animate-pulse"></div>
                </div>
            </div>
        </div>
    @else
        <div class="w-full my-12">
            <!-- Elegant End Message -->
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500 font-medium">
                        {{ session('lang') == 'en' ? 'You\'ve reached the end' : 'لقد وصلت إلى النهاية' }}
                    </span>
                </div>
            </div>
        </div>
    @endif

    <!-- Quick View Modal -->
    <livewire:quick-view-product />
</div>
