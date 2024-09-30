<section>
    <header>
        
    </header>

    <form method="post" action="{{ route('profile.photo.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6 ">
        @csrf
        <div class="mt-6 ">
        <x-input-label for="current_photo" :value="__('Current Profile Photo')" />
            <div class="flex items-center justify-center mt-1 ">
                @if(Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Profile Photo" class="w-32 h-32 object-cover rounded-full">
                @else
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('No profile photo uploaded.') }}</p>
                @endif
            </div>
        </div>


        <div>
            <x-input-label for="profile_photo" :value="__('Profile Photo')" />
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
