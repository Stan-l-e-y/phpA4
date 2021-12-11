<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
  {{-- <script src="jquery-3.5.1.min.js"></script> --}}
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <form action="/comp1230/assignments/assignment4/phpA4/public/clients/{{ $client->id }}" method="POST">
    
        @method('PATCH')
        @csrf

        <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto mt-10">         
            <div class="mb-6">
                <label for="first_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">First Name</label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="first_name" id="first_name" value="{{ old('first_name',$client->first_name) }}" required>
                @error('first_name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
              <label for="last_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Last Name</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="last_name" id="last_name" value="{{ old('last_name',$client->last_name) }}" required>
              @error('last_name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
    
            <div class="mb-6">
              <label for="company_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Company Name</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="company_name" id="company_name" value="{{ old('company_name',$client->company_name) }}" required>
              @error('company_name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-6">
              <label for="business_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Business Number</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="business_number" id="business_number" value="{{ old('business_number',$client->business_number) }}" required>
              @error('business_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-6">
              <label for="phone_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Phone Number</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="phone_number" id="phone_number" value="{{ old('phone_number',$client->phone_number) }}" required>
              @error('phone_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-6">
              <label for="cell_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Cell Number</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="cell_number" id="cell_number" value="{{ old('cell_number',$client->cell_number) }}" required>
              @error('cell_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
    
            <div class="mb-6">
              <label for="carrier" class="block mb-2 uppercase font-bold text-xs text-gray-700">carrier</label>
              <select class="border border-gray-400 p-2 w-full" name="carrier" id="carrier"required>
                <option value="{{ old('carrier',$client->carrier) }}">{{ old('carrier',$client->carrier) }}</option>
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
              <input type="text" class="border border-gray-400 p-2 w-1/4" name="hst_number" id="hst_number" value="{{ old('hst_number',$client->hst_number) }}" >
              @error('hst_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-6">
              <label for="website" class="block mb-2 uppercase font-bold text-xs text-gray-700">website</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="website" id="website"  placeholder="www.example-website.com" value="{{ old('website',$client->website) }}">
              @error('website')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
    
            <div class="mb-6">
                <label for="status" class="block mb-2 uppercase font-bold text-xs text-gray-700">status</label>
                <span class=" mr-1 uppercase font-bold text-xs text-green-500">Active</span><input type="radio" id="active" name="status" value="Active" class="status" {{ old('status',$client->status) == 'Active' ? 'checked' : '' }} >
                <span class=" ml-5 mr-1 uppercase font-bold text-xs text-red-500">Inactive</span><input type="radio" id="inactive" name="status" value="Inactive" class="status" {{ old('status',$client->status) == 'Inactive' ? 'checked' : '' }}>
                @error('status')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              
            
            <div class="mb-1">
                <input type="hidden" class="update_val" value="{{ $client->id }}">
                <button class="bg-blue-500 updatebtn tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:bg-blue-700">Update</button>
            </div>
        </div>

        
    </form>
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6 flex">
        <div class=" mt-2"><a href="/comp1230/assignments/assignment4/phpA4/public/clients" class="bg-gray-500 hover:bg-gray-700 text-white py-2.5 px-4 mt-2 rounded">Go Back</a></div>
        <form action="/comp1230/assignments/assignment4/phpA4/public/clients/{{ $client->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" class="delete_val" value="{{ $client->id }}">
            <button class="deletebtn bg-red-500 tracking-wide ml-5 text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:bg-red-700">Delete</button>
        </form>
    </div>
</body>

<!-- Delete button confirmation pop-up done with jquery and ajax-->
<script>
  $(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('.deletebtn').click(function (e){
      e.preventDefault();
      
      var delete_id = $(this).closest('form').find('.delete_val').val();
      //alert(delete_id);

      swal({
        title: "Are sure you want to delete this entry?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

          var data = {
            "_token": $('input[name="_token"]').val(),
            "id": delete_id,
          }
          $.ajax({
            type: "DELETE",
            url: '/comp1230/assignments/assignment4/phpA4/public/clients/'+ delete_id,
            data: data,
            success: function (response) {
              swal(response.status, {
                  icon: "success",
                })
                .then((result) => {
                  location.assign('/comp1230/assignments/assignment4/phpA4/public/clients');
                });
            }
          });
        } 
      });
    });




    
    // $('.updatebtn').click(function (e){
    //   e.preventDefault();
      
    //   var update_id = $(this).closest('div').find('.update_val').val();
    //    //alert(update_id);

    //   swal({
    //     title: "Are sure you want to update this entry?",
    //     text: "",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((willDelete) => {
    //     if (willDelete) {

    //       var data = {
    //         "_token": $('input[name="_token"]').val(),
    //         "id": update_id,
    //         "first_name": $('#first_name').val(),
    //         "last_name": $('#last_name').val(),
    //         "company_name": $('#company_name').val(),
    //         "business_number": $('#business_number').val(),
    //         "phone_number": $('#phone_number').val(),
    //         "cell_number": $('#cell_number').val(),
    //         "carrier": $('#carrier').val(),
    //         "hst_number": $('#hst_number').val(),
    //         "website": $('#website').val(),
    //         "status": $('.status').val()
    //       }
    //       alert(data.status);
    //       $.ajax({
    //         type: "PATCH",
    //         url: '/clients/'+ update_id,
    //         data: data,
    //         success: function (response) {
    //           swal(response.status, {
    //               icon: "success",
    //             })
    //             .then((result) => {
    //               location.assign('/clients');
    //             });
    //         },
    //         error: function (request, status, error) {
    //                 alert(request.responseText);
    //             }
    //       });
    //     } 
    //   });
    
  });
</script>

<!-- Update button confirmation pop-up done with jquery and ajax-->
{{-- <script>
  $(document).ready(function (){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
  });
</script> --}}
</html>