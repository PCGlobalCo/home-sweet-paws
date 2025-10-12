<div class="min-h-screen bg-[#EED9C4] py-20 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Main container with responsive grid -->
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">

            <!-- Image Section with creative overlay -->
            <div class="relative group overflow-hidden">
                <!-- Decorative frame -->
                <div
                    class="absolute inset-0 border-2 border-black transform translate-x-4 translate-y-4 -z-10 transition-transform group-hover:translate-x-6 group-hover:translate-y-6">
                </div>

                <!-- Main image container -->
                <div class="relative overflow-hidden bg-black">
                    <img class="w-full h-[500px] lg:h-[600px] object-cover opacity-90 transition-all duration-500 group-hover:scale-105 group-hover:opacity-100"
                        src="{{ asset('media/images/brands/brandStory.jpg') }}" alt="Riham - Home Stylist">

                    <!-- Subtle gradient overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                </div>

                <!-- Floating accent element -->
                <div class="absolute -top-6 -right-6 w-24 h-24 bg-white border-2 border-black rotate-45"></div>
            </div>

            <!-- Text Section with enhanced typography -->
            <div class="relative">
                <!-- Decorative quote mark -->
                <div class="absolute -top-8 -left-4 text-8xl font-serif text-black/10">"</div>

                <!-- Name heading with custom styling -->
                <div class="mb-8">
                    <h2 class="text-5xl lg:text-6xl font-bold tracking-tight">
                        <span class="block text-black">I'm</span>
                        <span class="block text-black relative">
                            Riham
                            <div
                                class="absolute bottom-0 left-0 w-full h-1 bg-black transform scale-x-0 transition-transform duration-500 origin-left hover:scale-x-100">
                            </div>
                        </span>
                    </h2>
                    <p class="mt-3 text-lg font-medium tracking-widest uppercase text-black/60">
                        Home Stylist & Space Curator
                    </p>
                </div>

                <!-- Story text with enhanced readability -->
                <div class="space-y-4">
                    <p class="text-lg leading-relaxed text-black/80 font-light">
                        I'm Riham, a passionate home stylist with an eye for turning everyday spaces into beautiful and
                        soulful
                        retreats. My journey began with an instinct to decorate and style everything around me, and over
                        time, that
                        passion grew into a business I'm proud of.
                    </p>
                    <p class="text-lg leading-relaxed text-black/80 font-light">
                        My approach is far from the ordinary — I believe every home
                        should reflect the spirit of the people living in it. The moment I step into a space, I can
                        envision how to
                        make it feel warmer, cozier, and perfectly you.
                    </p>
                </div>

                <!-- Call to action or decorative element -->
                <div class="mt-10 flex items-center space-x-6">
                    <div class="flex-1 h-px bg-black/20"></div>
                    <div class="flex space-x-2">
                        <div class="w-2 h-2 bg-black rounded-full"></div>
                        <div class="w-2 h-2 bg-black/60 rounded-full"></div>
                        <div class="w-2 h-2 bg-black/30 rounded-full"></div>
                    </div>
                    <div class="flex-1 h-px bg-black/20"></div>
                </div>

                <!-- Optional button or link -->
                <div class="mt-10">
                    <a href="/shop"
                        class="inline-flex items-center px-8 py-4 border-2 border-black text-black font-medium tracking-wide hover:bg-black hover:text-white transition-all duration-300 group">
                        <span>Discover My Work</span>
                        <svg class="ml-3 w-5 h-5 transform group-hover:translate-x-1 transition-transform"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional decorative elements -->
        <div class="mt-20 grid grid-cols-3 gap-8 text-center">
            <div class="group cursor-pointer">
                <div class="text-4xl font-bold text-black group-hover:scale-110 transition-transform">10+</div>
                <div class="mt-2 text-sm uppercase tracking-widest text-black/60">Years Experience</div>
            </div>
            <div class="group cursor-pointer">
                <div class="text-4xl font-bold text-black group-hover:scale-110 transition-transform">500+</div>
                <div class="mt-2 text-sm uppercase tracking-widest text-black/60">Spaces Transformed</div>
            </div>
            <div class="group cursor-pointer">
                <div class="text-4xl font-bold text-black group-hover:scale-110 transition-transform">100%</div>
                <div class="mt-2 text-sm uppercase tracking-widest text-black/60">Passion Driven</div>
            </div>
        </div>
    </div>
</div>
