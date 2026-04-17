<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Dental Clinic</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <header>
        <h1>Dental Clinic Web</h1>
        <p>Status: System in Development (Phase 1)</p>
        <hr>
    </header>

    <main>
        <section>
            <h2>System Access</h2>
            <p>Restricted area for dentists and receptionists.</p>
            
            <form action="/patients" method="GET">
                <div>
                    <label for="email">E-mail: </label>
                    <input type="email" id="email" name="email" placeholder="example@clinic.com" required>
                </div>
                <br>
                <div>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" placeholder="Your access password" required>
                </div>
                <br>
                <button type="submit">Login</button>
            </form>
        </section>
    </main>

</body>
</html>