

<!-- resources/views/layouts/header.blade.php -->
<header class="bg-white shadow-md py-6 px-6 flex items-center fixed top-0 left-64 right-0 z-10">
    <img src="{{ asset('images/salutt.jpg') }}" alt="Salutation" class="w-10 h-10 mr-3">
    <span class="text-lg font-semibold">Bienvenue, Admin</span>
    <form action="{{ route('logout') }}" method="POST" class="ml-auto">
        @csrf
        <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 flex items-center space-x-2">
            <img src="{{ asset('images/logout.png') }}" alt="Logout Icon" class="w-6 h-6">
            <span>Log Out</span>
        </button>
    </form>
</header>
