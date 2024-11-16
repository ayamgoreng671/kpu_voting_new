<x-app-layout>
    @section('style')
        <style>
            .bg-primary {
                background-color: #B8292D;
            }

            .text-primary {
                color: #B8292D;
            }

            /* Transition effect for modal */
            .modal-overlay {
                opacity: 0;
                transition: opacity 0.3s ease-in-out;
            }

            .modal-overlay.active {
                opacity: 1;
            }

            .modal-content {
                transform: scale(0.9);
                opacity: 0;
                transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            }

            .modal-content.active {
                transform: scale(1);
                opacity: 1;
            }
        </style>
    @endsection

    <!-- Header -->
    <header class="bg-primary text-white p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-semibold">Secure Voting Platform</h1>
            <nav>
                <a href="/dashboard" class="text-white hover:underline ml-4">Dashboard</a>
                <a href="/logout" class="text-white hover:underline ml-4">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-6 px-4 lg:px-0">
        <!-- Election Information Section -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800">{{ $election->name }}</h2>
            <p class="text-gray-600 mt-2">{{ $election->description }}</p>
            <p class="text-gray-500 text-sm mt-1">Ends on: {{ $election->end_datetime }}</p>
        </section>

        <!-- Candidate Selection Section -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Select a Candidate</h3>
            <form action="{{ route('votes.store', $election->id) }}" method="POST" class="mt-4">
                @csrf
                <div class="space-y-4">
                    <!-- List each candidate with a radio button -->
                    @foreach ($candidates as $candidate)
                        @if ($candidatesCount > $limit)
                            @if ($candidate->name == 'Empty Box')
                                @continue
                            @endif
                            <label class="block bg-gray-50 border border-gray-300 rounded-lg p-3 cursor-pointer">
                                <input type="radio" name="candidate" value="{{ $candidate->contract_candidateId }}"
                                    class="mr-2">
                                <span class="text-gray-800 font-semibold">{{ $candidate->name }}</span>
                                <p class="text-gray-500 text-sm mt-1">[Brief bio, policies, and achievements]</p>
                                <button type="button" class="text-primary hover:underline text-sm"
                                    onclick="openModal('Candidate 1', 'Candidate 1 Vision...', 'Candidate 1 Mission...', 'https://via.placeholder.com/150')">View
                                    Full Profile</button>
                            </label>
                        @else
                            <label class="block bg-gray-50 border border-gray-300 rounded-lg p-3 cursor-pointer">
                                <input type="radio" name="candidate" value="{{ $candidate->contract_candidateId }}"
                                    class="mr-2">
                                <span class="text-gray-800 font-semibold">{{ $candidate->name }}</span>
                                <p class="text-gray-500 text-sm mt-1">[Brief bio, policies, and achievements]</p>
                                <button type="button" class="text-primary hover:underline text-sm"
                                    onclick="openModal('Candidate 1', 'Candidate 1 Vision...', 'Candidate 1 Mission...', 'https://via.placeholder.com/150')">View
                                    Full Profile</button>
                            </label>
                        @endif
                    @endforeach

                </div>

                <!-- Submit Vote Button -->
                <button type="submit"
                    class="mt-6 w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition">Submit
                    Vote</button>
            </form>
        </section>

        <!-- Candidate Profile Modal -->
        <div id="profileModal"
            class="modal-overlay hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
                <button onclick="closeModal()"
                    class="text-gray-600 hover:text-gray-800 absolute top-2 right-2">&times;</button>
                <img id="candidateImage" src="" alt="Candidate Image"
                    class="w-32 h-32 rounded-full mx-auto mb-4">
                <h4 id="candidateName" class="text-xl font-semibold text-gray-800 text-center">[Candidate Name]</h4>
                <p class="text-gray-600 mt-2"><strong>Vision:</strong> <span id="candidateVision">[Vision
                        Statement]</span></p>
                <p class="text-gray-600 mt-2"><strong>Mission:</strong> <span id="candidateMission">[Mission
                        Statement]</span></p>
                <button onclick="closeModal()"
                    class="mt-4 bg-primary text-white py-2 w-full rounded-lg hover:bg-opacity-90 transition">Close</button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white p-4 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>

    <!-- JavaScript for Modals -->
    <script>
        // Function to open the profile modal and apply transition effect
        function openModal(name, vision, mission, imageSrc) {
            document.getElementById('candidateName').textContent = name;
            document.getElementById('candidateVision').textContent = vision;
            document.getElementById('candidateMission').textContent = mission;
            document.getElementById('candidateImage').src = imageSrc;

            const overlay = document.getElementById('profileModal');
            const modalContent = document.querySelector('.modal-content');

            overlay.classList.remove('hidden'); // Make modal visible
            setTimeout(() => {
                overlay.classList.add('active');
                modalContent.classList.add('active');
            }, 10); // Small delay to trigger transition
        }

        // Function to close the profile modal and remove transition effect
        function closeModal() {
            const overlay = document.getElementById('profileModal');
            const modalContent = document.querySelector('.modal-content');

            overlay.classList.remove('active');
            modalContent.classList.remove('active');
            setTimeout(() => {
                overlay.classList.add('hidden');
            }, 300); // Match this delay with the transition duration for smooth hiding
        }
    </script>
</x-app-layout>
