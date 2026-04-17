<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patients - Dental Clinic</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <header>
        <h1>Dental Clinic Web</h1>
        <p>Logged in as: <strong>Admin Dentist</strong> | <a href="/login">Logout</a></p>
        <hr>
    </header>

    <main>
        <section>
            <h2>Patient Management</h2>
            
            <a href="/patients/new">
                <button type="button" style="padding: 10px; cursor: pointer;">+ Register New Patient</button>
            </a>
            <br><br>

            <table border="1" cellPadding="10" style="width: 100%; text-align: left; border-collapse: collapse;">
                <thead style="background-color: #f4f4f4;">
                    <tr>
                        <th>ID</th>
                        <th>Patient Name</th>
                        <th>CPF / SSN</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                    <tr>
                        <td>{{ $patient->id }}</td>
                        <td>{{ $patient->name }}</td>
                        <td>{{ $patient->cpf }}</td>
                        <td>{{ $patient->phone }}</td>
                        <td>
                            <a href="/patients/edit/{{ $patient->id }}">
                                <button type="button">Edit</button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>

</body>
</html>