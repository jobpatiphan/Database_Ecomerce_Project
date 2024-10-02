<section>
    <header>
        <h1 class="text-2xl font-bold mb-6">My Profile</h1>
    </header>

    <div class="mt-6">
        <x-input-label for="current_photo" :value="__('Current Profile Photo')" />
        <div class="flex items-center justify-center mt-1">
            @if(Auth::user()->profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="w-32 h-32 object-cover rounded-full">
            @else
                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('No profile photo uploaded.') }}</p>
            @endif
        </div>
    </div>

    <!-- Button to show the photo change form with a camera icon -->
    <div class="mt-4 text-center">
        <button
            x-data=""
            @click.prevent="document.getElementById('photo-change-form').classList.toggle('hidden')"
            class="bg-white text-black border border-gray-300 px-4 py-2 rounded-lg hover:bg-gray-100 inline-flex items-center space-x-2"
        >
            <!-- Camera Icon (using Heroicons) -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l1.5-2a2 2 0 011.75-1h11.5a2 2 0 011.75 1L21 8M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8M5 8h14m-4 4a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span>{{ __('Change Photo') }}</span>
        </button>
    </div>

    <!-- Hidden form to change the photo -->
    <form id="photo-change-form" method="post" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6 hidden">
        @csrf

        <div>
            <x-input-label for="profile_photo" :value="__('New Profile Photo')" />
            <input type="file" name="profile_photo" id="profile_photo" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-photo-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
