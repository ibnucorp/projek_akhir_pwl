<nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('images/icons/icon-logo.svg') }}" class="h-8" alt="Flowbite Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap">DoNation</span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <ul class="flex items-center space-x-6">
            @if (Auth::check())
                <!-- Dropdown Menu -->
                <div class="relative">
                    <button 
                        class="flex items-center space-x-2 text-gray-800 font-medium focus:outline-none"
                        onclick="toggleDropdown()">
                        <i class="fa-solid fa-user"></i>
                        <span>{{ ucwords(Auth::user()->username) }}</span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>

                    <!-- Dropdown Items -->
                    <div 
                        id="dropdownMenu" 
                        class="absolute right-0 mt-2 w-48 bg-white border rounded-lg shadow-md hidden">
                        @if (Auth::user()->is_admin)
                            <a href="/dashboard" 
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Dashboard
                            </a>
                        @endif
                        <a href="{{ route('profile.logout') }}" 
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </a>
                    </div>
                </div>
            @else
                <li>
                    <a href="/login" 
                       class="text-gray-800 font-medium hover:text-blue-500">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>
                </li>
            @endif
        </ul>
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
        {{-- <li>
            <a href="/" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
        </li>
        <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">Daftar Donatur</a>
        </li>
        <li>
            <a href="#" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 md:dark:hover:bg-transparent">About</a>
        </li> --}}
    </ul>
</div>
  </div>
</nav>
