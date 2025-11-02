@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>wtf</h1>
                </div>
            </div>
        </div>
    </div> --}}

     <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Total Bookings -->
                    <div class="bg-blue-500 rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-white bg-opacity-20">
                                    <i class="fas fa-ticket-alt text-white text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-blue-100">Total Orders</p>
                                    <p class="text-3xl font-bold text-white">0</p>
                                </div>
                            </div>
                            <p class="mt-2 text-sm text-blue-100">
                               0 new today
                            </p>
                        </div>
                    </div>

                    <!-- Total Customers -->
                    <div class="bg-emerald-500 rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-white bg-opacity-20">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-emerald-100">Total Customers</p>
                                    <p class="text-3xl font-bold text-white">0</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Movies -->
                    <div class="bg-purple-500 rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-white bg-opacity-20">
                                    <i class="fas fa-film text-white text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-purple-100">Daily Sales</p>
                                    <p class="text-3xl font-bold text-white">0</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Cinemas -->
                    <div class="bg-rose-500 rounded-lg shadow-sm overflow-hidden">
                        <div class="p-4">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-white bg-opacity-20">
                                    <i class="fas fa-building text-white text-xl"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-rose-100">Monthly Sales</p>
                                    <p class="text-3xl font-bold text-white">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
               
            </div>
        </div>
    </div>
@endsection



