<x-guest-layout>
    <div>
        {{-- ==== HEADER ==== --}}
        @include('public.components.navbar')

        {{-- Hero Section --}}
        <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
            <div class="absolute left-1/2 top-1/2 h-[181px] w-11/12 -translate-x-1/2 md:top-[35%] md:h-[400px] md:w-5/6">
                <div class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] text-white md:rounded-[50px]">
                    <img src="{{ asset('/assets/images/activity/ImgInov.jpg') }}" alt="img" class="absolute -z-10 h-full w-full object-cover" />
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 text-center">
                        <h1 class="text-2xl font-bold md:text-5xl">Inovasi</h1>
                        <h2 class="font-extralight italic md:text-4xl">Center of Excellence Smart Tourism & Hospitality</h2>
                    </div>
                </div>
            </div>
        </div>

        {{-- ==== Container 1: Kegiatan Inovasi ==== --}}
        <section class="px-5 sm:px-8 lg:px-28 py-24 bg-[#F9F9F9] font-sans">
            <div class="max-w-5xl mx-auto">
                <div class="bg-white border border-gray-300 p-6 md:p-10 rounded-3xl shadow-xl text-gray-700 text-base sm:text-lg leading-relaxed text-justify transition-all duration-300 transform hover:scale-[1.02] hover:shadow-2xl">
                    <div class="flex justify-center mb-6">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-20 w-20 object-contain" />
                    </div>
                    <h2 class="text-center text-2xl sm:text-3xl md:text-4xl font-bold text-black mb-6">
                        Kegiatan Inovasi 
                        <br>
                        CoE Smart Tourism & Hospitality
                    </h2>
                    <p>
                        Center of Excellence Smart Tourism & Hospitality (CoE STH) terus menunjukkan komitmennya dalam menghadirkan inovasi yang relevan dan berdampak di sektor pariwisata dan hospitality. Inovasi yang dikembangkan berlandaskan pada prinsip keberlanjutan dan berorientasi pada kebutuhan masyarakat serta perkembangan industri di era modern.
                    </p>
                    <p class="pt-4">
                        Dalam setiap inovasinya, CoE STH mengadopsi pendekatan yang integratif, menghubungkan pengetahuan akademik dengan praktik industri, serta mendorong kolaborasi aktif antara berbagai pemangku kepentingan.
                    </p>
                    <p class="pt-4">
                        Sebagai pusat unggulan dalam pariwisata dan hospitality, CoE STH percaya bahwa inovasi adalah kunci utama untuk menciptakan ekosistem pariwisata yang inklusif, dinamis, dan adaptif terhadap perubahan.
                    </p>
                </div>
            </div>
        </section>

        {{-- ==== Container 2: Hasil Inovasi ==== --}}
        <section class="px-5 sm:px-8 lg:px-28 pb-24 bg-[#F9F9F9] font-sans">
            <div class="max-w-5xl mx-auto">
                <div class="bg-white border border-gray-300 p-6 md:p-10 rounded-3xl shadow-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-2xl">
                    <div class="text-center mb-10">
                        <img src="{{ asset('assets/icons/idea.png') }}" alt="Icon Inovasi" class="mx-auto mb-6 h-20 w-20 object-contain" />
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black">
                            Beberapa Hasil Inovasi 
                            <br>
                            CoE Smart Tourism & Hospitality
                        </h2>
                    </div>
                    <p class="text-justify text-base sm:text-lg text-gray-700 mb-10 leading-relaxed">
                        Beberapa inovasi yang telah dihasilkan oleh kami merupakan hasil dari berbagai upaya penelitian mendalam, pengembangan teknologi mutakhir, serta penerapan solusi kreatif dalam berbagai bidang. Semua pencapaian tersebut mencerminkan komitmen kami untuk selalu berinovasi dan memberikan dampak nyata.
                    </p>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                        @foreach ($innovations as $innovation)
                            <div class="overflow-hidden rounded-xl border border-gray-300 bg-white shadow-md transition duration-300 hover:scale-105 hover:shadow-lg">
                                <div class="h-[189px]">
                                    <img src="{{ $innovation->first_photo->photo_url }}" alt="{{ $innovation->title }}" class="h-full w-full object-cover" />
                                </div>
                                <div class="px-5 py-3 text-center">
                                    <h5 class="text-lg font-semibold text-gray-800">{{ $innovation->title }}</h5>
                                    <p class="text-justify text-sm text-gray-600">{{ $innovation->description }}</p>
                                </div>
                                <div class="border-t border-gray-200 py-4 text-center">
                                    <a href="{{ route('innovation.show', ['id' => $innovation->id]) }}" class="text-black hover:underline font-medium">Selengkapnya</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($innovations->hasPages())
                        <div class="mt-10 flex justify-center">
                            {{ $innovations->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</x-guest-layout>
