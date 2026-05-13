<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $dentist ? 'Edit' : 'New' }} Dentist - Clinic</title>
    <style>
        body{ background: #f4f7fb !important; color:#222; font-family: Arial, sans-serif; padding:20px }
        button{ background:#0b74da; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer }
        input{ border:1px solid #dcdcdc; padding:6px; border-radius:4px }
    </style>
</head>
<body>
    <header>
        <h1>{{ $dentist ? 'Edit Dentist' : 'Register New Dentist' }}</h1>
        <a href="/dentists">← Back to list</a>
        <hr>
    </header>

    <main>
        <form action="{{ $dentist ? '/dentists/update/'.$dentist->id : '/dentists/save' }}" method="POST">
            @csrf
            <div>
                <label>Full Name:</label><br>
                <input type="text" name="name" value="{{ $dentist ? $dentist->name : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>
            <div>
                <label>CPF / SSN:</label><br>
                <input type="text" name="cpf" value="{{ $dentist ? $dentist->cpf : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>
            <div>
                <label>Phone:</label><br>
                <input type="text" name="phone" value="{{ $dentist ? $dentist->phone : '' }}" required style="width: 300px; padding: 5px;">
            </div>
            <br>
            <div>
                <label>CIP:</label><br>
                <input type="text" name="cip" value="{{ $dentist ? $dentist->cip : '' }}" style="width: 300px; padding: 5px;">
            </div>
            <br>
            <button type="submit" style="padding: 10px 20px; font-weight: bold;">{{ $dentist ? 'Update' : 'Save Dentist' }}</button>
        </form>
    </main>

</body>
</html>
