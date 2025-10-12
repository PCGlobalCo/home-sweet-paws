<div class="w-full max-w-7xl mx-auto px-4 py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($services as $service)
            <div class="group bg-transparent border border-gray-200 rounded-2xl p-6 hover:shadow-xl hover:shadow-black/5 hover:border-black/10 transition-all duration-300 cursor-pointer">
                <!-- Service Image -->
                <div class="flex justify-center mb-6">
                    <div class="relative overflow-hidden rounded-full w-32 h-32 sm:w-28 sm:h-28 md:w-60 md:h-60">
                        <img 
                            src="{{ $service['image'] }}" 
                            alt="{{ $service['name'] }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                        >
                    </div>
                </div>

                <!-- Service Name -->
                <div class="text-center mb-4">
                    <h3 class="text-lg sm:text-xl font-semibold text-black group-hover:text-gray-800 transition-colors duration-300">
                        {{ $service['name'] }}
                    </h3>
                </div>

                <!-- Service Price -->
                <div class="text-center">
                    <span class="inline-flex items-center px-4 py-2 rounded-full bg-black text-white text-sm sm:text-base font-medium group-hover:bg-gray-800 transition-colors duration-300">
                        {{ $service['price'] }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>