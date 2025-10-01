<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Add CSRF meta tag -->
    <title>Add Student</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
    <form id="my-form" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" id="name" placeholder="Enter Name"> <br><br>
        <input type="email" name="email" id="email" placeholder="Enter Email"> <br><br>
        <input type="file" name="image" id="photo"> <br><br>
        <input type="submit" value="Add Student" id="btnSubmit">
        <span id="output"></span>
    </form>

    <script>
        $(document).ready(function(){
            $('#my-form').submit(function(event){
                event.preventDefault();
                
                var form = $('#my-form')[0];
                var data = new FormData(form);

                $.ajax({
                    type: "POST",
                    url: "{{ route('student') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val()
                    },
                    success: function(response) {
                        $("#output").text(response.res);
                        $("#btnSubmit").prop("disabled", true);
                        $("#my-form")[0].reset(); // Reset form after success

                        $("input[type='text']").val('');
                        $("input[type='email']").val('');
                        $("input[type='file']").val('');

                       
                    },
                    error: function(xhr) {
                        $("#output").text('Error: ' + (xhr.responseJSON?.res || 'Something went wrong'));
                        $("#btnSubmit").prop("disabled", false); // Keep button enabled on error


                        $("input[type='text']").val('');
                        $("input[type='email']").val('');
                        $("input[type='file']").val('');                    }
                });
            });
        });
    </script>
</body>
</html>