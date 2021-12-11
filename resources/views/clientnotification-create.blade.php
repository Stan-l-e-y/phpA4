<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto mt-10">
        <form action="/comp1230/assignments/assignment4/phpA4/public/clientnotifications" method="POST">

          @csrf
        
        <div class="mb-6">
            <label for="client_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Client ID</label>
            <input type="text" class="border border-gray-400 p-2 w-full" name="client_id" id="client_id" value="{{ old('client_id') }}" required>
            @error('client_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="notification_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Notification ID</label>
            <input type="text" class="border border-gray-400 p-2 w-full" name="notification_id" id="notification_id" value="{{ old('notification_id') }}" required>
            @error('notification_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
          <label for="start_time" class="block mb-2 uppercase font-bold text-xs text-gray-700">Start time</label>
          <input class="border border-gray-400 p-2 w-full" type="datetime-local" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
          @error('start_time')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-6">
          <label for="frequency" class="block mb-2 uppercase font-bold text-xs text-gray-700">frequency</label>
          <input type="text" class="border border-gray-400 p-2 w-full" name="frequency" id="frequency" value="{{ old('frequency') }}" required>
          @error('frequency')
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
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6"><a href="/comp1230/assignments/assignment4/phpA4/public/clientnotifications" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Go Back</a></div>
</body>

</html>