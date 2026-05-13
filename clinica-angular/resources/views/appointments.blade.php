<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Appointments - Clinic</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;padding:20px} input,select{padding:6px;margin:4px}</style>
    <style>
        body{ background: #f4f7fb !important; color:#222; }
        button{ background:#0b74da; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer }
        button:hover{ opacity:0.92 }
        input, select{ border:1px solid #dcdcdc; padding:6px; border-radius:4px }
        table th, table td{ padding:8px }
    </style>
</head>
<body>
    <header>
        <h1>Appointments</h1>
        <a href="/patients">← Back to Patients</a>
        <hr>
    </header>

    <main>
        <section>
            <h2>All Appointments</h2>
            <table border="1" cellpadding="8" style="border-collapse:collapse;width:100%">
                <thead style="background:#f4f4f4"><tr><th>ID</th><th>Patient</th><th>Dentist</th><th>Date Time</th><th>Status</th><th>Actions</th></tr></thead>
                <tbody>
                    @foreach($appointments as $a)
                    <tr>
                        <td>{{ $a->id }}</td>
                        <td>{{ $a->patient_id }}</td>
                        <td>{{ $a->dentist_id }}</td>
                        <td>{{ $a->date_time }}</td>
                        <td>{{ $a->status }}</td>
                        <td>
                            <a href="/appointments/edit/{{ $a->id }}"><button type="button">Edit</button></a>
                            <form action="/appointments/delete/{{ $a->id }}" method="POST" style="display:inline">
                                @csrf
                                <button type="submit" onclick="return confirm('Delete appointment #{{ $a->id }}?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
