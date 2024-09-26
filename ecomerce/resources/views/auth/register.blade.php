<x-guest-layout>
    <div class="flex min-h-screen bg-gray-900">
        <div class="w-1/2">
            <img src="https://s3-alpha-sig.figma.com/img/0efe/026e/353e7537818d5e90550d66bf1843347d?Expires=1728259200&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Xn5-J2h-5GpzLCJPYvl7X25p6NLZiBqPPyJP3RuyujJVbjAzP~GTTL483Q5ziwnhKpfcZz3dqpTzvJWMmtMC1xHNuMgiqaccuI6538qMI-OXNEOe~R77MmjBhDiH9LNxvGVRYOtFQKVf~F4bUpimT4P0gos9p8bk7FFoVL~PrZ5sOzxobHBrFw2F9w0mMn-Kxjz6CVCCEwvTEIJqUTcyKaXFPTw~T9qPurJ9wDMdKGH2xVU8pa398~zyfIKV8QM5N4wGJhy4EZhBRdvtrNjrM8278em694l~1MxJ5sFKOGfzpCoKnpbndsIqjk-Y8KZ4YYIgRxYpMJQS3~EWe6eqYQ__" alt="Laravel Logo" class="object-cover w-full h-full">
        </div>
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 ">
            <div class="w-full max-w-md ">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white mb-2">Create New Account 👋</h2>
                    <p class="text-gray-400">Register here</p>
                </div>
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
</div>
</div>
</x-guest-layout>
