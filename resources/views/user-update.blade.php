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
  <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <form action="/comp1230/assignments/assignment4/phpA4/public/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
    
        @method('PATCH')
        @csrf

        <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto mt-10">         
            <div class="mb-6">
                <label for="first_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">First Name</label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="first_name" id="first_name" value="{{ old('first_name',$user->first_name) }}" required>
                @error('first_name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
              <label for="last_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Last Name</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="last_name" id="last_name" value="{{ old('last_name',$user->last_name) }}" required>
              @error('last_name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-6">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="username" id="username" value="{{ old('username',$user->username) }}" required>
                @error('username')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
            
            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
                <input type="email" class="border border-gray-400 p-2 w-full" name="email" id="email" value="{{ old('email',$user->email) }}" required>
                @error('email')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-6">
                <label for="picture" class="block mb-2 uppercase font-bold text-xs text-gray-700">Profile Picture</label>
                <input type="file" class="border border-gray-400 p-2 w-full mb-5" name="picture" id="picture" value="{{ old('picture',$user->picture) }}" >
                <img class="rounded" src="{{ asset('storage/' . $user->picture) }}" alt="" width="100">
                @error('picture')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
            
            <div class="mb-6">
              <label for="cell_number" class="block mb-2 uppercase font-bold text-xs text-gray-700">Cell Number</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="cell_number" id="cell_number" value="{{ old('cell_number',$user->cell_number) }}" required>
              @error('cell_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
    
            <div class="mb-6">
                <label for="position" class="block mb-2 uppercase font-bold text-xs text-gray-700">position</label>
                <select class="border border-gray-400 p-2 w-full" name="position" id="position"required>
                  <option value="{{ old('position',$user->position) }}">{{ old('position',$user->position) }}</option>
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
                <label for="status" class="block mb-2 uppercase font-bold text-xs text-gray-700">status</label>
                <span class=" mr-1 uppercase font-bold text-xs text-green-500">Active</span><input type="radio" id="active" name="status" value="Active" class="status" {{ old('status',$user->status) == 'Active' ? 'checked' : '' }} >
                <span class=" ml-5 mr-1 uppercase font-bold text-xs text-red-500">Inactive</span><input type="radio" id="inactive" name="status" value="Inactive" class="status" {{ old('status',$user->status) == 'Inactive' ? 'checked' : '' }}>
                @error('status')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
                     
            <div class="mb-1">
                <input type="hidden" class="update_val" value="{{ $user->id }}">
                <button class="bg-blue-500 updatebtn tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:bg-blue-700">Update</button>
            </div>

        </div>

        
    </form>
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6 flex">
        <div class=" mt-2"><a href="/comp1230/assignments/assignment4/phpA4/public/users" class="bg-gray-500 hover:bg-gray-700 text-white py-2.5 px-4 mt-2 rounded">Go Back</a></div>
        <form action="/comp1230/assignments/assignment4/phpA4/public/users/{{ $user->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" class="delete_val" value="{{ $user->id }}">
            <button class="deletebtn bg-red-500 tracking-wide ml-5 text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:bg-red-700">Delete</button>
        </form>
    </div>
</body>
<footer>
  <script src=https://my.gblearn.com/js/loadscript.js></script>
</footer>

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
            url: '/comp1230/assignments/assignment4/phpA4/public/users/'+ delete_id,
            data: data,
            success: function (response) {
              swal(response.status, {
                  icon: "success",
                })
                .then((result) => {
                  location.assign('/comp1230/assignments/assignment4/phpA4/public/users');
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
    //         "postition": $('#postition').val(),
    //         "hst_number": $('#hst_number').val(),
    //         "website": $('#website').val(),
    //         "status": $('.status').val()
    //       }
    //       alert(data.status);
    //       $.ajax({
    //         type: "PATCH",
    //         url: '/users/'+ update_id,
    //         data: data,
    //         success: function (response) {
    //           swal(response.status, {
    //               icon: "success",
    //             })
    //             .then((result) => {
    //               location.assign('/users');
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