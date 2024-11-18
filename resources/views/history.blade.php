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


    <main class="container mx-auto py-6 px-4 lg:px-0">
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Your Voting History</h3>
            <p class="text-gray-600 text-sm">Review your past votes, election details, and blockchain proofs.</p>

            <!-- Voting History Records -->
            @foreach ($elections as $election)
            @if ($election->pivot->has_voted == 0)
                @continue
            @endif
                <ul class="mt-4 space-y-4">
                    <!-- Example Record -->
                    <li class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <h4 class="text-md font-semibold">Election: {{ $election->name }}</h4>
                        <p class="text-gray-600 text-sm">Description: {{ $election->description }}.</p>
                        <p class="text-gray-600 text-sm mt-1">Voted for: <span class="font-bold">{{ $votes->where("election_user_id", $electionUsers->where("election_id", $election->id)->first()->id)->first()->candidate->name }}</span></p>
                        <p class="text-gray-600 text-sm mt-1">Voted at: <span class="font-bold">{{ $votes->where("election_user_id", $electionUsers->where("election_id", $election->id)->first()->id)->first()->created_at }}</span></p>

                        <!-- Candidate Details -->
                        <div class="mt-2 border-t pt-2">
                            <h5 class="font-semibold text-sm text-gray-800">Candidate Details:</h5>
                            <p class="text-gray-600 text-sm">Vision: {{ $votes->where("election_user_id", $electionUsers->where("election_id", $election->id)->first()->id)->first()->candidate->vision }}</p>
                            <p class="text-gray-600 text-sm">Mission: {{ $votes->where("election_user_id", $electionUsers->where("election_id", $election->id)->first()->id)->first()->candidate->mission }}</p>
                        </div>

                        <!-- Blockchain Details -->
                        {{-- <div class="mt-4 border-t pt-2">
                            <h5 class="font-semibold text-sm text-gray-800">Blockchain Proof:</h5>
                            <ul class="text-gray-600 text-sm space-y-1">
                                <li><strong>Transaction Hash:</strong> <span class="text-primary">0xExampleTxHash</span>
                                </li>
                                <li><strong>Block Number:</strong> 12345678</li>
                                <li><strong>Block Hash:</strong> <span class="text-primary">0xExampleBlockHash</span>
                                </li>
                                <li><strong>Timestamp:</strong> 2024-11-10 12:34:56</li>
                                <li><strong>Contract Address:</strong> <span
                                        class="text-primary">0xExampleContractAddress</span></li>
                            </ul>
                            <a href="https://etherscan.io/tx/0xExampleTxHash" target="_blank"
                                class="text-primary font-semibold hover:underline text-sm mt-2 inline-block">View on
                                Blockchain</a>
                        </div> --}}
                    </li>

                    <!-- Add More Records Dynamically -->
                </ul>
            @endforeach

        </section>
    </main>

    <footer class="bg-primary text-white p-3 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>

</x-app-layout>
