{{-- <x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@section('style')
    <style>
        .bg-primary {
            background-color: #B8292D;
        }

        .text-primary {
            color: #B8292D;
        }
    </style>
@endsection
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li class="py-5 px-5 bg-red-700 text-white max-w-3xl"
                style="    --tw-bg-opacity: 1;
background-color: rgb(185 28 28 / var(--tw-bg-opacity));">
                {{ $error }}</li>
        @endforeach
    </ul>
@endif
    <header class="bg-primary text-white p-3 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-20">
            <!-- Replace text with logo -->
            <a href="/">
                <img src="{{ asset("logo/telkom.svg") }}" alt="Secure Voting Platform Logo" class="" width="120">
            </a>
            <nav class="flex">
                {{-- <a href="/profile" class="text-white hover:underline ml-4">Profile</a> --}}
                <a href="{{ route('dashboard') }}" class="text-white hover:underline ml-4">Dashboard</a>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" href="" class="text-white hover:underline ml-4">Logout</button>

                </form>

            </nav>
    </header>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- User Information -->
            <section class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('User Information') }}</h3>
                <p class="text-gray-600 mt-2">Name: {{ $user->name }}</p>
                <p class="text-gray-600 mt-1">Email: {{ $user->email }}</p>
                <p class="text-gray-600 mt-1">VoterId: {{ $user->voterId }}</p>
                {{-- <a href="#"
                    class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-opacity-90 mt-4 inline-block">Edit
                    Profile</a> --}}
            </section>

            <!-- Change Password -->
            <section class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('Change Password') }}</h3>
                <form method="POST" action="{{ route('password.update') }}" class="mt-4">
                    @csrf
                    @method('PUT')

                    <label for="current_password" class="block text-gray-700 mb-2">{{ __('Current Password') }}</label>
                    <input type="password" id="current_password" name="current_password"
                        class="border border-gray-300 p-2 rounded-lg w-full mb-4" required>

                    <label for="new_password" class="block text-gray-700 mb-2">{{ __('New Password') }}</label>
                    <input type="password" id="new_password" name="password"
                        class="border border-gray-300 p-2 rounded-lg w-full mb-4" required>

                    <label for="new_password_confirmation"
                        class="block text-gray-700 mb-2">{{ __('Confirm New Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="border border-gray-300 p-2 rounded-lg w-full mb-4" required>

                    <button type="submit" class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-opacity-90">
                        {{ __('Update Password') }}
                    </button>
                </form>
            </section>

            <!-- Voting History -->
            {{-- <section class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800">{{ __('Voting History') }}</h3>
                <ul class="mt-4 space-y-4">
                    @forelse ($votingHistory as $history)
                        <li class="bg-gray-50 rounded-lg p-4 flex justify-between items-center">
                            <div>
                                <p class="text-gray-800">{{ $history->election_title }}</p>
                                <p class="text-gray-500 text-sm">Voted on: {{ $history->voted_at->format('F d, Y') }}</p>
                            </div>
                            <a href="/results?election_id={{ $history->election_id }}" class="text-primary hover:underline text-sm">View Results</a>
                            <a href="{{ $history->blockchain_link }}" target="_blank" class="text-primary hover:underline text-sm">Verify on Blockchain</a>
                        </li>
                    @empty
                        <li class="text-gray-500">{{ __('No voting history found.') }}</li>
                    @endforelse
                </ul>
            </section> --}}

        </div>
    </div>

    <footer class="bg-primary text-white p-4 text-center">
        <p class="text-sm">&copy; {{ now()->year }} Secure Voting Platform. {{ __('All rights reserved.') }}</p>
    </footer>
</x-app-layout>
