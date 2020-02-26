<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{asset('/css/app.css')}}" rel="stylesheet">
        <script src="{{mix('/js/app.js')}}" defer></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
<body>
  <div id="app">
	<example-component></example-component>
  </div>
</body>

</html>
