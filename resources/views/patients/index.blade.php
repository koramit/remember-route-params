<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Patients</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="p-20">
    <h1 class="text-2xl bold">Patients Index</h1>
    <hr>
    <table class="table-auto mt-5">
        <thead>
        <tr>
            @foreach($fields as $field)
            <th class="border p-2 uppercase">{{ $field }}</th>
            @endforeach
            <th class="border p-2 uppercase"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($patients as $patient)
        <tr>
            @foreach($fields as $field)
            <td class="border py-2 px-4">{{ $patient->$field }}</td>
            @endforeach
            <td class="border py-2 px-4"><a class="underline italic text-blue-400" href="{{ route('patients.edit', $patient) }}">edit</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <hr>
    {!! $patients->links() !!}
</body>
</html>
