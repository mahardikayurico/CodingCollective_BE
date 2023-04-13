<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <main class="content">
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left text-gray-500 font-family-quicksand dark:text-gray-400">
                <thead class="text-xs text-[#98949E] font-family-quicksand bg-[#FAFAFA] dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>FullName</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Education</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex flex-row justify-between">
                                <h1>Birthday</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Experience</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Last Position</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Applied Position</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Skills</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Email</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Phone</h1>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3 ">
                            <div class="flex flex-row justify-between">
                                <h1>Action</h1>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $key => $candidate)
                    <tr class="bg-white border-b font-family-quicksand dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap dark:text-white">
                            {{ $candidate->name }}
                        </th>
                        <td class="px-6 py-4 ">{{ $candidate->education }}</td>
                        <td class="px-6 py-4">{{ $candidate->birthday }}</td>
                        <td class="px-6 py-4">{{ $candidate->experience}}</td>
                        <td class="px-6 py-4 ">
                            {{ $candidate->last_position }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $candidate->applied_position }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $candidate->top_5_skills }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $candidate->email }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $candidate->phone }}
                        </td>
                        <td class="px-6 py-4 flex flex-row justify-between ">
                            <div class="icon">
                                <a href="{{ route('candidates.edit', $candidate->id) }}"><i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="icon">
                                <form action="{{ route('candidates.destroy', $candidate->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash-alt text-red-600"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>

</body>

</html>
