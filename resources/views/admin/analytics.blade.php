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
                <img src="{{ asset('logo/telkom.svg') }}" alt="Secure Voting Platform Logo" class="" width="120">
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

        {{-- <!-- Voter Turnout by Region -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h2 class="text-xl font-bold text-gray-800">Voter Turnout by Region</h2>
            <div style="width: 70%; max-width: 600px;">
                <canvas id="voterTurnoutChart" class="mt-3"></canvas>
            </div>
        </section>

        <!-- Participation Trends Over Time -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Participation Trends Over Time</h3>
            <div style="width: 70%; max-width: 600px;">
                <canvas id="participationTrendsChart" class="mt-3"></canvas>
            </div>
        </section>



        <!-- Voter Demographics -->
        <section class="bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-800">Voter Demographics</h3>
            <div style="width: 40%; max-width: 600px;">
                <canvas id="voterDemographicsChart" class="mt-3"></canvas>
            </div>
        </section> --}}
    </main>
    <input type="text" hidden value="{{ $election->id }}" id="tumbal">
    <footer class="bg-primary text-white p-3 text-center">
        <p class="text-sm">&copy; 2024 Secure Voting Platform. All rights reserved.</p>
    </footer>
    <script>
        const voteChartCtx = document.getElementById('electionResultsChart').getContext('2d');
        const voterTurnoutCtx = document.getElementById('voterTurnoutChart').getContext('2d');
        const participationTrendsCtx = document.getElementById('participationTrendsChart').getContext('2d');
        const pieChartCtx = document.getElementById('pieChart').getContext('2d');
        const doughnutChartCtx = document.getElementById('doughnutChart').getContext('2d');

        const duarrr = document.getElementById('tumbal').value;
        // Fetch the raw data (array of candidate IDs)
        fetch(`/admin/manage/${duarrr}/analytics/data`)
            .then(response => response.json())
            .then(data => {
                // Count the occurrences of each candidate ID
                const voteCounts = data.reduce((acc, candidateId) => {
                    acc[candidateId] = (acc[candidateId] || 0) + 1;
                    return acc;
                }, {});

                // Convert the object to arrays for labels and values
                const labels = Object.keys(voteCounts); // Candidate IDs
                const values = Object.values(voteCounts); // Vote counts

                // Generate colors dynamically
                const colors = ['#B8292D', '#FFA07A', '#FFC0CB', '#FFD700', '#8B0000'];

                // Bar Chart for Votes
                new Chart(voteChartCtx, {
                    type: 'bar',
                    data: {
                        labels: labels.map(id => `Candidate ${id}`),
                        datasets: [{
                            label: 'Total Votes',
                            data: values,
                            backgroundColor: colors,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
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
                        labels: labels.map(id => `Candidate ${id}`),
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
                        labels: labels.map(id => `Candidate ${id}`),
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

                // Example Data for Voter Turnout and Participation Trends
                const turnoutData = [1200, 900, 1300, 1600]; // Example voter turnout
                const trendsData = [400, 700, 1000, 1200]; // Example trends over time

                // Bar Chart for Voter Turnout
                new Chart(voterTurnoutCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Region A', 'Region B', 'Region C', 'Region D'],
                        datasets: [{
                            label: 'Voter Turnout',
                            data: turnoutData,
                            backgroundColor: '#B8292D',
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Voters'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Region'
                                }
                            }
                        }
                    }
                });

                // Line Chart for Participation Trends
                new Chart(participationTrendsCtx, {
                    type: 'line',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'Participation',
                            data: trendsData,
                            backgroundColor: '#B8292D',
                            borderColor: '#B8292D',
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Participants'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Week'
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching vote data:', error));
    </script>


</x-app-layout>
