<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoteSecure - Online Voting Platform</title>
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
            <a href="#" class="text-3xl font-bold text-primary">VoteSecure</a>
            <nav class="space-x-6">
                <a href="{{route("login")}}" class="text-gray-700 hover:text-primary font-medium">Login</a>
                {{-- <a href="register.html" class="text-gray-700 hover:text-primary font-medium">Register</a> --}}
                {{-- <a href="events.html" class="text-gray-700 hover:text-primary font-medium">Active Events</a> --}}
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-primary text-white py-24">
        <div class="container mx-auto text-center">
            <h2 class="text-5xl font-bold mb-4">Empowering Your Vote with Confidence</h2>
            <p class="text-lg mb-6">Join thousands who trust VoteSecure for a transparent and secure voting experience.</p>
            <div class="space-x-4">
                <a href="register.html" class="bg-white text-primary px-6 py-3 rounded-full font-semibold hover-bg-primary transition">Register Now</a>
                <a href="events.html" class="border-2 border-white text-white px-6 py-3 rounded-full font-semibold hover-bg-primary transition">Explore Events</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Why Choose VoteSecure?</h3>
            <p class="text-gray-600 mb-8">Our platform ensures security, transparency, and ease of use to guarantee fair voting experiences.</p>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="bg-white shadow-lg rounded-lg p-6 w-80">
                    <img src="https://img.icons8.com/ios-filled/50/B8292D/lock--v1.png" alt="Secure" class="mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-primary">Secure Voting</h4>
                    <p class="text-gray-600 mt-2">All votes are encrypted and stored with blockchain technology to ensure tamper-proof security.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 w-80">
                    <img src="https://img.icons8.com/ios-filled/50/B8292D/visible.png" alt="Transparent" class="mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-primary">Transparent Results</h4>
                    <p class="text-gray-600 mt-2">Our platform offers real-time results for full transparency, accessible to all voters.</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 w-80">
                    <img src="https://img.icons8.com/ios-filled/50/B8292D/easy.png" alt="User-Friendly" class="mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-primary">User-Friendly Interface</h4>
                    <p class="text-gray-600 mt-2">Simple, intuitive, and accessible – VoteSecure makes voting easy for everyone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Our Key Features</h3>
            <p class="text-gray-600 mb-8">Experience the difference of a secure, transparent, and decentralized voting process.</p>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-100 shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold text-primary">Secure Authentication</h4>
                    <p class="text-gray-600 mt-2">Multi-factor authentication to ensure only verified users access the voting system.</p>
                </div>
                <div class="bg-gray-100 shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold text-primary">Encrypted Data</h4>
                    <p class="text-gray-600 mt-2">All personal and voting data are securely encrypted to protect voter privacy.</p>
                </div>
                <div class="bg-gray-100 shadow-lg rounded-lg p-6">
                    <h4 class="text-xl font-semibold text-primary">Real-Time Tracking</h4>
                    <p class="text-gray-600 mt-2">Track vote counting and results in real time without compromising security.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- How It Works Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-semibold text-gray-800 text-center mb-8">How It Works</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="rounded-full bg-primary text-white w-16 h-16 flex items-center justify-center mx-auto mb-4">1</div>
                    <h4 class="text-xl font-semibold text-gray-800">Register</h4>
                    <p class="text-gray-600 mt-2">Create your account with VoteSecure in just a few minutes.</p>
                </div>
                <div class="text-center">
                    <div class="rounded-full bg-primary text-white w-16 h-16 flex items-center justify-center mx-auto mb-4">2</div>
                    <h4 class="text-xl font-semibold text-gray-800">Verify Identity</h4>
                    <p class="text-gray-600 mt-2">Securely verify your identity to start voting.</p>
                </div>
                <div class="text-center">
                    <div class="rounded-full bg-primary text-white w-16 h-16 flex items-center justify-center mx-auto mb-4">3</div>
                    <h4 class="text-xl font-semibold text-gray-800">Vote with Confidence</h4>
                    <p class="text-gray-600 mt-2">Cast your vote and track results transparently and securely.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blockchain Technology Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Powering Secure Voting with Blockchain Technology</h3>
            <p class="text-gray-600 mb-8">Our platform leverages blockchain to ensure votes are tamper-proof, transparent, and verifiable, providing the highest level of security for online voting.</p>
            <div class="flex flex-wrap justify-center gap-8">
                <div class="bg-gray-100 shadow-lg rounded-lg p-6 w-80">
                    <img src="https://img.icons8.com/ios-filled/50/B8292D/blockchain-technology.png" alt="Decentralization" class="mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-primary">Decentralization</h4>
                    <p class="text-gray-600 mt-2">Votes are distributed across a secure, decentralized network, making it nearly impossible for any single entity to manipulate the results.</p>
                </div>
                <div class="bg-gray-100 shadow-lg rounded-lg p-6 w-80">
                    <img src="https://img.icons8.com/ios-filled/50/B8292D/transaction-list.png" alt="Transparency" class="mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-primary">Transparency</h4>
                    <p class="text-gray-600 mt-2">Each vote is recorded on the blockchain, creating an immutable ledger that allows for real-time tracking and verification.</p>
                </div>
                <div class="bg-gray-100 shadow-lg rounded-lg p-6 w-80">
                    <img src="https://img.icons8.com/ios-filled/50/B8292D/key.png" alt="Security" class="mx-auto mb-4">
                    <h4 class="text-xl font-semibold text-primary">Enhanced Security</h4>
                    <p class="text-gray-600 mt-2">Blockchain’s cryptographic mechanisms ensure votes are encrypted and protected against unauthorized access or alteration.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Audit Logs Section -->
    <!-- <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Audit Logs</h3>
            <p class="text-gray-600 mb-8">Access comprehensive audit logs to review and verify every transaction for transparency and accountability.</p>
            <a href="/audit-logs.html" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover-bg-primary transition">View Audit Logs</a>
        </div>
    </section> -->

    <!-- View Analytics Section -->
    <!-- <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">View Analytics</h3>
            <p class="text-gray-600 mb-8">Gain insights into voting trends and results through our comprehensive analytics dashboard.</p>
            <a href="/view-analytics.html" class="bg-primary text-white px-6 py-3 rounded-full font-semibold hover-bg-primary transition">View Analytics</a>
        </div>
    </section> -->

    <!-- Testimonials Section -->
    <!-- <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">What Our Users Are Saying</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-600 mb-4">"VoteSecure makes it so easy to vote online, and I trust that my vote is safe and counted."</p>
                    <h4 class="text-xl font-semibold text-primary">Sarah J.</h4>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-600 mb-4">"The blockchain technology gives me confidence that the results are legitimate and transparent."</p>
                    <h4 class="text-xl font-semibold text-primary">Alex R.</h4>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <p class="text-gray-600 mb-4">"I appreciate how secure and easy it is to vote using VoteSecure. Highly recommend!"</p>
                    <h4 class="text-xl font-semibold text-primary">Maria P.</h4>
                </div>
            </div>
        </div>
    </section> -->

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-6">
            <h3 class="text-3xl font-semibold text-gray-800 text-center mb-6">Frequently Asked Questions</h3>
            <div class="max-w-2xl mx-auto">
                <details class="mb-4">
                    <summary class="font-semibold text-gray-800">How secure is the VoteSecure platform?</summary>
                    <p class="text-gray-600 mt-2">We use blockchain technology and encrypted data storage to ensure the highest level of security for each vote.</p>
                </details>
                <details class="mb-4">
                    <summary class="font-semibold text-gray-800">Can I view the voting results in real-time?</summary>
                    <p class="text-gray-600 mt-2">Yes, results are updated in real-time to ensure transparency throughout the voting process.</p>
                </details>
                <details class="mb-4">
                    <summary class="font-semibold text-gray-800">What if I need help during the voting process?</summary>
                    <p class="text-gray-600 mt-2">Our support team is available 24/7 to assist you with any issues or questions.</p>
                </details>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <!-- <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Stay Informed</h3>
            <p class="text-gray-600 mb-4">Subscribe to our newsletter to receive updates on upcoming events and platform improvements.</p>
            <form class="max-w-md mx-auto">
                <div class="flex items-center border-b border-gray-300 py-2">
                    <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="email" placeholder="Enter your email address" aria-label="Email">
                    <button class="bg-primary hover-bg-primary text-white font-bold py-2 px-4 rounded" type="button">Subscribe</button>
                </div>
            </form>
        </div>
    </section> -->

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 VoteSecure. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>