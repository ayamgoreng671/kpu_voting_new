<!-- resources/views/candidates.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Candidates List</title>
</head>

<body>
    <h1>Candidates</h1>
    <div>
        <h2>Add a New Candidate</h2>
        <input type="text" id="candidateName" placeholder="Enter candidate name" />
        <button onclick="addCandidate()">Add Candidate</button>
    </div>
    <ul id="candidateList">Loading candidates...</ul>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        async function addCandidate() {
            const candidateName = document.getElementById('candidateName').value;
            if (!candidateName) {
                alert("Candidate name cannot be empty.");
                return;
            }

            try {
                const response = await fetch('/addcandidate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken, // CSRF token for Laravel
                    },
                    body: JSON.stringify({
                        name: candidateName
                    }),
                });

                if (response.ok) {
                    const data = await response.json();
                    alert(data.message);
                    fetchCandidates();
                } else {
                    console.error('Failed to add candidate:', response.statusText);
                }
            } catch (error) {
                console.error('Error adding candidate:', error);
            }
        }
        async function fetchCandidates() {
            try {
                const response = await fetch('/fetch-candidates');
                if (response.ok) {
                    const candidates = await response.json();
                    const list = document.getElementById('candidateList');
                    list.innerHTML = ''; // Clear previous content

                    candidates.forEach(candidate => {
                        const listItem = document.createElement('li');
                        listItem.textContent =
                            `ID: ${candidate.id}, Name: ${candidate.name}, Votes: ${candidate.voteCount}`;
                        list.appendChild(listItem);
                    });
                    console.log("fetch");
                } else {
                    console.error('Failed to fetch candidates:', response.statusText);
                }
            } catch (error) {
                console.error('Error fetching candidates:', error);
            }
        }

        // Fetch the candidates on page load
        window.onload = fetchCandidates;
    </script>
</body>

</html>
