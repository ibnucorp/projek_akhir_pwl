@extends('layouts.layout')

@section('content')
<x-navbar/>
                <div class="container w-11/12 mx-auto">
                    <div class="my-4">
                        <a href="{{ url()->previous() }}" 
                        class="inline-block px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 transition">
                            &larr; Kembali
                        </a>
                    </div>
                    <div class="bg-white shadow-md rounded-lg mx-auto border-gray-500">
                        
                        <img src="{{ asset('storage/' . $post->image_url) }}" alt="Image" class="w-full h-full rounded-t-2xl">
                        <div class="p-4">
                            <h2 class="text-3xl font-bold my-3">{{ $post->title }}</h2>
                            <hr>
                            <p class="text-sm text-gray-600">
                                {{ $post->description }}
                            </p>
                            <div class="mt-4">
                                <div class="bg-gray-300 rounded-full h-2">
                                    @php
                                        $progress = ($post->current_amount / $post->goal_amount) * 100;
                                        @endphp
                                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $progress }}%;"></div>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">
                                    Rp {{ number_format($post->current_amount, 0, ',', '.') }} terkumpul dari 
                                    Rp {{ number_format($post->goal_amount, 0, ',', '.') }}
                                </p>
                            </div>
                            <a href="{{ route('pembayaran.index', $post->id) }}" class="mt-4 w-full bg-black text-white py-2 rounded-lg text-center block">
                                Donasi Sekarang
                            </a>
                        </div>
                    </div>
                    
                    <div id="riwayatDonasi" class="space-y-4 w-10/12 mx-auto my-5">
                        <h1 class="text-3xl">Riwayat Donatur</h1>
                        @if ($donators->isEmpty())
                            <p class="text-center text-gray-500">Belum ada donatur.</p>
                        @else
                            @foreach ($donators as $donator)
                                <div class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4 border-gray-500 border">
                                    <!-- Icon -->
                                    <img src="{{ asset('images/icons/ikonrupiah.png') }}" 
                                        alt="Ikon Rupiah" 
                                        class="w-16 h-16 object-contain">
                                    
                                    <!-- Details -->
                                    <div class="">
                                        <p class="font-semibold text-gray-800">{{ ucwords($donator->user->username ?? 'Anonim') }}</p>
                                        <p class="text-green-600 font-bold">
                                            Rp {{ number_format($donator->total_donasi, 0, ',', '.') }}
                                            <span class="text-gray-500 font-normal"> • Via {{ $donator->tipe_bayar }}</span>
                                        </p>
                                        <p class="text-gray-600 text-sm mt-1">{{ $donator->pesan ?? '' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="mt-4">
                            {{ $donators->links('pagination::tailwind') }}
                        </div>
                    </div>

                </div>
@endsection