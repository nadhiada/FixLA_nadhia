<nav class="bg-white shadow-lg sticky top-0 z-50 transition-all duration-300" id="navbar">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="FixLA Logo" class="h-10 w-auto" onerror="this.src='https://via.placeholder.com/40x40/3b82f6/ffffff?text=RC'">
                <span class="text-xl font-bold bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] bg-clip-text text-transparent">FixLA</span>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-[#3b82f6] transition duration-300 font-medium {{ request()->is('/') ? 'text-[#3b82f6] border-b-2 border-[#3b82f6]' : '' }}">Beranda</a>
                <a href="{{ url('/fitur') }}" class="text-gray-700 hover:text-[#3b82f6] transition duration-300 font-medium {{ request()->is('fitur') ? 'text-[#3b82f6] border-b-2 border-[#3b82f6]' : '' }}">Fitur</a>
                <a href="{{ url('/about') }}" class="text-gray-700 hover:text-[#3b82f6] transition duration-300 font-medium {{ request()->is('about') ? 'text-[#3b82f6] border-b-2 border-[#3b82f6]' : '' }}">Tentang</a>
                <a href="{{ url('/contact') }}" class="text-gray-700 hover:text-[#3b82f6] transition duration-300 font-medium {{ request()->is('contact') ? 'text-[#3b82f6] border-b-2 border-[#3b82f6]' : '' }}">Kontak</a>
            </div>
            
            <!-- Download Button -->
            <div class="flex space-x-3">
                <button class="bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] text-white px-5 py-2 rounded-lg hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-download mr-2"></i>Download
                </button>
                
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700 mobile-menu-button focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div class="hidden mobile-menu md:hidden bg-white border-t shadow-lg absolute left-0 right-0 z-50">
        <div class="px-4 py-3 space-y-2">
            <a href="{{ url('/') }}" class="block py-2 px-3 text-gray-700 hover:text-[#3b82f6] hover:bg-blue-50 rounded-lg transition duration-300 {{ request()->is('/') ? 'text-[#3b82f6] bg-blue-50' : '' }}">Beranda</a>
            <a href="{{ url('/fitur') }}" class="block py-2 px-3 text-gray-700 hover:text-[#3b82f6] hover:bg-blue-50 rounded-lg transition duration-300 {{ request()->is('fitur') ? 'text-[#3b82f6] bg-blue-50' : '' }}">Fitur</a>
            <a href="{{ url('/about') }}" class="block py-2 px-3 text-gray-700 hover:text-[#3b82f6] hover:bg-blue-50 rounded-lg transition duration-300 {{ request()->is('about') ? 'text-[#3b82f6] bg-blue-50' : '' }}">Tentang</a>
            <a href="{{ url('/contact') }}" class="block py-2 px-3 text-gray-700 hover:text-[#3b82f6] hover:bg-blue-50 rounded-lg transition duration-300 {{ request()->is('contact') ? 'text-[#3b82f6] bg-blue-50' : '' }}">Kontak</a>
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuBtn = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenu.classList.toggle('hidden');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        }
        
        // Navbar scroll effect - hide on scroll down, show on scroll up
        let lastScroll = 0;
        const navbar = document.getElementById('navbar');
        let ticking = false;
        
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    const currentScroll = window.pageYOffset;
                    
                    if (currentScroll > lastScroll && currentScroll > 100) {
                        // Scroll down - hide navbar
                        navbar.style.transform = 'translateY(-100%)';
                    } else {
                        // Scroll up - show navbar
                        navbar.style.transform = 'translateY(0)';
                    }
                    
                    lastScroll = currentScroll;
                    ticking = false;
                });
                ticking = true;
            }
        });
    });
</script>