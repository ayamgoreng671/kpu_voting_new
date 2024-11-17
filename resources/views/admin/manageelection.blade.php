<x-app-layout>
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
    <main class="container mx-auto py-6 px-4 lg:px-0">
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
        <section class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
            <h2 class="text-xl font-bold text-primary mb-4">Edit Election</h2>

            <!-- Edit Election Form -->
            <form action="/elections/update" method="POST" class="space-y-4">
                <input type="hidden" name="id" value="123"> <!-- Hidden input for election ID -->

                <!-- Election Title -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Election Title</label>
                    <input type="text" name="title" value="{{ $election->name }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                        placeholder="Election Name" required>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                        placeholder="Describe the election" required>{{ $election->description }}</textarea>
                </div>



                <!-- Dates -->
                <div class="flex space-x-4">
                    <!-- Start Date -->
                    <div class="flex-1">

                        <label class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="datetime-local" name="start_date" value="{{ $election->start_datetime }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                            disabled>
                    </div>
                    <!-- End Date -->
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="datetime-local" name="end_date" value="{{ $election->end_datetime }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                            disabled>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-4">
                    <a href="{{ route('admin.manage') }}"
                        class="w-1/2 py-2 text-center bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Cancel</a>
                    <button type="submit"
                        class="w-1/2 py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition">Save
                        Changes</button>
                </div>
            </form>
        </section>

        <section class="bg-white shadow-md rounded-lg p-6 my-6 max-w-3xl mx-auto">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Candidates for This Election</h2>

            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2 border border-gray-300">#</th>
                        <th class="px-4 py-2 border border-gray-300">Image</th>
                        <th class="px-4 py-2 border border-gray-300">Name</th>
                        <th class="px-4 py-2 border border-gray-300">Class</th>
                        <th class="px-4 py-2 border border-gray-300">Bio</th>
                        <th class="px-4 py-2 border border-gray-300">Vision</th>
                        <th class="px-4 py-2 border border-gray-300">Mission</th>
                        <th class="px-4 py-2 border border-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        @if ($candidate->name == 'Empty Box')
                            @continue
                        @endif
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <img src="{{$candidate->photo != null ? Storage::url($candidate->photo) : Storage::url('photos/default.png')  }}" alt="Candidate Image"
                                    class="w-12 h-12 rounded-full object-cover">
                            </td>
                            <td class="px-4 py-2 border border-gray-300">{{ $candidate->name }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $candidate->classroom->classroom }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $candidate->bio }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $candidate->vision }}</td>
                            <td class="px-4 py-2 border border-gray-300">{{ $candidate->mission }}</td>
                            <td class="px-4 py-2 border border-gray-300">
                                <a href="#"
                                    class="bg-blue-500 text-white py-1 px-2 rounded hover:bg-blue-600">Edit</a>
                                <a href="#"
                                    class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <!-- Placeholder Message -->
            <p class="text-center text-gray-600 mt-4">This table uses placeholder data for demonstration.</p>
        </section>

        <section class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-3xl mx-auto mt-4">
            <h2 class="text-xl font-bold text-gray-800">Add Candidates to an Election</h2>
            <p class="text-gray-600 mt-1 mb-4">Select an election and fill in the details to add a new candidate.</p>

            <!-- Form to Add Candidate -->
            <form action="{{ route('admin.manage.addcandidate', $election->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-4">

                @csrf
                <!-- Candidate Name -->

                <div>
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Candidate Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter candidate's name"
                        class="border border-gray-300 p-2 rounded w-full">
                </div>

                <!-- Class Selection -->
                <div>
                    <label for="classroom_id" class="block text-gray-700 font-semibold mb-2">Select Class:</label>
                    <select id="classroom_id" name="classroom_id" class="border border-gray-300 p-2 rounded w-full">
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">{{ $classroom->classroom }}</option>
                        @endforeach

                    </select>
                </div>

                <!-- Candidate Bio -->
                <div>
                    <label for="bio" class="block text-gray-700 font-semibold mb-2">Candidate Bio:</label>
                    <textarea id="bio" name="bio" rows="3" placeholder="Brief bio of the candidate"
                        class="border border-gray-300 p-2 rounded w-full"></textarea>
                </div>

                <!-- Candidate Vision -->
                <div>
                    <label for="vision" class="block text-gray-700 font-semibold mb-2">Candidate
                        Vision:</label>
                    <textarea id="vision" name="vision" rows="2" placeholder="Vision of the candidate"
                        class="border border-gray-300 p-2 rounded w-full"></textarea>
                </div>

                <!-- Candidate Mission -->
                <div>
                    <label for="mission" class="block text-gray-700 font-semibold mb-2">Candidate
                        Mission:</label>
                    <textarea id="mission" name="mission" rows="2" placeholder="Mission of the candidate"
                        class="border border-gray-300 p-2 rounded w-full"></textarea>
                </div>

                <!-- Candidate Image Upload -->
                <div>
                    <label for="photo" class="block text-gray-700 font-semibold mb-2">Candidate
                        Image:</label>
                    <input type="file" id="photo" name="photo"
                        class="border border-gray-300 p-2 rounded w-full">
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="mt-4 w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition">Add
                    Candidate</button>
            </form>
        </section>

        <section class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-3xl mx-auto mt-4">
            <h3 class="text-lg font-semibold text-gray-800">Register Voter</h3>
            <form class="flex space-x-4 mt-3 mb-4">
                <input type="text"
                    class="p-2 w-4/5 rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                    placeholder="Voter ID">
                <button type="submit"
                    class="px-4 w-1/5  py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition text-sm">Register
                    Voter</button>
            </form>
            <form method="POST" action="{{ route('admin.manage.addvoter', $election->id) }}">
                @csrf
                <button href=""
                    class="px-4 w-1/3  py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition text-sm">Register
                    All Users VoterId</button>

            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white p-3 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>

</x-app-layout>
