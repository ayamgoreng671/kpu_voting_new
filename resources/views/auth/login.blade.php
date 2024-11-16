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
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label class="flex items-center text-gray-600">
                        <input type="checkbox" class="mr-2 leading-tight">
                        <span>Remember me</span>
                    </label>
                    {{-- <a href="#" class="text-primary hover-text-primary font-medium">Forgot Password?</a> --}}
                </div>
                <button type="submit" class="w-full bg-primary text-white py-2 rounded-lg font-semibold hover-bg-primary transition">Login</button>
            </form>
            <!-- <p class="text-center text-gray-600 mt-6">Don’t have an account? <a href="register.html" class="text-primary hover-text-primary font-semibold">Register here</a></p> -->
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 VoteSecure. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
