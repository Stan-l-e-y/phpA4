
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
            <form action="/comp1230/assignments/assignment4/phpA4/public/users" method="POST" class="mt-10" enctype="multipart/form-data">

                @csrf

                <div class="mb-6">
                  <label for="first_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">First Name</label>
                  <input type="text" class="border border-gray-400 p-2 w-full" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
                  @error('first_name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-6">
                  <label for="last_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Last Name</label>
                  <input type="text" class="border border-gray-400 p-2 w-full" name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                  @error('last_name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-6">
                  <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                  <input type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" value="{{ old('username') }}" required>
                  @error('username')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="mb-6">
                  <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
                  <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" value="{{ old('email') }}" required>
                  @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-6">
                  <label for="picture" class="block mb-2 uppercase font-bold text-xs text-gray-700">Profile Picture</label>
                  <input type="file" class="border border-gray-400 p-2 w-full" name="picture" id="picture"  >
                  @error('picture')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-6">
                    <label for="cell_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Cell Number</label>
                    <input type="text" class="border border-gray-400 p-2 w-full" name="cell_number" id="cell_number" value="{{ old('cell_number') }}" required>
                    @error('cell_number')
                      <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>

                <div class="mb-6">
                  <label for="position" class="block mb-2 uppercase font-bold text-xs text-gray-700">position</label>
                  <select class="border border-gray-400 p-2 w-full" name="position" id="position" required>
                    <option value="{{ old('position') }}">{{ old('position') }}</option>
                    <option value="Manager">Manager</option>
                    <option value="Senior Accountant">Senior Accountant</option>
                    <option value="Junior Accountant">Junior Accountant</option>
                    <option value="Chartered Accountant">Chartered Accountant</option>
                    <option value="Book Keeper">Book Keeper</option>
                  </select>
                  @error('position')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                
                <div class="mb-6">
                  <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
                  <input type="password" class="border border-gray-400 p-2 w-full" name="password" id="password" required>
                  @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-6">
                  <label for="status" class="block mb-2 uppercase font-bold text-xs text-gray-700">status</label>
                  <span class=" mr-1 uppercase font-bold text-xs text-green-500">Active</span><input type="radio" id="active" name="status" value="Active" {{ old('status') == 'Active' ? 'checked' : '' }} >
                  <span class=" ml-5 mr-1 uppercase font-bold text-xs text-red-500">Inactive</span><input type="radio" id="inactive" name="status" value="Inactive" {{ old('status') == 'Inactive' ? 'checked' : '' }}>
                  @error('status')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>

                <div class="mb-1">
                    <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:shadow">Submit</button>
                </div>
                
            </form>
        </div>
        <div class="mb-10 mt-10 mx-auto w-56"><a href="/comp1230/assignments/assignment4/phpA4/public/users" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Go Back</a></div>
    </div>
    @if (session()->has('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show" class="fixed bottom-5 right-5 bg-blue-500 py-2 px-4 rounded-xl text-sm">
          <p>{{ session('success') }}</p>
          
        </div>
      @endif
</body>
<footer>
  <script src=https://my.gblearn.com/js/loadscript.js></script>
</footer>

</html>
