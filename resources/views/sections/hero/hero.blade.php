<div class=" text-white min-h-screen flex flex-col items-center container mx-auto flex max-w-6xl flex-col items-center justify-center pt-10">

    <div class="text-center max-w-4xl mx-auto mb-12">
        <h1 class="text-6xl md:text-8xl font-bold tracking-tight mb-6">
            Where Ideas Ignite.
        </h1>
        <p class="text-xl md:text-2xl text-gray-400 mb-10">
            Modern tools for everyone
        </p>

      <a href="{{ route('filament.member.auth.login') }}" class="inline-block">
    <button class="bg-[#6333FF] hover:bg-[#5228D9] text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300">
        Get Started Now!
    </button>
</a>
    </div>

    <div class="w-full py-10 mx-auto">
        <div class="relative bg-[#9966FF] rounded-[40px] w-full min-h-[650px] shadow-2xl overflow-hidden">

            <div class="absolute top-8 left-8 z-10 w-[280px] md:w-[500px] opacity-90">
                <div class="rounded-xl border border-white/30 bg-white/10 backdrop-blur-md shadow-lg overflow-hidden">

                    <!-- HEADER -->
                    <div class="px-5 py-4 text-sm font-bold text-black/75 uppercase tracking-wide bg-white text-center">
                        Tools
                    </div>

                    <!-- TABLE -->
                    <table class="w-full text-sm text-black">
                        <thead>
                            <tr class="text-left text-xs font-medium text-black bg-white/90">
                                <th class="px-5 py-3 w-10">No</th>
                                <th class="px-5 py-3">Name</th>
                                <th class="px-5 py-3">Status</th>
                            </tr>
                        </thead>

                        <tbody class="text-sm" id="toolsTableBody">
                            <!-- Rows will be dynamically updated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="absolute top-8 right-8 z-10 w-[200px] md:w-[450px] opacity-90">
                <img src="{{ asset('images/notification.svg') }}" alt="Notification" class="w-full h-auto">
            </div>

            <div class="absolute inset-0 flex items-end justify-center z-30 pointer-events-none">
                <div class="relative flex items-end justify-center w-full max-w-6xl gap-4">
                    <!-- Cat Image with animation -->
                    <img id="catImage" src="{{ asset('images/cat.svg') }}" alt="Cat"
                         class="w-[25rem] md:w-[30rem] h-auto transform translate-y-4 z-40 transition-opacity duration-500">

                    <!-- Dino Image with animation -->
                    <img id="dinoImage" src="{{ asset('images/dino.svg') }}" alt="Dino"
                         class="w-[25rem] md:w-[30rem] h-auto transform translate-y-4 z-30 transition-opacity duration-500">
                </div>
            </div>

            <div class="absolute bottom-8 left-8 z-50">
                <div class="bg-white rounded-xl border-4 border-black px-6 py-4 flex items-center gap-10 shadow-lg min-w-[300px] md:min-w-[400px]">
                    <span class="font-bold text-gray-800 whitespace-nowrap">67 Hours Remaining</span>
                    <span class="text-gray-800 font-medium">0%</span>
                    <span class="font-bold text-gray-800 whitespace-nowrap">Rent Time</span>
                </div>
            </div>


            <div class="absolute bottom-8 right-8 z-50 flex flex-col items-end" id="svgStack">

            </div>
        </div>
    </div>
    <div class="w-full max-w-6xl mx-auto py-24 px-4">
    <div class="relative border border-white/30 rounded-[30px] p-10 md:p-16 flex flex-col md:flex-row items-center justify-between overflow-visible">

        <div class="max-w-xl">
            <h2 class="text-5xl font-bold mb-6">
                <span class="relative inline-block">
                    Join Us!

                </span>
            </h2>
            <p class="text-gray-400 text-lg leading-relaxed">
                Web peminjaman yang paling sigma di antara yang tersigma lainya , dengan mewing yang sangat ohio , dapatkan penawaran sekarang!
            </p>
        </div>

        <div class="hidden md:block relative w-[200px] md:w-[367px] h-[120px] md:h-[150px]">
            <img
                src="{{ asset('images/sit-cat.png') }}"
                alt="Sitting Cat"
                class="absolute bottom-0 right-0 w-full h-auto translate-y-63"
            >
        </div>

    </div>
</div>
<div class="w-full max-w-6xl mx-auto py-24 px-4">


   <div class="w-full max-w-6xl mx-auto py-24 px-4">

    <!-- Container dengan positioning relative untuk bento grid melengkung -->
    <div class="relative min-h-[650px] md:min-h-[750px]">

        <!-- Bento Grid - 4 Steps dengan posisi absolute membentuk setengah lingkaran (kubah) -->
         <!-- How It Works Section -->
    <div class="w-full max-w-6xl mx-auto py-16 md:py-24 px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-tight mb-4">
                Simple & Fast.
            </h2>
            <p class="text-lg md:text-xl text-gray-400 max-w-2xl mx-auto">
                Empat langkah mudah menuju pengalaman meminjam yang paling mewing.
            </p>
        </div>

        <!-- Mobile Layout - Stacked Cards -->
        <div class="block md:hidden space-y-4 mb-6">
            <!-- Step 1 -->
            <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-5">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center shadow-lg shadow-[#6333FF]/20 flex-shrink-0">
                        <span class="text-lg font-bold text-white">1</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-bold mb-1.5">Browse Tools</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">
                            Jelajahi katalog alat kami yang lengkap. Dari power tools hingga gadget kreatif.
                        </p>
                        <div class="mt-3 flex items-center gap-2 text-[#9966FF] text-xs font-medium">
                            <span>Find your gear</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-5">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center shadow-lg shadow-[#6333FF]/20 flex-shrink-0">
                        <span class="text-lg font-bold text-white">2</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-bold mb-1.5">Book Instantly</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">
                            Pilih tanggal dan durasi sewa. Sistem real-time tanpa konflik jadwal.
                        </p>
                        <div class="mt-3 flex items-center gap-2 text-[#9966FF] text-xs font-medium">
                            <span>Secure your slot</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-5">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center shadow-lg shadow-[#6333FF]/20 flex-shrink-0">
                        <span class="text-lg font-bold text-white">3</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-bold mb-1.5">Pick Up & Use</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">
                            Ambil alatmu di lokasi kami atau pilih delivery. Tools berkualitas premium.
                        </p>
                        <div class="mt-3 flex items-center gap-2 text-[#9966FF] text-xs font-medium">
                            <span>Get started</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-5">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center shadow-lg shadow-[#6333FF]/20 flex-shrink-0">
                        <span class="text-lg font-bold text-white">4</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-base font-bold mb-1.5">Easy Return</h3>
                        <p class="text-gray-400 text-xs leading-relaxed">
                            Kembalikan tepat waktu atau perpanjang sewa. Clean, simple, no drama.
                        </p>
                        <div class="mt-3 flex items-center gap-2 text-[#9966FF] text-xs font-medium">
                            <span>Done & dusted</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Dino -->
            <div class="flex justify-center pt-6">
                <img
                    src="{{ asset('images/dino-cartoon.png') }}"
                    alt="Flying Dino"
                    class="w-[250px] h-auto animate-ombang"
                >
            </div>
        </div>

        <!-- Desktop Layout - Bento Grid Melengkung -->
        <div class="hidden md:block relative min-h-[650px] lg:min-h-[750px]">

            <div class="absolute inset-0">

                <!-- Step 1 -->
                <div class="absolute left-0 lg:left-[2%] top-[30%] lg:top-[35%] w-[250px] lg:w-[280px] z-20">
                    <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-6 lg:p-7 group hover:bg-white/10 transition-all duration-300 shadow-xl">
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-[#6333FF]/10 rounded-full blur-2xl group-hover:bg-[#6333FF]/20 transition-all"></div>
                        <div class="relative">
                            <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center mb-5 shadow-lg shadow-[#6333FF]/20">
                                <span class="text-xl lg:text-2xl font-bold text-white">1</span>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold mb-3">Browse Tools</h3>
                            <p class="text-gray-400 leading-relaxed text-xs lg:text-sm">
                                Jelajahi katalog alat kami yang lengkap. Dari power tools hingga gadget kreatif.
                            </p>
                            <div class="mt-5 flex items-center gap-2 text-[#9966FF] text-xs lg:text-sm font-medium">
                                <span>Find your gear</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="absolute left-[16%] lg:left-[18%] top-[0%] lg:top-[3%] w-[250px] lg:w-[280px] z-20">
                    <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-6 lg:p-7 group hover:bg-white/10 transition-all duration-300 shadow-xl">
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-[#6333FF]/10 rounded-full blur-2xl group-hover:bg-[#6333FF]/20 transition-all"></div>
                        <div class="relative">
                            <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center mb-5 shadow-lg shadow-[#6333FF]/20">
                                <span class="text-xl lg:text-2xl font-bold text-white">2</span>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold mb-3">Book Instantly</h3>
                            <p class="text-gray-400 leading-relaxed text-xs lg:text-sm">
                                Pilih tanggal dan durasi sewa. Sistem real-time tanpa konflik jadwal.
                            </p>
                            <div class="mt-5 flex items-center gap-2 text-[#9966FF] text-xs lg:text-sm font-medium">
                                <span>Secure your slot</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="absolute right-[16%] lg:right-[18%] top-[0%] lg:top-[3%] w-[250px] lg:w-[280px] z-20">
                    <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-6 lg:p-7 group hover:bg-white/10 transition-all duration-300 shadow-xl">
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-[#6333FF]/10 rounded-full blur-2xl group-hover:bg-[#6333FF]/20 transition-all"></div>
                        <div class="relative">
                            <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center mb-5 shadow-lg shadow-[#6333FF]/20">
                                <span class="text-xl lg:text-2xl font-bold text-white">3</span>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold mb-3">Pick Up & Use</h3>
                            <p class="text-gray-400 leading-relaxed text-xs lg:text-sm">
                                Ambil alatmu di lokasi kami atau pilih delivery. Tools berkualitas premium.
                            </p>
                            <div class="mt-5 flex items-center gap-2 text-[#9966FF] text-xs lg:text-sm font-medium">
                                <span>Get started</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="absolute right-0 lg:right-[2%] top-[30%] lg:top-[35%] w-[250px] lg:w-[280px] z-20">
                    <div class="relative overflow-hidden rounded-[30px] border border-white/30 bg-white/5 backdrop-blur-sm p-6 lg:p-7 group hover:bg-white/10 transition-all duration-300 shadow-xl">
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-[#6333FF]/10 rounded-full blur-2xl group-hover:bg-[#6333FF]/20 transition-all"></div>
                        <div class="relative">
                            <div class="w-12 h-12 lg:w-14 lg:h-14 rounded-2xl bg-gradient-to-br from-[#6333FF] to-[#9966FF] flex items-center justify-center mb-5 shadow-lg shadow-[#6333FF]/20">
                                <span class="text-xl lg:text-2xl font-bold text-white">4</span>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold mb-3">Easy Return</h3>
                            <p class="text-gray-400 leading-relaxed text-xs lg:text-sm">
                                Kembalikan tepat waktu atau perpanjang sewa. Clean, simple, no drama.
                            </p>
                            <div class="mt-5 flex items-center gap-2 text-[#9966FF] text-xs lg:text-sm font-medium">
                                <span>Done & dusted</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Desktop Dino -->
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 z-10">
                <img
                    src="{{ asset('images/dino-cartoon.png') }}"
                    alt="Flying Dino"
                    class="w-[380px] lg:w-[600px] h-auto animate-ombang"
                >
            </div>

            <!-- Garis lengkung dekoratif -->
            <svg class="absolute top-[8%] left-1/2 transform -translate-x-1/2 w-[90%] h-[300px] z-0 opacity-20 pointer-events-none" viewBox="0 0 900 200" preserveAspectRatio="none">
                <path d="M 0 180 Q 225 -30 450 -30 Q 675 -30 900 180" fill="none" stroke="#9966FF" stroke-width="2" stroke-dasharray="8 8" />
            </svg>
        </div>
    </div>

        <!-- Dino di tengah bawah dengan animasi ombang smooth -->


    </div>
    <div class="w-full max-w-6xl mx-auto pt-64 px-4">
    <div class="text-center">
        <h2 class="text-5xl md:text-7xl lg:text-9xl font-bold tracking-tight leading">
            Find Everything <br class="hidden md:block"> You Need.
        </h2>
        <p class="text-xl md:text-2xl text-gray-400 mt-4 mb-10">
            All the tools you need, right at your fingertips.
        </p>

        <a href="{{ route('filament.member.auth.login') }}"
   class="inline-block bg-[#6333FF] hover:bg-[#5228D9] text-white px-10 py-4 rounded-xl font-semibold text-lg transition-all duration-300 shadow-lg shadow-[#6333FF]/30 hover:shadow-xl hover:shadow-[#6333FF]/40 transform hover:-translate-y-1 cursor-pointer">
    Get Started!
</a>
    </div>
</div>

</div>

</div>
</div>
    @include('sections.hero.hero-style')
@include('sections.hero.hero-script')
