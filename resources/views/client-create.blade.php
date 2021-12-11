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
        <form action="/comp1230/assignments/assignment4/phpA4/public/clients" method="POST">

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
          <label for="company_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Company Name</label>
          <input type="text" class="border border-gray-400 p-2 w-full" name="company_name" id="company_name" value="{{ old('company_name') }}" required>
          @error('company_name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        
        <div class="mb-6">
          <label for="business_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Business Number</label>
          <input type="text" class="border border-gray-400 p-2 w-full" name="business_number" id="business_number" value="{{ old('business_number') }}" required>
          @error('business_number')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        
        <div class="mb-6">
          <label for="phone_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Phone Number</label>
          <input type="text" class="border border-gray-400 p-2 w-full" name="phone_number" id="phone_number" value="{{ old('phone_number') }}" required>
          @error('phone_number')
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
          <label for="carrier" class="block mb-2 uppercase font-bold text-xs text-gray-700">carrier</label>
          <select class="border border-gray-400 p-2 w-full" name="carrier" id="carrier"required>
            <option value="{{ old('carrier') }}">{{ old('carrier') }}</option>
            <option value="Rogers">Rogers</option>
            <option value="Bell Canada">Bell Canada</option>
            <option value="Bell Mobility">Bell Mobility</option>
            <option value="Fido">Fido</option>
            <option value="Telus">Telus</option>
            <option value="Koodo">Koodo </option>
            <option value="Virgin Mobile Canada">Virgin Mobile Canada</option>
            <option value="Chatr">Chatr</option>
            <option value="Microcell">Microcell</option>
            <option value="President’s Choice">President’s Choice</option>
            <option value="Solo Mobile">Solo Mobile</option>
            <option value="Sasktel">Sasktel</option>
          </select>
          @error('carrier')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        
        <div class="mb-6">
          <label for="hst_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">HST number</label>
          <input type="text" class="border border-gray-400 p-2 w-1/4" name="hst_number" id="hst_number" value="{{ old('hst_number') }}" >
          @error('hst_number')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        
        <div class="mb-6">
          <label for="website" class="block mb-2 uppercase font-bold text-xs text-gray-700">website</label>
          <input type="text" class="border border-gray-400 p-2 w-full" name="website" id="website"  placeholder="www.example-website.com" value="{{ old('website') }}">
          @error('website')
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
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6"><a href="/comp1230/assignments/assignment4/phpA4/public/clients" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Go Back</a></div>
</body>

</html>