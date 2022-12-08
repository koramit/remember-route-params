<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $medication->name }} - edit</title>
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
<h1 class="bold text-2xl">Edit - {{$medication->name}} </h1>
<hr>
@foreach ($errors->all() as $error)
    <p class="text-red-400">{{ $error }}</p>
@endforeach

@if(session()->has('message'))
    <p class="text-green-400">{{ session()->get('message') }}</p>
@endif

<form action="{{ route('medications.update', $medication) }}" method="post" class="space-y-4 mt-5">
    @method('patch')
    @csrf
    <div>
        <label for="hn">Name :</label>
        <input class="p-2 border" type="text" name="name" value="{{ old('name', $medication) }}">
    </div>

    <div>
        <label for="name">Dosage form :</label>
        <select name="dosage_form" class="p-2 border">
            @foreach($dosageForms as $dosageForm)
                <option value="{{ $dosageForm }}" @selected(old('dosage_form', $medication) == $dosageForm)>{{ $dosageForm }}</option>
            @endforeach
        </select>
    </div>

    <input class="mt-5 p-2 bg-blue-400 text-white bold" type="submit" value="update">
</form>
</body>
</html>
