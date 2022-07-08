<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $patient->name }} - edit</title>
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
    <h1 class="bold text-2xl">Edit - {{$patient->name}} <a class="text-sm font-thin underline italic text-blue-400 ml-12" href="{{ route('patients') }}">back</a></h1>
    <hr>
    @foreach ($errors->all() as $error)
    <p class="text-red-400">{{ $error }}</p>
    @endforeach

    <form action="{{ route('patients.update', $patient) }}" method="post" class="space-y-4 mt-5">
        @method('patch')
        @csrf
        <div>
            <label for="hn">HN :</label>
            <input class="p-2 border" type="text" name="hn" value="{{ old('hn', $patient) }}">
        </div>

        <div>
            <label for="name">NAME :</label>
            <input class="p-2 border" type="text" name="name" value="{{ old('name', $patient) }}">
        </div>

        <div>
            <label for="name">GENDER :</label>
            <label for=""><input class="p-2 border" type="radio" name="gender" @checked(old('gender', $patient) === 'male') value="male">male</label>
            <label for=""><input class="p-2 border" type="radio" name="gender" @checked(old('gender', $patient) === 'female') value="female">female</label>
        </div>

        <div>
            <label for="dob">DOB :</label>
            <input class="p-2 border" type="date" name="dob" value="{{ old('dob') ?? $patient->dob->format('Y-m-d') }}">
        </div>

        <div class="flex items-center">
            <label for="address">address :</label>
            <textarea class="p-2 border" name="address" id="address" cols="50" rows="2">{{ old('address', $patient) }}</textarea>
        </div>

        <div>
            <label for="tel_no">tel_no :</label>
            <input class="p-2 border" type="text" name="tel_no" value="{{ old('tel_no', $patient) }}">
        </div>

        <input class="mt-5 p-2 bg-blue-400 text-white bold" type="submit" value="update">
    </form>
</body>
</html>