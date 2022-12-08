<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $patient->name }} - Medications</title>
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
<h1 class="bold text-2xl">Medications - HN {{$patient->hn}} {{$patient->name}} </h1>
<hr>
@foreach ($errors->all() as $error)
    <p class="text-red-400">{{ $error }}</p>
@endforeach

@if(session()->has('message'))
    <p class="text-green-400">{{ session()->get('message') }}</p>
@endif

@foreach($patient->medications()->whereNull('date_stop')->orderBy('date_start')->get() as $med)
    <form
        action="{{ route('patients.medications.update', $med)  }}"
        method="POST"
        class="flex items-center px-4 py-2 border border-teal-400 rounded-lg my-2 hover:bg-gray-100"
    >
        @method('patch')
        @csrf
        <p class="w-4/6">{{ $med->medication->name }}</p>
        <p class="w-1/6 italic text-teal-600">since: {{ $med->date_start->format('M d Y')  }}</p>
        <button
            class="w-1/6 px-2 py-1 rounded bg-red-400 text-white"
            type="submit"
        >Off</button>
    </form>
@endforeach
</body>
</html>
