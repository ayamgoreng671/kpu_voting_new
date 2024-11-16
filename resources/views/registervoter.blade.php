<!-- resources/views/register_voter.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register Voter</title>
</head>

<body>
    <h1>Register Voter</h1>
    <div>
        <input type="text" id="voterId" placeholder="Enter Voter ID" />
        <button onclick="registerVoter()">Register Voter</button>
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        async function registerVoter() {
            const voterId = document.getElementById('voterId').value;
            if (!voterId) {
                alert("Voter Id cannot be empty.");
                return;
            }

            try {
                const response = await fetch('/registervoter', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ name: voterId }),
                });

                console.log("mboh")
                // console.log(response.json())

                const data = await response.json();
                if (response.ok) {
                    alert(data.message);
                } else {
                    alert(data.error || 'Failed to register voter');
                    console.log(data.error);
                    
                }
            } catch (error) {
                console.error('Error registering voter:', error);
            }
        }
    </script>
</body>

</html>
