@if ($election->category_id == 1)
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <header class="bg-primary text-white p-3 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-20">
                <!-- Replace text with logo -->
                <a href="/">
                    <img src="{{ asset('logo/telkom.svg') }}" alt="Secure Voting Platform Logo" class=""
                        width="120">
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

            <!-- Election Results Summary -->
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Election Results Summary</h3>
                <div style="width: 70%; max-width: 600px;">
                    <canvas id="electionResultsChart" class="mt-3"></canvas>
                </div>
            </section>
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Election Results - Pie Chart</h3>
                <div style="width: 40%; max-width: 600px;">
                    <canvas id="pieChart" class="mt-3"></canvas>
                </div>
            </section>

            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Election Results - Doughnut Chart</h3>
                <div style="width: 40%; max-width: 600px;">
                    <canvas id="doughnutChart" class="mt-3"></canvas>
                </div>
            </section>


        </main>
        <input type="text" hidden value="{{ $election->id }}" id="tumbal">
        <footer class="bg-primary text-white p-3 text-center">
            <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
        </footer>
        <script>
            const voteChartCtx = document.getElementById('electionResultsChart').getContext('2d');
            const pieChartCtx = document.getElementById('pieChart').getContext('2d');
            const doughnutChartCtx = document.getElementById('doughnutChart').getContext('2d');

            const electionId = document.getElementById('tumbal').value;

            // Fetch the structured data
            fetch(`/admin/manage/${electionId}/analytics/data`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Inspect the structure of the response

                    // Validate and extract data
                    const candidates = data.candidates || {}; // Object mapping candidate IDs to names
                    const votes = Array.isArray(data.votes) ? data.votes : [];

                    // Calculate the vote counts for each candidate
                    const voteCounts = {};
                    votes.forEach(voteId => {
                        voteCounts[voteId] = (voteCounts[voteId] || 0) + 1;
                    });
                    console.log(voteCounts);

                    // Convert to arrays for chart labels and values
                    const labels = Object.keys(candidates).map(id => candidates[id]); // Candidate names
                    const values = Object.keys(candidates).map(id => voteCounts[id] || 0); // Votes per candidate
                    console.log(labels);
                    console.log(voteCounts);

                    // Generate colors dynamically
                    const colors = ['#B8292D', '#FFA07A', '#FFC0CB', '#FFD700', '#8B0000'];

                    // Bar Chart for Votes
                    new Chart(voteChartCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Total Votes'], // Single label to group all candidates in one bar chart
                            datasets: labels.map((label, index) => ({
                                label: label, // Candidate's name as the legend label
                                data: [values[index]], // Corresponding vote count
                                backgroundColor: colors[index], // Unique color for each candidate
                            }))
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true, // Enable the legend
                                    position: 'top', // Legend position
                                    labels: {
                                        font: {
                                            size: 12 // Adjust legend font size
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Votes'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Candidates'
                                    }
                                }
                            }
                        }
                    });



                    // Pie Chart
                    new Chart(pieChartCtx, {
                        type: 'pie',
                        data: {
                            labels: labels, // Candidate names
                            datasets: [{
                                label: 'Votes',
                                data: values,
                                backgroundColor: colors,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true
                                }
                            }
                        }
                    });

                    // Doughnut Chart
                    new Chart(doughnutChartCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels, // Candidate names
                            datasets: [{
                                label: 'Votes',
                                data: values,
                                backgroundColor: colors,
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching vote data:', error));
        </script>




    </x-app-layout>
@else
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <header class="bg-primary text-white p-3 shadow-lg">
            <div class="container mx-auto flex justify-between items-center px-20">
                <a href="/">
                    <img src="{{ asset('logo/telkom.svg') }}" alt="Secure Voting Platform Logo" width="120">
                </a>
                <nav class="flex">
                    <a href="{{ route('dashboard') }}" class="text-white hover:underline ml-4">Dashboard</a>
                    <a href="/profile" class="text-white hover:underline ml-4">Profile</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="text-white hover:underline ml-4">Logout</button>
                    </form>
                </nav>
            </div>
        </header>



        <main class="container mx-auto py-6 px-4 lg:px-0">

            <!-- Section for Classroom-based Charts -->
            <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                <h3 class="text-lg font-semibold text-gray-800">Classroom Election Results</h3>
                <p class="text-sm text-gray-600">Below are the voting results separated by classrooms:</p>
            </section>

            <div class="max-w-4xl mx-auto p-5" x-data="{ activeTab: 'X SIJA 1' }" id="ayam">
                <!-- Tab Navigation -->
                <div class="flex justify-center space-x-4 mb-5">

                </div>

                <div id="banteng">

                </div>
                {{-- <button @click="activeTab = 'All'" :class="activeTab === 'All' ? 'bg-[#B8292D] text-white' : 'bg-gray-200 text-gray-700'" class="py-2 px-4 rounded bg-gray-200 text-gray-700">
                    All
                    
                </button>
                <section class="tab-content" x-show="activeTab === 'All'" style="display: none;">
                    <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                    <h4 class="text-lg font-semibold text-gray-800">Classroom: All</h4>
                    <p class="text-sm text-gray-600">Voting results for candidates in All:</p>
                    <div style="width: 70%; max-width: 600px;">
                        <canvas id="classroomChart-All" class="mt-3" style="display: block; box-sizing: border-box; height: 257px; width: 514px;" width="514" height="257"></canvas>
                    </div>
                                            <h4 class="text-lg font-semibold text-gray-800">Classroom: All</h4>
                    <p class="text-sm text-gray-600">Voting results for candidates in All:</p>
                    <div style="width: 70%; max-width: 600px;">
                        <canvas id="classroomChart2-All" class="mt-3" style="display: block; box-sizing: border-box; height: 515px; width: 515px;" width="515" height="515"></canvas>
                    </div>
                                            <h4 class="text-lg font-semibold text-gray-800">Classroom: All</h4>
                    <p class="text-sm text-gray-600">Voting results for candidates in All:</p>
                    <div style="width: 70%; max-width: 600px;">
                        <canvas id="classroomChart3-All" class="mt-3" style="display: block; box-sizing: border-box; height: 515px; width: 515px;" width="515" height="515"></canvas>
                    </div>
                    </section>
                </section> --}}
            <!-- Dynamic Classroom Sections -->
            <div id="classroomSections" class="space-y-6">
                <!-- Dynamic classroom-specific sections will be inserted here -->
            </div>
        </main>

        <input type="hidden" value="{{ $election->id }}" id="electionId">
        <footer class="bg-primary text-white p-3 text-center">
            <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
        </footer>

        <script>
            const electionId = document.getElementById('electionId').value;

            // Fetch structured data
            fetch(`/admin/manage/${electionId}/analytics/data`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Check data structure
                    let bebek = [];
                    let harimau = [];

                    const classroomSections = document.getElementById('classroomSections');
                    const ayam = document.getElementById('ayam');
                    const div = document.createElement('div');
                    bebek.push(`<div class="grid grid-cols-4 gap-4">`);
                    div.className = "bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto";
                    // Loop through classrooms and render sections
                    for (const [classroomName, candidates] of Object.entries(data.classrooms)) {
                        // Prepare data for Chart.js
                        const labels = candidates.map(candidate => candidate.name);
                        const candidateIds = candidates.map(candidate => candidate.id);
                        const votes = data.votes;

                        // Calculate vote counts for this classroom's candidates
                        const voteCounts = candidateIds.map(candidateId =>
                            votes.filter(vote => vote === candidateId).length
                        );

                        // Generate colors dynamically
                        const colors = ['#B8292D', '#FFA07A', '#FFC0CB', '#FFD700', '#8B0000'];


                        bebek.push(`                    <button 
                        @click="activeTab = '${classroomName}'" 
                        :class="activeTab === '${classroomName}' ? 'bg-[#B8292D] text-white' : 'bg-gray-200 text-gray-700'" 
                        class="py-2 px-4 rounded">
                        ${classroomName}
                        
                    </button>`);
  
                    }

                    bebek.push(`</div>`);
                    const kuda = bebek.join(" ");
                    console.log(kuda);

                    div.innerHTML = kuda;
                    ayam.appendChild(div);
                    for (const [classroomName, candidates] of Object.entries(data.classrooms)) {
                        // Prepare data for Chart.js
                        const labels = candidates.map(candidate => candidate.name);
                        const candidateIds = candidates.map(candidate => candidate.id);
                        const votes = data.votes;

                        // Calculate vote counts for this classroom's candidates
                        const voteCounts = candidateIds.map(candidateId =>
                            votes.filter(vote => vote === candidateId).length
                        );

                        // Generate colors dynamically
                        const colors = ['#B8292D', '#FFA07A', '#FFC0CB', '#FFD700', '#8B0000'];


                        bebek.push(`                    <button 
                        @click="activeTab = '${classroomName}'" 
                        :class="activeTab === '${classroomName}' ? 'bg-[#B8292D] text-white' : 'bg-gray-200 text-gray-700'" 
                        class="py-2 px-4 rounded">
                        ${classroomName}
                        
                    </button>`);
                        // Create a new section for this classroom
                        const section = document.createElement('section');
                        section.className = "tab-content";
                        section.setAttribute('x-show', `activeTab === '${classroomName}'`);
                        section.innerHTML = `
                        <section class = "bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
                        <h4 class="text-lg font-semibold text-gray-800">Classroom: ${classroomName}</h4>
                        <p class="text-sm text-gray-600">Voting results for candidates in ${classroomName}:</p>
                        <div style="width: 70%; max-width: 600px;">
                            <canvas id="classroomChart-${classroomName}" class="mt-3"></canvas>
                        </div>
                                                <h4 class="text-lg font-semibold text-gray-800">Classroom: ${classroomName}</h4>
                        <p class="text-sm text-gray-600">Voting results for candidates in ${classroomName}:</p>
                        <div style="width: 70%; max-width: 600px;">
                            <canvas id="classroomChart2-${classroomName}" class="mt-3"></canvas>
                        </div>
                                                <h4 class="text-lg font-semibold text-gray-800">Classroom: ${classroomName}</h4>
                        <p class="text-sm text-gray-600">Voting results for candidates in ${classroomName}:</p>
                        <div style="width: 70%; max-width: 600px;">
                            <canvas id="classroomChart3-${classroomName}" class="mt-3"></canvas>
                        </div>
                        </section>
                    `;



                        
                        ayam.appendChild(section);

                        // Render the chart for this classroom
                        const ctx = document.getElementById(`classroomChart-${classroomName}`).getContext('2d');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels, // Candidate names
                                datasets: [{
                                    label: `Votes for Classroom ${classroomName}`,
                                    data: voteCounts, // Corresponding vote counts
                                    backgroundColor: colors.slice(0, labels.length),
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top',
                                    },
                                    title: {
                                        display: true,
                                        text: `Classroom ${classroomName} Voting Results`,
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        title: {
                                            display: true,
                                            text: 'Votes'
                                        }
                                    },
                                    x: {
                                        title: {
                                            display: true,
                                            text: 'Candidates'
                                        }
                                    }
                                }
                            }
                        });

                        const ctx2 = document.getElementById(`classroomChart2-${classroomName}`).getContext('2d');

                        // Pie Chart
                        new Chart(ctx2, {
                            type: 'pie',
                            data: {
                                labels: labels, // Candidate names
                                datasets: [{
                                    label: 'Votes',
                                    data: voteCounts,
                                    backgroundColor: colors,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: true
                                    }
                                }
                            }
                        });
                        const ctx3 = document.getElementById(`classroomChart3-${classroomName}`).getContext('2d');

                        // Doughnut Chart
                        new Chart(ctx3, {
                            type: 'doughnut',
                            data: {
                                labels: labels, // Candidate names
                                datasets: [{
                                    label: 'Votes',
                                    data: voteCounts,
                                    backgroundColor: colors,
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        display: true
                                    }
                                }
                            }
                        });
                    }
                    // console.log(bebek);

                })
                .catch(error => console.error('Error fetching vote data:', error));
        </script>
    </x-app-layout>





@endif
