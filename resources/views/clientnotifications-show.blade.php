<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex flex-row">
      <div class="mt-10 ml-5"><a href="/comp1230/assignments/assignment4/phpA4/public/clientnotifications/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-10">Add Client Event</a></div>
      <div class="mt-10 ml-5"><a href="/comp1230/assignments/assignment4/phpA4/public/navigation" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mt-10">Go Back</a></div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Client ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Notification ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Start Time
                      </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Frequency
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                      Status
                    </th>
                    
                    <th scope="col" class="relative px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($clientnotifications as $clientnotification)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $clientnotification->client_id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{ $clientnotification->notification_id }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $clientnotification->start_time }}</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $clientnotification->frequency }}</div>
                      </td>
                     
                    @if ($clientnotification->status == "Active")
                        
                      
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 ">
                        {{ $clientnotification->status }}
                      </span>
                    </td>

                    @elseif ($clientnotification->status == "Inactive")

                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-400 ">
                          {{ $clientnotification->status }}
                        </span>
                      </td>

                    @endif
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="/comp1230/assignments/assignment4/phpA4/public/clientnotifications/{{ $clientnotification->id }}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                  </tr>
                  
                  @endforeach
                  <!-- More people... -->
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      @if (session()->has('success'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 8000)" x-show="show" class="fixed bottom-5 right-5 bg-blue-500 py-2 px-4 rounded-xl text-sm">
          <p>{{ session('success') }}</p>
          
        </div>
      @endif

</body>

</html>