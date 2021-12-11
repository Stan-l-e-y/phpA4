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


    <form action="/comp1230/assignments/assignment4/phpA4/public/clientnotifications/{{ $clientnotification->id }}" method="POST">
    
        @method('PATCH')
        @csrf

        <div class="border border-gray-200 p-6 rounded-xl max-w-sm mx-auto mt-10">         
            <div class="mb-6">
                <label for="client_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Client ID</label>
                <input type="text" class="border border-gray-400 p-2 w-full" name="client_id" id="client_id" value="{{ old('client_id',$clientnotification->client_id) }}" required>
                @error('client_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-6">
              <label for="notification_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Notification ID</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="notification_id" id="notification_id" value="{{ old('notification_id',$clientnotification->notification_id) }}" required>
              @error('notification_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
    
            <div class="mb-6">
              <label for="start_time" class="block mb-2 uppercase font-bold text-xs text-gray-700">Start Time</label>
              <input type="datetime-local" class="border border-gray-400 p-2 w-full" name="start_time" id="start_time" value="{{ old('start_time',$clientnotification->start_time) }}" required>
              @error('start_time')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-6">
              <label for="frequency" class="block mb-2 uppercase font-bold text-xs text-gray-700">Frequency</label>
              <input type="text" class="border border-gray-400 p-2 w-full" name="frequency" id="frequency" value="{{ old('frequency',$clientnotification->frequency) }}" required>
              @error('frequency')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
              @enderror
            </div>
            
    
            <div class="mb-6">
                <label for="status" class="block mb-2 uppercase font-bold text-xs text-gray-700">status</label>
                <span class=" mr-1 uppercase font-bold text-xs text-green-500">Active</span><input type="radio" id="active" name="status" value="Active" class="status" {{ old('status',$clientnotification->status) == 'Active' ? 'checked' : '' }} >
                <span class=" ml-5 mr-1 uppercase font-bold text-xs text-red-500">Inactive</span><input type="radio" id="inactive" name="status" value="Inactive" class="status" {{ old('status',$clientnotification->status) == 'Inactive' ? 'checked' : '' }}>
                @error('status')
                  <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              
            
            <div class="mb-1">
                <input type="hidden" class="update_val" value="{{ $clientnotification->id }}">
                <button class="bg-blue-500 updatebtn tracking-wide text-white px-6 py-2 inline-block mb-3 shadow-lg rounded hover:bg-blue-700">Update</button>
            </div>
        </div>

        
    </form>
    <div class="mt-10 mb-10 mx-auto max-w-sm pl-6 flex">
        <div class=" mt-2"><a href="/comp1230/assignments/assignment4/phpA4/public/clientnotifications" class="bg-gray-500 hover:bg-gray-700 text-white py-2.5 px-4 mt-2 rounded">Go Back</a></div>
        <form action="/comp1230/assignments/assignment4/phpA4/public/clientnotifications/{{ $clientnotification->id }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" class="delete_val" value="{{ $clientnotification->id }}">
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
            url: '/comp1230/assignments/assignment4/phpA4/public/clientnotifications/'+ delete_id,
            data: data,
            success: function (response) {
              swal(response.status, {
                  icon: "success",
                })
                .then((result) => {
                  location.assign('/comp1230/assignments/assignment4/phpA4/public/clientnotifications');
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
    //         "client_id": $('#client_id').val(),
    //         "notification_id": $('#notification_id').val(),
    //         "start_time": $('#start_time').val(),
    //         "frequency": $('#frequency').val(),
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
    //         url: '/clientnotifications/'+ update_id,
    //         data: data,
    //         success: function (response) {
    //           swal(response.status, {
    //               icon: "success",
    //             })
    //             .then((result) => {
    //               location.assign('/clientnotifications');
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