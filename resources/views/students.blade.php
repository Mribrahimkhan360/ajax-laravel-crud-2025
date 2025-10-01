<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<body>
    <h1>Student Data</h1>

<table id="student-table" border="1">
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
    </tr>
</table>
<script>
 $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "{{ route('getAllStudents') }}", // No extra quotes
            success: function(data) {
                console.log(data);
                if(data.students.length > 0){
                   for(let i=0;i<data.students.length;i++)
                   {
                        let img = data.students[i]['image'];
                        $('#student-table').append(`<tr>
                            <td>`+(i+1)+`</td>
                            <td>`+(data.students[i]['name'])+`</td>
                            <td>`+(data.students[i]['email'])+`</td>
                            <td>
                                <img src="{{ asset('/`+img+`') }}" alt="Student Image" width="100" height="100">
                            </td>
                        </tr>`);
                   }
                } else {
                    $('table').append('<tr><td colspan="4">No students found</td></tr>');
                }
            },
            error: function(err) { // Fix: Use 'err' instead of 'data'
                console.log(err.responseText);
            },

        });
    });
</script>
</body>
</html>






   
