<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dentists - Dental Clinic</title>
    <style>
        body{ background: #f4f7fb !important; color:#222; font-family: Arial, sans-serif; padding:20px }
        button{ background:#0b74da; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer }
        table{ width:100%; border-collapse:collapse }
        table th, table td{ padding:8px; border:1px solid #e6e6e6 }
        a button{ display:inline-block }
    </style>
</head>
<body>
    <header>
        <h1>Dentists</h1>
        <a href="/patients">← Back to Patients</a>
        <hr>
    </header>

    <main>
        <a href="/dentists/new"><button>+ Register New Dentist</button></a>
        <br><br>

        <table>
            <thead style="background:#f4f4f4"><tr><th>ID</th><th>Name</th><th>CPF</th><th>Phone</th><th>CIP</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach($dentists as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->cpf }}</td>
                    <td>{{ $d->phone }}</td>
                    <td>{{ $d->cip ?? '' }}</td>
                    <td>
                        <a href="/dentists/edit/{{ $d->id }}"><button>Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>
