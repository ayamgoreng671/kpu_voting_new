<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting App</title>
</head>

<body>
    <h1>Voting App</h1>

    <div>
        <h2 id="voteStatus">Checking vote status...</h2>
        <input type="text" id="voterId" placeholder="Enter your Voter ID" />
        <input type="number" id="candidateId" placeholder="Enter Candidate ID" />
        <button onclick="castVote()">Vote</button>
    </div>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        async function castVote() {
            const voterId = document.getElementById('voterId').value;
            const candidateId = document.getElementById('candidateId').value;

            try {
                const response = await fetch('/vote', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        voterId,
                        candidateId
                    }),
                });
                console.log("ayam");
                if (response.ok) {
                    const data = await response.json();
                    console.log("bebek");

                    alert(data.message);
                    getVoteStatus();
                } else {
                    console.error('Failed to cast vote:', response.statusText);
                }
            } catch (error) {
                console.error('Error casting vote:', error);
            }
        }
    </script>
</body>

</html>
