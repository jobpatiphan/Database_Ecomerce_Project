<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Update Address') }}</h2>
    </header>
    
    <form method="post" action="{{ route('address.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <!-- Current Address Display -->
        <div class="mb-4">
            <h3 class="text-md font-medium text-gray-800">Current Address:</h3>
            <p>{{ $user->address->street ?? 'N/A' }}</p>
            <p>{{ $user->address->city ?? 'N/A' }}</p>
            <p>{{ $user->address->state ?? 'N/A' }}</p>
            <p>{{ $user->address->postal_code ?? 'N/A' }}</p>
            <p>{{ $user->address->country ?? 'N/A' }}</p>
        </div>

        <!-- Street Address -->
        <div>
            <x-input-label for="street" :value="__('New Street Address')" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street', '')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>

        <!-- City and State/Province Fields -->
        <div class="grid grid-cols-2 gap-6">
            <div>
                <x-input-label for="city" :value="__('New City')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', '')" required />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>

            <div>
                <x-input-label for="state" :value="__('New State/Province')" />
                <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', '')" required />
                <x-input-error class="mt-2" :messages="$errors->get('state')" />
            </div>
        </div>

        <!-- Postal Code and Country Fields -->
        <div class="grid grid-cols-2 gap-6">
            <div>
                <x-input-label for="postal_code" :value="__('New Postal Code')" />
                <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full" :value="old('postal_code', '')" required />
                <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
            </div>

            <div>
                <x-input-label for="country" :value="__('New Country')" />
                <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', '')" required />
                <x-input-error class="mt-2" :messages="$errors->get('country')" />
            </div>
        </div>

        <!-- Save Button -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'address-updated')
                <p x-data="{ show: true }" x-show="show" x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-gray-600 dark:text-gray-400">{{ __('Address updated.') }}</p>
            @endif
        </div>
    </form>
</section>
