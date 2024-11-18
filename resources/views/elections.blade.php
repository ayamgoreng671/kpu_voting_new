@section('style')
    <style>
        .bg-primary {
            background-color: #b8292d;
        }

        .text-primary {
            color: #b8292d;
        }
    </style>
@endsection

<x-app-layout>


    <!-- Header -->
    <header class="bg-primary text-white p-3 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-20">
            <!-- Replace text with logo -->
            <a href="/">
                <img src="{{ asset("logo/telkom.svg") }}" alt="Secure Voting Platform Logo" class="" width="120">
            </a>
            <nav class="flex">
                <a href="{{ route('dashboard') }}" class="text-white hover:underline ml-4">Dashboard</a>

                <a href="/profile" class="text-white hover:underline ml-4">Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" href="" class="text-white hover:underline ml-4">Logout</button>

                </form>

            </nav>
    </header>


    <!-- Main Content -->
    <main class="container mx-auto py-6 px-4 lg:px-0 max-w-5xl">
        <!-- Page Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">
            Available Elections
        </h2>

        <!-- Filters Section -->
        {{-- <section class="mb-6">
            <div class="flex justify-center gap-4">
                <input type="text" placeholder="Search elections..."
                    class="border border-gray-300 p-2 rounded-lg w-full max-w-md" />
                <select class="border border-gray-300 p-2 rounded-lg">
                    <option value="">All Categories</option>
                    <option value="local">Local</option>
                    <option value="national">National</option>
                    <option value="international">International</option>
                </select>
            </div>
        </section> --}}

        <!-- Elections List Section -->
        <section class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 ">
            <!-- Election Card -->
            @foreach ($elections as $election)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $election->name }}</h3>
                    <p class="text-gray-600 mt-2">
                        {{ $election->description }}
                    </p>
                    <p class="text-gray-500 text-sm mt-1">Ends on: {{ $election->end_datetime }}</p>
                    <div class="mt-4 flex justify-between items-center">
                        {{-- {{ dd() }} --}}
                        @if (Auth::user()->elections()->where('election_id', $election->id)->first()->pivot->has_voted == 0)
                            <a href="{{ route('votes.show', $election->id) }}"
                                class="bg-primary text-white py-2 px-4 rounded-lg hover:bg-opacity-90">Vote Now</a>
                        @else
                        <p class=" text-green-600">Vote Casted</p>
                        @endif

                    </div>
                </div>
            @endforeach



            <!-- Repeat similar structure for more elections -->
        </section>
    </main>

    <!-- Footer -->
    <!-- <footer class="bg-primary text-white p-4 text-center">
      <p class="text-sm">
        &copy; 2024 Secure Voting Platform. All rights reserved.
      </p>
    </footer> -->


</x-app-layout>
