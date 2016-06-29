<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="10">
  <thead>
    <tr>
      @foreach($cabecerasText as $c)
      <th>{{$c}}</th>
      @endforeach
    </tr>    
  </thead>
  <tbody>
      @foreach($data as $key=>$fila)
        <tr>
        @foreach($cabeceras as $c)
          <td @if($key % 2 != 0) style="background-color:#DDD;"  @endif height="25">{{$fila[$c]}}</td>
        @endforeach    
        </tr>
      @endforeach    
  </tbody>
</table>
</body>
</html>