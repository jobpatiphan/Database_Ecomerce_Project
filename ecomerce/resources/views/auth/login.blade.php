<x-guest-layout>
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left side with sneaker image -->
        <div class="w-1/2">
            <img src="/webpic/logginshoe.png" alt="Laravel Logo" class="object-cover w-full h-full">
        </div>
        <!-- Right side with login form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8 ">
            <div class="w-full max-w-md ">
                <!-- Welcome text -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-white mb-2">Welcome 👋</h2>
                    <p class="text-gray-400">Please login here</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-400">Email Address</label>
                        <input id="email" name="email" type="email" autocomplete="email" required 
                               class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="robertfox@example.com">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-400">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required 
                               class="mt-1 block w-full px-3 py-2 bg-gray-800 border border-gray-700 rounded-md text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="••••••••••••••">
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" 
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-700 rounded bg-gray-800">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-400">Remember Me</label>
                        </div>
                        <div class="text-sm">
                            <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:text-blue-400">Signup</a>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
