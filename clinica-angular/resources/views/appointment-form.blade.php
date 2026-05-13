<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $appointment ? 'Edit' : 'New' }} Appointment</title>
    <style>body{font-family:Arial,Helvetica,sans-serif;padding:20px} input,select{padding:6px;margin:4px}</style>
    <style>
        body{ background: #f4f7fb !important; color:#222; }
        button{ background:#0b74da; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer }
        button:hover{ opacity:0.92 }
        input, select{ border:1px solid #dcdcdc; padding:6px; border-radius:4px }
    </style>
</head>
<body>
    <header>
        <h1>{{ $appointment ? 'Edit Appointment' : 'Schedule Appointment' }}</h1>
        <a href="/appointments">← Back to appointments</a>
        <hr>
    </header>

    <main>
        <form action="{{ $appointment ? '/appointments/update/'.$appointment->id : '/appointments/save' }}" method="POST">
            @csrf
            <label>Patient ID</label><br>
            <select name="patient_id" required>
                <option value="">-- select patient --</option>
                @foreach(($patients ?? []) as $p)
                    <option value="{{ $p->id }}" {{ (old('patient_id', request()->get('patient_id') ?? ($appointment ? $appointment->patient_id : '')) == $p->id) ? 'selected' : '' }}>{{ $p->name }}</option>
                @endforeach
            </select><br>

            <label>Dentist ID</label><br>
            <select name="dentist_id" required>
                <option value="">-- select dentist --</option>
                @foreach(($dentists ?? []) as $d)
                    <option value="{{ $d->id }}" {{ (old('dentist_id', $appointment ? $appointment->dentist_id : '') == $d->id) ? 'selected' : '' }}>{{ $d->name }}</option>
                @endforeach
            </select><br>

            <label>Date & Time</label><br>
            <input name="date_time" type="datetime-local" required value="{{ $appointment ? \Carbon\Carbon::parse($appointment->date_time)->format('Y-m-d\TH:i') : '' }}" /><br>

            <label>Status</label><br>
            <select name="status">
                <option value="scheduled" {{ ($appointment && $appointment->status=='scheduled') ? 'selected' : '' }}>Scheduled</option>
                <option value="confirmed" {{ ($appointment && $appointment->status=='confirmed') ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ ($appointment && $appointment->status=='cancelled') ? 'selected' : '' }}>Cancelled</option>
            </select>

            <br>
            <button type="submit">{{ $appointment ? 'Update' : 'Create' }}</button>
        </form>
    </main>
</body>
</html>
