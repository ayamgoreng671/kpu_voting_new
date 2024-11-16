<!-- resources/views/greeting.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greeting App</title>
</head>

<body>
    <h1>Greeting App</h1>
    <div>
        <h2 id="greeting">Loading...</h2>
        <input type="text" id="newGreeting" placeholder="Enter new greeting" />
        <button onclick="setGreeting()">Set Greeting</button>
    </div>

    <!-- CSRF Token for Laravel -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>
        // Fetch the CSRF token for POST requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        async function fetchGreeting() {
            try {
                const response = await fetch('/fetch-greeting');
                if (response.ok) {
                    const data = await response.json();
                    document.getElementById('greeting').innerText = data.greeting;
                } else {
                    console.error('Failed to fetch greeting:', response.statusText);
                }
            } catch (error) {
                console.error('Error fetching greeting:', error);
            }
        }

        async function setGreeting() {
            const newGreeting = document.getElementById('newGreeting').value;
            try {
                const response = await fetch('/set-greeting', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken, // CSRF token for Laravel
                    },
                    body: JSON.stringify({ newGreeting }),
                });
                if (response.ok) {
                    const data = await response.json();
                    alert(data.message);
                    fetchGreeting(); // Refresh the greeting after setting a new one
                } else {
                    console.error('Failed to set greeting:', response.statusText);
                }
            } catch (error) {
                console.error('Error setting greeting:', error);
            }
        }

        // Fetch the current greeting on page load
        window.onload = fetchGreeting;
    </script>
</body>

</html>
