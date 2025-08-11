<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Managemen Edit Anggota</h1>
                <p class="text-sm font-medium">Isi Konten untuk Edit Anggota :</p>
            </div>
            <a href="{{ route('admin.internal-member.index') }}" class="hidden font-medium md:block">
                <svg class="inline h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                    stroke-linecap="round" stroke-linejoin="round">
                    <line x1="20" y1="12" x2="5" y2="12" />
                    <polyline points="10 18 5 12 10 6" />
                </svg>
                Kembali
            </a>
        </div>

        @if(session('error'))
        <div class="mb-4 mt-6 rounded-lg bg-red-50 p-4 text-sm text-red-800" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('admin.internal-member.update', $member) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-6 gap-x-12 gap-y-5 md:grid-cols-12">
                <div class="col-span-full md:col-span-12">
                    <div class="mt-5 grid grid-cols-6 gap-x-5 md:grid-cols-12">
                        <div class="col-span-full md:col-span-3">
                            <label for="profile_picture" class="mb-2 block text-sm font-medium text-gray-900">
                                Foto Anggota
                            </label>
                            <div class="mt-1 flex w-full items-center justify-start md:justify-center">
                                <label for="profile_picture"
                                    class="relative flex h-40 w-2/3 cursor-pointer flex-col items-center justify-center rounded-lg bg-blue1 md:w-full">
                                    <img id="preview_image" src="{{ $member->photo_url }}" alt=""
                                        class="absolute h-full w-full rounded-lg object-cover" />
                                    <div id="upload_icon"
                                        class="z-10 flex flex-col items-center justify-center text-gray-900 {{ $member->profile_picture ? 'hidden' : '' }}">
                                        <svg class="h-8 w-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 12h14m-7 7V5" />
                                        </svg>
                                    </div>
                                    <input type="file" name="profile_picture" id="profile_picture" class="hidden" accept="image/*"
                                        onchange="previewImage(this)" />
                                </label>
                            </div>
                            @error('profile_picture')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-full md:col-span-12 md:grid md:grid-cols-2 md:gap-x-12 lg:mt-5">
                            <div class="mb-6">
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900">
                                    Nama Anggota
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="position" class="mb-2 block text-sm font-medium text-gray-900">
                                    Jabatan
                                </label>
                                <input type="text" name="position" id="position"
                                    value="{{ old('position', $member->position) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('position')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="study_program" class="mb-2 block text-sm font-medium text-gray-900">
                                    Program Studi
                                </label>
                                <input type="text" name="study_program" id="study_program"
                                    value="{{ old('study_program', $member->study_program) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('study_program')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="education" class="mb-2 block text-sm font-medium text-gray-900">
                                    Pendidikan Terakhir
                                </label>
                                <input type="text" name="education" id="education"
                                    value="{{ old('education', $member->education) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('education')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="research_field" class="mb-2 block text-sm font-medium text-gray-900">
                                    Bidang Penelitian
                                </label>
                                <input type="text" name="research_field" id="research_field"
                                    value="{{ old('research_field', $member->research_field) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('research_field')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="email" class="mb-2 block text-sm font-medium text-gray-900">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="instagram" class="mb-2 block text-sm font-medium text-gray-900">
                                    Instagram
                                </label>
                                <input type="text" name="instagram" id="instagram"
                                    value="{{ old('instagram', $member->instagram) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('instagram')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="linkedin" class="mb-2 block text-sm font-medium text-gray-900">
                                    Linkedin
                                </label>
                                <input type="text" name="linkedin" id="linkedin"
                                    value="{{ old('linkedin', $member->linkedin) }}"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                                @error('linkedin')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-6">
                                <label for="is_leader" class="mb-2 block text-sm font-medium text-gray-900">
                                    Status Keanggotaan
                                </label>
                                <select
                                    name="is_leader"
                                    id="is_leader"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ old('is_leader', $member->is_leader) ? 'selected' : '' }}>Leader</option>
                                    <option value="0" {{ old('is_leader', $member->is_leader) ? '' : 'selected' }}>Anggota</option>
                                </select>
                                @error('is_leader')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit"
                class="rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                Update Anggota
            </button>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview_image');
            const uploadIcon = document.getElementById('upload_icon');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    uploadIcon.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush
</x-app-layout>