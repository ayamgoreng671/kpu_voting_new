<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteSecure - Online Voting Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            <a href="#" class="text-3xl font-bold text-primary">VoteSecure</a>
            <nav class="space-x-6">
                <a href="{{ route("login") }}" class="text-gray-700 hover:text-primary font-medium">Login</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-primary text-white py-24">
        <div class="container mx-auto text-center">
            <h2 class="text-5xl font-bold mb-4">Your Voice, Your Choice</h2>
            <p class="text-lg mb-6">Empowering democracy by ensuring every vote matters.</p>
        
        </div>
    </section>

    <!-- About Section -->
    <!-- Why Elections Matter Section -->
    <section id="why-elections-matter" class="py-16 bg-gray-100">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold">Why Elections Are Crucial</h2>
            <p class="mt-4 text-gray-600">Elections empower citizens to choose their leaders, influence policies, and build a society that reflects their values.</p>
            <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 shadow-md rounded-lg text-center">
                    <h3 class="text-xl font-bold">Preserve Democracy</h3>
                    <p class="mt-2 text-gray-600">Free and fair elections ensure that the power rests with the people.</p>
                </div>
                <div class="bg-white p-6 shadow-md rounded-lg text-center">
                    <h3 class="text-xl font-bold">Drive Progress</h3>
                    <p class="mt-2 text-gray-600">Elections allow you to advocate for policies that matter to you.</p>
                </div>
                <div class="bg-white p-6 shadow-md rounded-lg text-center">
                    <h3 class="text-xl font-bold">Foster Accountability</h3>
                    <p class="mt-2 text-gray-600">Leaders are held accountable for their actions through your vote.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Why Voting Matters</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-100 shadow-lg rounded-lg p-6">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-vote-yea text-primary text-4xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-primary">Strengthen Democracy</h4>
                    <p class="text-gray-600 mt-2">Voting is the cornerstone of democracy. By casting your vote, you actively participate in shaping policies and decisions that impact everyone. Elections empower citizens to have a say in governance, ensuring that leadership reflects the will of the people.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-gray-100 shadow-lg rounded-lg p-6">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-balance-scale text-primary text-4xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-primary">Foster Accountability</h4>
                    <p class="text-gray-600 mt-2">Elections are an essential tool for holding leaders accountable. They provide citizens the power to reward or replace officials based on their performance. A robust electoral process ensures that leaders prioritize the needs of the people they represent.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-gray-100 shadow-lg rounded-lg p-6">
                    <div class="flex justify-center mb-4">
                        <i class="fas fa-users text-primary text-4xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold text-primary">Promote Inclusivity</h4>
                    <p class="text-gray-600 mt-2">Inclusive elections give every individual a voice, regardless of their background. By ensuring fair representation for all communities, elections help bridge gaps in society and pave the way for equality and mutual respect.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Call-to-Action Section -->
    <!-- <section class="py-16 bg-primary text-white">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-semibold mb-6">Be a Part of the Change</h3>
            <p class="text-lg mb-6">Join millions of people contributing to a transparent and inclusive democratic process. Register today and make your voice count.</p>
            <div class="space-x-4">
                <a href="register.html" class="bg-white text-primary px-6 py-3 rounded-full font-semibold hover-bg-primary transition">Register Now</a>
                <a href="events.html" class="border-2 border-white text-white px-6 py-3 rounded-full font-semibold hover-bg-primary transition">Learn More</a>
            </div>
        </div>
    </section> -->




    <!-- How It Works Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-semibold text-gray-800 text-center mb-8">How It Works</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="rounded-full bg-primary text-white w-16 h-16 flex items-center justify-center mx-auto mb-4">1</div>
                    <h4 class="text-xl font-semibold text-gray-800">Register</h4>
                    <p class="text-gray-600 mt-2">Make your account are registered and participate in upcoming elections.</p>
                </div>
                <div class="text-center">
                    <div class="rounded-full bg-primary text-white w-16 h-16 flex items-center justify-center mx-auto mb-4">2</div>
                    <h4 class="text-xl font-semibold text-gray-800">Vote</h4>
                    <p class="text-gray-600 mt-2">Cast your vote easily and ensure your voice is heard.</p>
                </div>
                <div class="text-center">
                    <div class="rounded-full bg-primary text-white w-16 h-16 flex items-center justify-center mx-auto mb-4">3</div>
                    <h4 class="text-xl font-semibold text-gray-800">View Results</h4>
                    <p class="text-gray-600 mt-2">Stay informed with accurate and transparent results.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 VoteSecure. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
