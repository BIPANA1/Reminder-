<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Task Notes</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
    integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2d2642681e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">

  </head>
  <body>
  <div class="container" id="container-nav">
        <div class="nav">
            <ul>

                <span class="logo"><a href="/" >TODO-List </a></span>
                
            </ul>
        </div>
  </div>

  @yield('content')

  <script src="script.js"></script>
  </body>
</html>
