@extends('layouts.layout')
@section('title', 'Register')

@section('content')
<section class="bg-gray-50">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
          <img class="w-8 h-8 mr-2" src="{{ asset("images/icons/icon-logo.svg") }}" alt="logo">
          DoNation
      </a>
      {{-- Card --}}
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                  Daftarkan dirimu sekarang!
              </h1>
              <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                {{-- Username --}}
                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                      <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Username" required>
                  </div>
                  {{-- Password --}}
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                      <input type="password" name="password" id="password" placeholder="Password" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                  </div>
                  {{-- Submit Button --}}
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Sign up</button>
                  <p class="text-sm font-light text-gray-500">
                      Sudah punya akun? <a href="login" class="font-medium text-primary-600 hover:underline">Sign in</a>
                  </p>
              </form>
          </div>
      </div>
      {{-- /Card --}}
  </div>
</section>
@endsection
