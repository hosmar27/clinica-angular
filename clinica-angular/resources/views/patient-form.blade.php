<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $patient ? 'Edit' : 'New' }} Patient - Clinic</title>
    <style>
        body{ background: #f4f7fb !important; color:#222; }
        button{ background:#0b74da; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer }
        button:hover{ opacity:0.92 }
        input, select{ border:1px solid #dcdcdc; padding:6px; border-radius:4px }
    </style>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">

    <header>
        <h1>{{ $patient ? 'Edit Patient' : 'Register New Patient' }}</h1>
        <a href="/patients">← Back to list</a>
        <hr>
    </header>

    <main>
        <form action="{{ $patient ? '/patients/update/'.$patient->id : '/patients/save' }}" method="POST">
            @csrf

            <div>
                <label>Full Name:</label><br>
                <input type="text" name="name" value="{{ $patient ? $patient->name : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>
            <div>
                <label>CPF / SSN:</label><br>
                <input type="text" name="cpf" value="{{ $patient ? $patient->cpf : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>
            <div>
                <label>Phone:</label><br>
                <input type="text" name="phone" value="{{ $patient ? $patient->phone : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>
            <div>
                <label>Birth Date:</label><br>
                <input type="date" name="birth_date" value="{{ $patient ? $patient->birth_date : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>

            <button type="submit" style="padding: 10px 20px; font-weight: bold;">
                {{ $patient ? 'Update Data' : 'Save Patient' }}
            </button>
        </form>
    </main>

</body>
</html>
