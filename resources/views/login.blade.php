
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen mt-10">
    <div class="flex items-center justify-between md:flex-col">

        <div class="max-w-lg mx-auto bg-gray-100 p-6  rounded-xl border border-gray-200">
            <h1 class="text-center font-bold text-xl">Log In</h1>
            <form action="/comp1230/assignments/assignment4/phpA4/public/login" method="POST" class="mt-10">

                @csrf

                <div class="mb-6">
                  <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                  <input type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" value="{{ old('username','Leonardo') }}" required>
                  @error('username')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
 
                
                <div class="mb-6">
                  <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
                  <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" value='password'required>
                  @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-1">
                    <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:shadow">Log In</button>
                </div>
                
            </form>
        </div>
    </div>
    @if (session()->has('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show" class="fixed bottom-5 right-5 bg-blue-500 py-2 px-4 rounded-xl text-sm">
          <p>{{ session('success') }}</p>
          
        </div>
    @elseif (session()->has('error'))    
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show" class="fixed bottom-5 right-5 bg-red-500 py-2 px-4 rounded-xl text-sm">
      <p>{{ session('error') }}</p>
      
    </div>
    @endif
</body>

</html>
