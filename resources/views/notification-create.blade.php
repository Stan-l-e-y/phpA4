<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Manager</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto mt-10">
        <form action="/comp1230/assignments/assignment4/phpA4/public/notifications" method="POST">

          @csrf
        
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div> 

        <div class="mb-6">
          <label for="type" class="block mb-2 uppercase font-bold text-xs text-gray-700">type</label>
          <select class="border border-gray-400 p-2 w-full" name="type" id="type" required>
            <option value="{{ old('type') }}">{{ old('type') }}</option>
            <option value="SMS">SMS</option>
            <option value="Email">Email</option>
            <option value="Push">Push</option>
          </select>
          @error('type')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>


        <div class="mb-6">
            <label for="status" class="block mb-2 uppercase font-bold text-xs text-gray-700">status</label>
            <span class=" mr-1 uppercase font-bold text-xs text-green-500">Enabled</span><input type="radio" id="enabled" name="status" value="Enabled" {{ old('status') == 'Enabled' ? 'checked' : '' }} >
            <span class=" ml-5 mr-1 uppercase font-bold text-xs text-red-500">Disabled</span><input type="radio" id="Disabled" name="status" value="Disabled" {{ old('status') == 'Disabled' ? 'checked' : '' }}>
            @error('status')
              <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
          </div>
        
        <div class="mb-1">
            <button class="bg-blue-500 tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:shadow">Submit</button>
        </div>
        
        </form>
    </div>
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6"><a href="/comp1230/assignments/assignment4/phpA4/public/notifications" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Go Back</a></div>
</body>

</html>