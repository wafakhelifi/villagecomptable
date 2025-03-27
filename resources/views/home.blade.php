<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Comptable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Dropdown animations */
        #dashboardDropdown, #profileDropdown {
            transition: all 0.3s ease;
            transform-origin: top;
            transform: scaleY(0);
            opacity: 0;
            max-height: 0;
            display: none;
        }

        #dashboardDropdown.show, #profileDropdown.show {
            transform: scaleY(1);
            opacity: 1;
            max-height: 500px;
            display: block;
        }

        /* Arrow rotation */
        #dashboardDropdownBtn.active #dropdownArrow,
        #profileDropdownBtn.active #profileDropdownArrow {
            transform: rotate(180deg);
        }

        /* Dropdown options */
        #dashboardDropdown a, #profileDropdown a {
            transition: background-color 0.2s ease;
        }

        #dashboardDropdown a:hover, #profileDropdown a:hover {
            background-color: #f3f4f6;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg h-screen p-5 flex flex-col fixed">
        <div class="mb-6 flex items-center space-x-3">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" class="w-10 h-10">
            <span class="text-lg font-semibold">Village Comptable</span>
        </div>
        
        <div class="text-center mb-6">
            <img src="{{ asset('images/user.jpg') }}" alt="User" class="w-40 h-40 mx-auto rounded-full object-cover cursor-pointer" id="profileDropdownBtn">
            
            <!-- Profile Dropdown -->
            <div class="relative">
                <div class="flex flex-col items-center">
                    <span class="text-white bg-black px-2 py-1 rounded font-semibold mt-2 inline-block">ADMINISTRATEUR</span>
                    <button id="profileDropdownBtn" class="flex items-center justify-center space-x-1 mt-1">
                        <p class="text-gray-800 font-bold">Wafa Khelifi</p>
                        <svg class="w-4 h-4 transition-transform duration-200" id="profileDropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                
                <div id="profileDropdown" class="absolute left-0 right-0 mt-1 bg-white shadow-lg rounded-md z-20">
                    <a href="{{ route('profile.edit') }}" class=" px-4 py-2 hover:bg-gray-100 border-b border-gray-100 flex items-center space-x-2">
                        <img src="{{ asset('images/profile-icon.png') }}" alt="Profile" class="w-5 h-5">
                        <span>Profil</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left  px-4 py-2 hover:bg-gray-100 flex items-center space-x-2">
                            <img src="{{ asset('images/logout-icon.png') }}" alt="Logout" class="w-5 h-5">
                            <span>Déconnexion</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <nav class="space-y-2 flex-1 overflow-y-auto">
            <!-- Dashboard Dropdown -->
            <div class="relative">
                <button id="dashboardDropdownBtn" class="w-full flex items-center justify-between space-x-3 py-2 px-4 hover:bg-gray-200 rounded transition-all">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/dash.png') }}" alt="Dashboards" class="w-6 h-6">
                        <span>Dashboards</span>
                    </div>
                    <svg class="w-4 h-4 transition-transform duration-200" id="dropdownArrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <div id="dashboardDropdown" class="absolute left-0 right-0 mt-1 bg-white shadow-lg rounded-md z-20">
                    <a href="{{ route('dashboard1') }}" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-100">
                        Dashboard 1
                    </a>
                    <a href="{{ route('dashboard2') }}" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-100">
                        Dashboard 2
                    </a>
                    <a href="{{ route('dashboard3') }}" class="block px-4 py-2 hover:bg-gray-100 border-b border-gray-100">
                        Dashboard 3
                    </a>
                    <a href="{{ route('dashboard4') }}" class="block px-4 py-2 hover:bg-gray-100">
                        Dashboard 4
                    </a>
                </div>
            </div>

            <!-- Other Menu Items -->
            <a href="{{ route('index') }}" class="flex items-center space-x-3 py-2 px-4 hover:bg-gray-200 rounded">
                <img src="{{ asset('images/userssss.jpg') }}" alt="Users" class="w-6 h-6">
                <span>Utilisateurs</span>
            </a>
            
            <a href="{{ route('teachers') }}" class="flex items-center space-x-3 py-2 px-4 hover:bg-gray-200 rounded">
                <img src="{{ asset('images/teatcher.jpeg') }}" alt="Teachers" class="w-6 h-6">
                <span>Enseignants</span>
            </a>
            
            <a href="{{ route('settings.edit') }}" class="flex items-center space-x-3 py-2 px-4 hover:bg-gray-200 rounded">
                <img src="{{ asset('images/parametre.png') }}" alt="Settings" class="w-6 h-6">
                <span>Paramètres</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col ml-64">
        <!-- Header -->
        <header class="bg-white shadow-md py-4 px-6 flex items-center sticky top-0 z-10">
            <img src="{{ asset('images/salutt.jpg') }}" alt="Salutation" class="w-8 h-8 mr-3">
            <span class="text-lg font-semibold">Bienvenue, Admin</span>
            
            <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                @csrf
                <button type="submit" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 flex items-center space-x-2 transition-colors">
                    <img src="{{ asset('images/logout.png') }}" alt="Logout" class="w-5 h-5">
                    <span>Déconnexion</span>
                </button>
            </form>
        </header>

        <!-- Main Content -->
        <main class="p-6 flex-1 mt-4 overflow-y-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow-md py-3 px-6 text-center text-gray-600">
            <p class="text-gray-700 font-semibold">&copy; 2025 Village Comptable. V-21.</p>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dashboard dropdown
            const dropdownBtn = document.getElementById('dashboardDropdownBtn');
            const dropdown = document.getElementById('dashboardDropdown');
            const arrow = document.getElementById('dropdownArrow');
            
            dropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('show');
                this.classList.toggle('active');
            });
            
            // Profile dropdown
            const profileDropdownBtn = document.getElementById('profileDropdownBtn');
            const profileDropdown = document.getElementById('profileDropdown');
            const profileArrow = document.getElementById('profileDropdownArrow');
            
            profileDropdownBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                profileDropdown.classList.toggle('show');
                this.classList.toggle('active');
            });
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target) && e.target !== dropdownBtn) {
                    dropdown.classList.remove('show');
                    dropdownBtn.classList.remove('active');
                }
                
                if (!profileDropdown.contains(e.target) && e.target !== profileDropdownBtn) {
                    profileDropdown.classList.remove('show');
                    profileDropdownBtn.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>