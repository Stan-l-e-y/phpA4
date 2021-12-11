<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen mt-10">
    <div class="flex items-center justify-between md:flex-col">
        <div class="flex h-28 md:w-1/6 self-end">
            @auth
            <div class="mr-5 ">Welcome, <span class="font-bold">{{ auth()->user()->first_name }}</span></div>
            <div>
                <form action="/comp1230/assignments/assignment4/phpA4/public/logout" method="POST" class="font-semibold text-blue-500">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
            @endauth
        </div>
        <div class="mb-1/12 font-bold text-xl">Navigation Bar</div>
        <div class="bg-gray-500 bg-opacity-25 flex flex-col h-auto items-center w-1/6 rounded-md border-solid border-gray-400 border-2 mb-10">
            <a href="/comp1230/assignments/assignment4/phpA4/public/clients" class="bg-blue-500 hover:bg-blue-700 px-10 text-white font-bold py-2 rounded mt-10">Client Manager</a>
            <a href="/comp1230/assignments/assignment4/phpA4/public/notifications" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ">Notification Manager</a>
            <a href="/comp1230/assignments/assignment4/phpA4/public/clientnotifications" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10 ">Client Event Manager</a>
            <a href="/comp1230/assignments/assignment4/phpA4/public/users" class="bg-blue-500 font-bold hover:bg-blue-700 mt-10 px-4 py-2 rounded text-center text-white ">Emplyoee Manager  </a>
            <a href="/comp1230/assignments/assignment4/phpA4/public/logs" class="bg-blue-500 font-bold hover:bg-blue-700 mb-10 mt-10 px-4 py-2 rounded text-center text-white w-1/2">View log file</a>
        </div>
    </div>

    @if (session()->has('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show" class="fixed bottom-5 right-5 bg-blue-500 py-2 px-4 rounded-xl text-sm">
          <p>{{ session('success') }}</p>
          
        </div>
      @endif
</body>

</html>