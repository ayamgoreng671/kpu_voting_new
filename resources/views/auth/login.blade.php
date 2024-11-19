<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VoteSecure</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom Tailwind Color Overrides */

        .bg-primary {
            background-color: #B8292D;
        }

        .text-primary {
            color: #B8292D;
        }

        .border-primary {
            border-color: #B8292D;
        }

        .hover-bg-primary:hover {
            background-color: #9f2427;
        }

        .hover-text-primary:hover {
            color: #9f2427;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow-lg py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="index.html" class="text-3xl font-bold text-primary">VoteSecure</a>
            <nav class="space-x-6">
                <!-- <a href="register.html" class="text-gray-700 hover:text-primary font-medium">Register</a> -->
                <!-- <a href="events.html" class="text-gray-700 hover:text-primary font-medium">Active Events</a> -->
            </nav>
        </div>
    </header>

    <!-- Login Section -->
    <section class="flex items-center justify-center min-h-screen bg-gray-50">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">
            <h2 class="text-3xl font-semibold text-primary text-center mb-6">Login to VoteSecure</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your Email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary focus:outline-none">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-primary">
                            <!-- Eye Icon (Show Password) -->
                            <svg id="showIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.343 9.343A3.5 3.5 0 0112 8.5a3.5 3.5 0 013.5 3.5c0 .657-.186 1.27-.507 1.793" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 15.5a3.5 3.5 0 01-3.5-3.5c0-.657.186-1.27.507-1.793" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.612 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.154 7-9.542 7a9.953 9.953 0 01-6.207-2.207L3 3z" />

                            </svg>
                            <!-- Eye Slash Icon (Hide Password) -->
                            <svg id="hideIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12c0 2.21-1.79 4-4 4s-4-1.79-4-4 1.79-4 4-4 4 1.79 4 4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.612 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.154 7-9.542 7s-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                
                
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" class="mr-2 leading-tight">
                        <span>Remember me</span>
                    </label>
                    {{-- <a href="#" class="text-primary hover-text-primary font-medium">Forgot Password?</a> --}}
                </div>
                <button type="submit"
                    class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover-bg-primary transition">Login</button>
            </form>
            <!-- <p class="text-center text-gray-600 mt-6">Don’t have an account? <a href="register.html" class="text-primary hover-text-primary font-semibold">Register here</a></p> -->
        </div>
    </section>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const showIcon = document.getElementById('showIcon');
            const hideIcon = document.getElementById('hideIcon');
    
            // Toggle password visibility
            if (passwordField.type === 'password') {
                passwordField.type = 'text'; // Show password
                showIcon.classList.add('hidden'); // Hide "eye" icon
                hideIcon.classList.remove('hidden'); // Show "eye slash" icon
            } else {
                passwordField.type = 'password'; // Hide password
                showIcon.classList.remove('hidden'); // Show "eye" icon
                hideIcon.classList.add('hidden'); // Hide "eye slash" icon
            }
        });
    </script>
    
    
    
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 VoteSecure. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
