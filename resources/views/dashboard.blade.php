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
    <header class="bg-primary text-white p-3 shadow-lg">
        <div class="container mx-auto flex justify-between items-center px-20">
            <!-- Replace text with logo -->
            <a href="/">
                <img src="{{ asset('logo/telkom.svg') }}" alt="Secure Voting Platform Logo" class="" width="120">
            </a>
            <nav class="flex">
                <a href="/profile" class="text-white hover:underline ml-4">Profile</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" href="" class="text-white hover:underline ml-4">Logout</button>

                </form>

            </nav>
    </header>


    <main class="container mx-auto py-6 px-4 lg:px-0">


        @role('voter')
            <!-- Welcome Section -->
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h2 class="text-xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-600 mt-1">Your role: Voter</p>
            </section>
            <!-- Quick Navigation Panel -->
            <section class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6 max-w-3xl mx-auto">
                <a href="{{ route('elections') }}"
                    class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">Active
                    Elections</a>
                <a href="{{ route('history') }}"
                    class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">View
                    History</a>
                {{-- <a href="notifications.html"
                    class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">Notifications</a> --}}
                <a href="/profile"
                    class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">Profile
                    Settings</a>
            </section>

            <!-- Ongoing and Upcoming Elections -->
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Ongoing Elections</h3>

                @foreach ($electionsAll as $election)
                    @if (Auth::user()->elections()->where('election_id', $election->id)->first()->pivot->has_voted == 1)
                        @continue
                    @else
                        <ul class="mt-3 space-y-3">
                            <li class="border-b border-gray-200 pb-3">
                                <h4 class="text-md font-semibold">{{ $election->name }}</h4>
                                <p class="text-gray-600">{{ $election->description }}</p>
                                <p class="text-gray-500 text-sm">Ends in: 2 days 5 hours</p>
                                <a href="{{ route('votes.show', $election->id) }}"
                                    class="text-primary font-semibold hover:underline text-sm">Vote Now</a>
                            </li>
                            <!-- Add more elections as needed -->
                        </ul>
                    @endif
                @endforeach
            </section>


            <!-- Voting History -->

            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Your Voting History</h3>



                @foreach ($elections as $election)
                    @if ($election->pivot->has_voted == 0)
                        @continue
                    @endif
                    <ul class="mt-3 space-y-3">
                        <li class="border-b border-gray-200 pb-3">
                            <h4 class="text-md font-semibold">{{$election->name}}</h4>
                            <p class="text-gray-600 text-sm">Voted for: {{ $votes->where('election_user_id', $electionUsers->where('election_id', $election->id)->first()->id)->first()->candidate->name }}</p>
                            <a href="{{ route("history") }}" class="text-primary font-semibold hover:underline text-sm">Check
                                History</a>
                        </li>
                        <!-- Add more history records as needed -->
                    </ul>
                   
                @endforeach
            </section>

            <!-- Notifications and Alerts -->
            {{-- <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
                <ul class="mt-3 space-y-2">
                    <li class="text-gray-600 text-sm">New election available: [Election Title]</li>
                    <li class="text-gray-600 text-sm">Reminder: Upcoming election closing soon.</li>
                    <!-- Add more notifications as needed -->
                </ul>
            </section> --}}
        @endrole


        @role('admin')
            <!-- Welcome Section -->
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h2 class="text-xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-600 mt-1">Your role: Admin</p>
            </section>

            <!-- Admin-Only Sections (If Applicable) -->
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Admin Tools</h3>
                <div class="mt-3 space-y-2">
                    <a href="{{ route('admin.manage') }}"
                        class="block text-primary font-semibold hover:underline text-sm">Manage Elections</a>
                    <a href="admin/analytics.html" class="block text-primary font-semibold hover:underline text-sm">View
                        Analytics</a>
                    <a href="admin/auditlogs.html" class="block text-primary font-semibold hover:underline text-sm">Audit
                        Logs</a>
                </div>
            </section>
        @endrole


    </main>

    <footer class="bg-primary text-white p-3 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>
</x-app-layout>
