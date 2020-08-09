<!DOCTYPE html>
<html>
<head>
	<title>view marks</title>
</head>
<body>

<table class="table table-bordered">
    <tr>
      <th>subject</th>
      <th>marks</th>
     
      </tr>
      @foreach($marks as $value)

      <tr>

       <td>{{ $value->subject }}</td>
       <td>{{ $value->marks }}</td>
       
       </tr>
        
       @endforeach
       
       
       </table>


      
       
       
</body>
</html>