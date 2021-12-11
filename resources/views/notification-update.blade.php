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

    <form action="/comp1230/assignments/assignment4/phpA4/public/notifications/{{ $notification->id }}" method="POST">
    
        @method('PATCH')
        @csrf

        <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto mt-10">         
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="name" id="name" value="{{ old('name',$notification->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
    
    
            <div class="mb-6">
              <label for="type" class="block mb-2 uppercase font-bold text-xs text-gray-700">type</label>
              <select class="border border-gray-400 p-2 w-full" name="type" id="type"required>
                <option value="{{ old('type',$notification->type) }}">{{ old('type',$notification->type) }}</option>
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
                <span class=" mr-1 uppercase font-bold text-xs text-green-500">Active</span><input type="radio" id="enabled" name="status" value="Enabled" class="status" {{ old('status',$notification->status) == 'Enabled' ? 'checked' : '' }} >
                <span class=" ml-5 mr-1 uppercase font-bold text-xs text-red-500">Disabled</span><input type="radio" id="disabled" name="status" value="Disabled" class="status" {{ old('status',$notification->status) == 'Disabled' ? 'checked' : '' }}>
                @error('status')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              
            
            <div class="mb-1">
                <input type="hidden" class="update_val" value="{{ $notification->id }}">
                <button class="bg-blue-500 updatebtn tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:bg-blue-700">Update</button>
            </div>
        </div>

        
    </form>
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6 flex">
        <div class=" mt-2"><a href="/notifications" class="bg-gray-500 hover:bg-gray-700 text-white py-2.5 px-4 mt-2 rounded">Go Back</a></div>
        <form action="/comp1230/assignments/assignment4/phpA4/public/notifications/{{ $notification->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" class="delete_val" value="{{ $notification->id }}">
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
            url: '/comp1230/assignments/assignment4/phpA4/public/notifications/'+ delete_id,
            data: data,
            success: function (response) {
              swal(response.status, {
                  icon: "success",
                })
                .then((result) => {
                  location.assign('/comp1230/assignments/assignment4/phpA4/public/notifications');
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
    // });
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