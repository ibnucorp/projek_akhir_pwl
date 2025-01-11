@extends('layouts.layout')

@section('content')
<x-navbar/>
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 space-y-6">
<form action="{{ route('donators.store') }}" method="POST">
  @csrf
  <input type="hidden" name="post_id" value="{{ $post->id }}" />
  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" />
  <!-- Donor Information -->
  <div>
    <h2 class="text-xl font-bold text-gray-800">Informasi Donatur</h2>
    <div class="mt-4 space-y-4">
      <input
        type="text"
        name="nama"
        placeholder="Nama"
        value="{{ auth()->user()->username }}"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
        readonly
      />
      <textarea
        name="pesan"
        placeholder="Pesan Donasi"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
        rows="3"
      ></textarea>
    </div>
  </div>

  <!-- Donation Amount -->
  <div>
    <h2 class="text-xl font-bold text-gray-800">Jumlah</h2>
    <div class="mt-4 flex items-center space-x-2">
      <span class="text-gray-500">Rp</span>
      <input
        type="number"
        name="total_donasi"
        placeholder="Jumlah"
        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
      />
    </div>
  </div>

  <!-- Payment Options -->
  <div>
    <h2 class="text-xl font-bold text-gray-800">Opsi Pembayaran:</h2>
    <div class="mt-4 flex items-center justify-between">
      <!-- Gopay -->
      <label class="flex flex-col items-center space-y-2 cursor-pointer">
        <input
          type="radio"
          name="tipe_bayar"
          value="gopay"
          class="hidden peer"
        />
        <img
          src="{{ asset('images/pembayaran/gopay.png') }}"
          alt="Gopay"
          class="w-16 h-16 object-contain peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:rounded-lg"
        />
        <span class="text-sm text-gray-600 peer-checked:text-blue-500">Gopay</span>
      </label>

      <!-- Dana -->
      <label class="flex flex-col items-center space-y-2 cursor-pointer">
        <input
          type="radio"
          name="tipe_bayar"
          value="dana"
          class="hidden peer"
        />
        <img
          src="{{ asset('images/pembayaran/dana.png') }}"
          alt="Dana"
          class="w-16 h-16 object-contain peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:rounded-lg"
        />
        <span class="text-sm text-gray-600 peer-checked:text-blue-500">Dana</span>
      </label>

      <!-- BCA -->
      <label class="flex flex-col items-center space-y-2 cursor-pointer">
        <input
          type="radio"
          name="tipe_bayar"
          value="bca"
          class="hidden peer"
        />
        <img
          src="{{ asset('images/pembayaran/bca.png') }}"
          alt="BCA Virtual Account"
          class="w-16 h-16 object-contain peer-checked:ring-2 peer-checked:ring-blue-500 peer-checked:rounded-lg"
        />
        <span class="text-sm text-gray-600 peer-checked:text-blue-500">BCA</span>
      </label>
    </div>
  </div>

  <!-- Submit Button -->
  <button
    type="submit"
    class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition"
  >
    Kirim
  </button>
</form>

</div>

@endsection