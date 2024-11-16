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
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-lg font-semibold">Secure Voting Dashboard</h1>
            <nav>
                <a href="/profile" class="text-white hover:underline ml-4">Profile</a>
                <a href="/logout" class="text-white hover:underline ml-4">Logout</a>
            </nav>
        </div>
    </header>
    
    <main class="container mx-auto py-6 px-4 lg:px-0">
        <!-- Welcome Section -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h2 class="text-xl font-bold text-gray-800">Welcome back, [User Name]!</h2>
            <p class="text-gray-600 mt-1">Your role: Voter</p>
        </section>
    
        <!-- Quick Navigation Panel -->
        <section class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-6 max-w-3xl mx-auto">
            <a href="{{ route("elections") }}" class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">Active Elections</a>
            <a href="results.html" class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">View Results</a>
            <a href="notifications.html" class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">Notifications</a>
            <a href="profile.html" class="bg-primary text-white p-3 rounded-lg text-center shadow hover:bg-opacity-90 transition">Profile Settings</a>
        </section>
    
        <!-- Ongoing and Upcoming Elections -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Ongoing Elections</h3>
            <ul class="mt-3 space-y-3">
                <li class="border-b border-gray-200 pb-3">
                    <h4 class="text-md font-semibold">Election Title</h4>
                    <p class="text-gray-600">Description of the election...</p>
                    <p class="text-gray-500 text-sm">Ends in: 2 days 5 hours</p>
                    <a href="vote.html" class="text-primary font-semibold hover:underline text-sm">Vote Now</a>
                </li>
                <!-- Add more elections as needed -->
            </ul>
        </section>
    
        <!-- Voting History -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Your Voting History</h3>
            <ul class="mt-3 space-y-3">
                <li class="border-b border-gray-200 pb-3">
                    <h4 class="text-md font-semibold">Past Election Title</h4>
                    <p class="text-gray-600 text-sm">Voted for: Candidate Name</p>
                    <a href="transaction.html" class="text-primary font-semibold hover:underline text-sm">Verify on Blockchain</a>
                </li>
                <!-- Add more history records as needed -->
            </ul>
        </section>
    
        <!-- Blockchain Verification Tools -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Blockchain Verification</h3>
            <p class="text-gray-600 mb-3 text-sm">Enter your transaction ID to verify your vote on the blockchain.</p>
            <input type="text" placeholder="Enter Transaction ID" class="border border-gray-300 p-2 rounded w-full mb-3">
            <button class="bg-primary text-white px-3 py-1.5 rounded hover:bg-opacity-90 transition">Verify</button>
        </section>
    
        <!-- Notifications and Alerts -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Notifications</h3>
            <ul class="mt-3 space-y-2">
                <li class="text-gray-600 text-sm">New election available: [Election Title]</li>
                <li class="text-gray-600 text-sm">Reminder: Upcoming election closing soon.</li>
                <!-- Add more notifications as needed -->
            </ul>
        </section>
    
    
    
        <!-- Admin-Only Sections (If Applicable) -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Admin Tools</h3>
            <div class="mt-3 space-y-2">
                <a href="{{ route("admin.manage") }}" class="block text-primary font-semibold hover:underline text-sm">Manage Elections</a>
                <a href="admin/analytics.html" class="block text-primary font-semibold hover:underline text-sm">View Analytics</a>
                <a href="admin/auditlogs.html" class="block text-primary font-semibold hover:underline text-sm">Audit Logs</a>
            </div>
        </section>
    </main>
    
    <footer class="bg-primary text-white p-3 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>
</x-app-layout>