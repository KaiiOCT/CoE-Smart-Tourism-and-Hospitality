<x-guest-layout>
    <div>
        <header>
            @include('public.components.navbar')
          <div class="relative h-[30vh] w-full bg-[#2593CF] md:h-[45vh]">
            <div
              class="absolute left-[50%] top-[50%] h-[181px] w-11/12 -translate-x-[50%] md:top-[35%] md:h-[400px] md:w-5/6"
            >
              <div
                class="relative flex h-full w-full flex-col justify-center overflow-hidden rounded-[30px] text-white md:rounded-[50px]"
              >
                <img
                  src="{{ asset("assets/images/aboutUs/ImgSejarah.png") }}"
                  alt="img"
                  class="absolute -z-10 h-full w-full object-cover"
                />

                <!-- Overlay hitam transparan -->
                <div class="absolute inset-0 bg-black opacity-50"></div>

                <div class="relative z-10">
                  <h1 class="text-center text-xl font-semibold md:text-5xl">
                    Profil Anggota
                  </h1>
                  <p class="text-center text-base md:text-3xl">
                    Center of Excellent Smart Tourism & Hospitality
                  </p>
                </div>
              </div>
            </div>
          </div>
        </header>
        <main class="flex flex-col items-center bg-[#EEEEEE]">
          <div class="mt-28 w-11/12 md:mt-[252px] md:w-5/6">
            @foreach ($members as $member)
              <div
                class="{{ $memberId == $member->id ? "border-2 border-orange1" : "" }} mb-5 items-center rounded-3xl border-solid bg-white p-5 md:flex md:p-10"
              >
                <div class="flex justify-center">
                  <img
                    src="{{ $member->photo_url }}"
                    alt="{{ $member->name }}"
                    width="200px"
                    height="200px"
                    class="rounded-full bg-gray-50"
                  />
                </div>
                <div class="text-sm md:ps-8">
                  <p class="mt-5">
                    Nama :
                    <span class="font-bold">{{ $member->name }}</span>
                  </p>
                  <p class="mt-5">
                    Program Studi Asal :
                    <span class="font-bold">{{ $member->study_program }}</span>
                  </p>
                  <p class="mt-5">
                    Pendidikan Terakir :
                    <span class="font-bold">{{ $member->education }}</span>
                  </p>
                  <p class="mt-5">
                    Bidang Penelitian :
                    <span class="font-bold">{{ $member->research_field }}</span>
                  </p>
                  <div class="mt-3 flex">
                    @if ($member->email)
                      <a
                        href="mailto:{{ $member->email }}"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <img
                          src="{{ asset("assets/icons/gmail.png") }}"
                          alt="email Icon"
                          class="icon-size"
                          width="35px"
                        />
                      </a>
                    @endif

                    @if ($member->instagram)
                      <a
                        href="https://www.instagram.com/{{ $member->instagram }}"
                        class="ms-2"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <img
                          src="{{ asset("assets/icons/instagram.png") }}"
                          alt="Instagram Icon"
                          class="icon-size"
                          width="35px"
                        />
                      </a>
                    @endif

                    @if ($member->linkedin)
                      <a
                        href="https://www.linkedin.com/in/{{ $member->linkedin }}"
                        class="ms-2"
                        target="_blank"
                        rel="noopener noreferrer"
                      >
                        <img
                          src="{{ asset("assets/icons/linkedin.png") }}"
                          alt="LinkedIn Icon"
                          class="icon-size"
                          width="35px"
                        />
                      </a>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $members->links() }}
        </main>
        <!-- JavaScript -->
        <script src="{{ asset("assets/js/navbar.js") }}"></script>
      </div>
</x-guest-layout>
