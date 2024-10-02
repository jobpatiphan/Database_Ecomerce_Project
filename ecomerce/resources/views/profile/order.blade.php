<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col sm:flex-row sm:space-x-6">
            <!-- Sidebar -->
            <div class="w-full sm:w-1/4 bg-white shadow-lg rounded-lg p-6">
                <div class="text-center">
                    <div class="rounded-full mx-auto mb-4" alt="User Image">
                        @include('profile.partials.update-profile-photo-form')
                    </div>
                    <h3 class="text-lg font-bold">{{ Auth::user()->name }}</h3>
                    
                    <p class="text-gray-600">Hello 👋</p>
                </div>
                <nav class="mt-8">
                    <ul class="space-y-4">
                        <li>
                            <a href="{{route('profile.edit')}}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">Personal Information</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile.order')}}" class="flex items-center p-2 bg-black text-white rounded-lg">
                                <span class="ml-3">My Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">My Wishlists</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded-lg">
                                <span class="ml-3">Manage Addresses</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="w-full sm:w-3/4 bg-white shadow-lg rounded-lg p-6">
            @include('profile.partials.update-order-form')  
            </div>
        </div>
        </div>
        
    
</x-app-layout>
