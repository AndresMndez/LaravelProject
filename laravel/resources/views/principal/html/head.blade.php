<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="shortcut icon" href="/images/Android_O_Preview_Logo.png">
	<link rel="stylesheet" href="/css/master.css">
	<title>@if(isset($products)&&isset($categories)){{"Home"}}@elseif (isset($var)){{$var}}@elseif (isset($category)&&$category!='[]'){{$category[0]->name}}@else {{'Hubo un error'}}@endif</title>
</head>
