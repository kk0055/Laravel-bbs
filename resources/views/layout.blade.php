<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="container">
    <header class="header">
        <div class="container">
              <h1>マレーシア ペット掲示板</h1>  
                <p class="mt-3"> ペットの自慢をしたり情報を共有するサイトだよ <span><img  class="img" src="https://images.vexels.com/media/users/3/144928/isolated/preview/ebbccaf76f41f7d83e45a42974cfcd87-dog-illustration-by-vexels.png"  alt="" width="80px"></span></p>    
                
        </div>
    </header>
</div>
    <div>
        @yield('content')
    </div>

</body>
</html>