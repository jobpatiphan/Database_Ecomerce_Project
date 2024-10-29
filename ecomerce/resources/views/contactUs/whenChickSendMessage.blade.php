<x-app-layout>
    <x-slot name="header">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Foot Collection</title>
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            @vite('resources/css/app.css')
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js"></script>
        </head>
    </x-slot>

    <title>Done</title>
    <style>
        .done-circle {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background-color: #c2f0c2;
            /* Light green color */
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 50px;
            font-weight: bold;
            color: #333;
            /* Dark green text color */
            margin: auto;
            /* Center the circle */
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full viewport height */
        }
    </style>

    <div class="container">
        <div class="done-circle">DONE</div>
    </div>
</x-app-layout>
