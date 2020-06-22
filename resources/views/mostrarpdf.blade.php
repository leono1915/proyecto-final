<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
  {{$nombre}}
  <!--<embed src="{{ asset('cotizacion/C0055.pdf') }}" type="application/pdf" width="100% " height="1000px" >-->
  <iframe width="100%" height="1000px" src="{{asset('cotizacion/'.$nombre)}}" frameborder="0"></iframe>
</body>
</html>