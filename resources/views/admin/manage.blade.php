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
    <!-- Navbar -->
    <header class="bg-primary text-white p-3 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-semibold">Secure Voting Dashboard</h1>
            <nav>
                <a href="/" class="text-white hover:underline ml-4">Dashboard</a>
                <a href="/profile" class="text-white hover:underline ml-4">Profile</a>
                <a href="/logout" class="text-white hover:underline ml-4">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-6 px-4 lg:px-0">

        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-error mb-4">
                {{ session('danger') }}
            </div>
        @endif

        <!-- Manage Elections Section -->
        <section class="bg-white shadow-md rounded-lg p-6 mb-6 max-w-3xl mx-auto">
            <h2 class="text-xl font-bold text-primary mb-4">Manage Elections</h2>

            <!-- Create New Election -->
            <section class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Create New Election</h3>
                <form class="space-y-4" action="{{ route('admin.manage.electionpost') }}" method="POST">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Election Title</label>
                        <input type="text" name="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                            placeholder="Election Name">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Election Category</label>
                        <select id="options" name="category_id"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description"
                            class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary"
                            placeholder="Describe the election"></textarea>
                    </div>
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700 ">Start Date</label>
                            <input type="datetime-local" name="start_datetime"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary">
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700">End Date</label>
                            <input type="datetime-local" name="end_datetime"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary">
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full py-2 bg-primary text-white rounded-md hover:bg-opacity-90 transition">Create
                        Election</button>
                </form>
            </section>

            <!-- Existing Elections -->
            <section>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Existing Elections</h3>
                <table class="w-full text-left border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-primary font-medium">Election Title</th>
                            <th class="px-4 py-2 text-primary font-medium">Category</th>
                            <th class="px-4 py-2 text-primary font-medium">Status</th>
                            <th class="px-4 py-2 text-primary font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($elections as $election)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2">{{ $election->name }}</td>
                                <td class="px-4 py-2">{{ $election->category->category }}</td>
                                <td class="px-4 py-2 text-green-600">Active</td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.manage.election', $election->id) }}"
                                        class="text-primary font-semibold hover:underline">Edit</a> |
                                    <a href="#" class="text-primary font-semibold hover:underline">Deactivate</a>
                                </td>
                            </tr>
                        @endforeach
                        {{-- <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">Local Council Election 2024</td>
                            <td class="px-4 py-2 text-green-600">Active</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-primary font-semibold hover:underline">Edit</a> |
                                <a href="#" class="text-primary font-semibold hover:underline">Deactivate</a>
                            </td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2">School Board Election</td>
                            <td class="px-4 py-2 text-gray-500">Completed</td>
                            <td class="px-4 py-2">
                                <a href="#" class="text-primary font-semibold hover:underline">View
                                    Results</a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </section>

            <!-- Register Voters -->


            <!-- End Election Manually -->

        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white p-3 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>


</x-app-layout>
