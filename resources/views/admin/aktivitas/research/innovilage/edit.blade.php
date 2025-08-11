<x-app-layout>
    <div>
        <div class="flex justify-between">
            <div class="">
                <h1 class="text-2xl font-semibold">Edit Innovillage</h1>
                <p class="text-sm font-medium">Isi Konten untuk edit Innovillage :</p>
            </div>
            <a
                href="{{ route("admin.innovilage.index") }}"
                class="hidden font-medium md:block">
                <svg
                    class="inline h-6 w-6"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="3"
                    stroke-linecap="round"
                    stroke-linejoin="round">
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

        <form action="{{ route('admin.innovilage.update', $innovilage) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="deleted_photos" id="deleted_photos" value="">
            <input type="hidden" name="deleted_teams" id="deleted_teams" value="">

            <div class="mt-3 flex flex-wrap md:flex-nowrap md:space-x-10">
                <div class="basis-full md:basis-7/12">
                    <div class="mb-6">
                        <label
                            for="title-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Judul Innovillage
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title-input"
                            value="{{ old('title', $innovilage->title) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="description-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Deskripsi Innovillage
                        </label>
                        <textarea
                            name="description"
                            id="description-input"
                            rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">{{ old('description', $innovilage->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label
                            for="year-input"
                            class="mb-2 block text-sm font-medium text-gray-900">
                            Tahun Innovillage
                        </label>
                        <input
                            type="number"
                            name="year"
                            id="year-input"
                            value="{{ old('year', $innovilage->year) }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 lg:w-2/4" />
                        @error('year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Tim Innovillage
                        </label>
                        <div id="team-container" class="grid grid-cols-12 gap-x-5 md:grid-cols-12">
                            @foreach($innovilage->teams as $index => $team)
                            <div class="col-span-6" id="team_{{ $team->id }}">
                                <div class="flex items-center gap-x-2">
                                    <div class="mt-1 flex w-full basis-6/12 items-center justify-start md:basis-3/12 md:justify-center">
                                        <label class="relative flex h-20 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-gray-300 bg-gray-50 md:w-full">
                                            <img src="{{ Storage::url($team->photo) }}" alt="" class="absolute h-full w-full rounded-lg object-cover">
                                            <button type="button" onclick="deleteTeam({{ $team->id }})" class="absolute -right-2 -top-2 z-10 rounded-full bg-red-500 p-1 text-white hover:bg-red-600">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </label>
                                    </div>
                                    <p class="basis-auto font-medium">Tim {{ $index + 1 }}</p>
                                </div>
                                <div class="mb-6 mt-2">
                                    <input type="text" value="{{ $team->name }}" disabled class="block w-full rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-900">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <button
                            type="button"
                            onclick="addTeamMember()"
                            class="my-5 block w-full rounded-lg bg-[#0FA6567A] px-5 py-1 text-base font-medium focus:outline-none md:w-4/12">
                            Tambah Tim
                        </button>
                    </div>
                </div>
                <div class="basis-full md:basis-5/12">
                    <div class="mb-6">
                        <label for="" class="mb-2 block text-sm font-medium text-gray-900">
                            Dokumentasi Innovilage
                        </label>
                        <div class="rounded-lg bg-blue1 p-4">
                            <div class="min-h-48">
                                @if(count($innovilage->photos) > 0)
                                <div id="existing-photos" class="mb-4">
                                    <div class="grid grid-cols-2 gap-2 md:grid-cols-3">
                                        @foreach($innovilage->photos as $photo)
                                        <div class="relative" id="photo_{{ $photo->id }}">
                                            <img src="{{ Storage::url($photo->photo) }}" alt="" class="h-32 w-full rounded-lg object-cover">
                                            <button type="button" onclick="deletePhoto({{ $photo->id }})" class="absolute -right-2 -top-2 rounded-full bg-red-500 p-1 text-white hover:bg-red-600">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div id="photos-preview" class="h-48 hidden">
                                    <img id="main-photo-preview" src="" alt="Preview" class="h-full w-full rounded-sm object-cover">
                                </div>
                                <div id="photos-grid" class="mt-2 grid grid-cols-5 gap-1">
                                </div>
                                <div id="photos-placeholder" class="grid min-h-48 place-items-center {{ count($innovilage->photos) > 0 ? 'hidden' : '' }}">
                                    <p class="text-base text-gray-500">Max 4 Foto</p>
                                </div>
                            </div>
                            <div class="mt-5 w-full text-end">
                                <label
                                    for="photos"
                                    class="me-2 cursor-pointer rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Tambah
                                    <input
                                        type="file"
                                        name="photos[]"
                                        id="photos"
                                        multiple
                                        accept="image/*"
                                        class="hidden"
                                        onchange="previewPhotos(this)" />
                                </label>
                                <button
                                    type="button"
                                    onclick="resetPhotos()"
                                    class="rounded-xl border border-gray-800 px-3 py-0.5 text-sm font-medium text-gray-900 focus:outline-none">
                                    Reset
                                </button>
                            </div>
                        </div>
                        @error('photos')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('photos.*')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <button
                type="submit"
                class="rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300">
                Update Innovillage
            </button>
        </form>
    </div>

    @push('scripts')
    <script>
        let teamCount = {{ count($innovilage->teams) }};
        let deletedPhotos = [];
        let deletedTeams = [];

        function addTeamMember() {
            const container = document.getElementById('team-container');
            const teamMemberHtml = `
                <div class="col-span-6">
                    <div class="flex items-center gap-x-2">
                        <div class="mt-1 flex w-full basis-6/12 items-center justify-start md:basis-3/12 md:justify-center">
                            <label for="team_photos_${teamCount}" class="relative flex h-20 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-gray-300 bg-gray-50 md:w-full">
                                <img id="preview_team_${teamCount}" src="" alt="" class="absolute h-full w-full rounded-lg object-cover hidden">
                                <div class="z-10 flex flex-col items-center justify-center text-gray-500">
                                    <svg class="h-8 w-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                                    </svg>
                                </div>
                                <input type="file" name="team_photos[]" id="team_photos_${teamCount}" class="hidden" onchange="previewTeamPhoto(this, ${teamCount})">
                            </label>
                        </div>
                        <p class="basis-auto font-medium">Tim ${teamCount + 1}</p>
                    </div>
                    <div class="mb-6 mt-2">
                        <input type="text" name="team_names[]" id="team_names_${teamCount}" placeholder="Nama" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', teamMemberHtml);
            teamCount++;
        }

        function previewTeamPhoto(input, index) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                const preview = document.getElementById(`preview_team_${index}`);
                const plusIcon = input.parentElement.querySelector('svg').parentElement;
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    plusIcon.classList.add('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function deleteTeam(teamId) {
            const teamElement = document.getElementById(`team_${teamId}`);
            if (teamElement) {
                teamElement.remove();
                deletedTeams.push(teamId);
                document.getElementById('deleted_teams').value = deletedTeams.join(',');
            }
        }

        function deletePhoto(photoId) {
            const photoElement = document.getElementById(`photo_${photoId}`);
            if (photoElement) {
                photoElement.remove();
                deletedPhotos.push(photoId);
                document.getElementById('deleted_photos').value = deletedPhotos.join(',');
                
                if (document.getElementById('existing-photos').children[0].children.length === 0) {
                    document.getElementById('photos-placeholder').classList.remove('hidden');
                }
            }
        }

        function previewPhotos(input) {
            const preview = document.getElementById('photos-preview');
            const grid = document.getElementById('photos-grid');
            const placeholder = document.getElementById('photos-placeholder');
            const mainPreview = document.getElementById('main-photo-preview');
            
            if (input.files && input.files.length > 0) {
                preview.classList.remove('hidden');
                placeholder.classList.add('hidden');
                grid.innerHTML = '';
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    mainPreview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
                
                Array.from(input.files).forEach((file, index) => {
                    if (index === 0) return; // Skip first file as it's shown in main preview
                    
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const div = document.createElement('div');
                        div.className = 'col-span-1 h-12';
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="h-full w-full rounded-sm object-cover">
                        `;
                        grid.appendChild(div);
                    }
                    reader.readAsDataURL(file);
                });
            }
        }

        function resetPhotos() {
            const input = document.getElementById('photos');
            const preview = document.getElementById('photos-preview');
            const grid = document.getElementById('photos-grid');
            
            input.value = '';
            preview.classList.add('hidden');
            grid.innerHTML = '';
        }
    </script>
    @endpush
</x-app-layout>