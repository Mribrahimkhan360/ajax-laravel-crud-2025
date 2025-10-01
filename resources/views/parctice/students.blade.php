<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <title>Document</title>
</head>
<body>
    <table id="student-table" border="1">
    <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
    </tr>
    </table>
    <script>
		$.ajax({
			type: "GET",
			url: "route('getAllStudentinfomation')",
            success: function(data){
                console.log(data);
				if(data.students.length>0)
				{
					for(let i=0;data.students.length;i++)
					{
						let img = data.students[i]['image'];
						$('#student-table').append(`
							<tr>
								<td>`+(1+i)+`</td>
								<td>`+(data.students[i]['name'])+`</td>
								<td>`+(data.students[i]['email'])+`</td>
								<td>
									<img src="{{ asset('/`+img+`') }}" alt='student Image' wight="100" height="100">
								</td>
							</tr>
						`);
					}
					else{
						$('$table').append('<tr><td colspan="4">No student found!</td></tr>');
					}
				}
				error: function(err){
					console.log(err.responseText);
				}
            }
		});
    </script>
</body>
</html>