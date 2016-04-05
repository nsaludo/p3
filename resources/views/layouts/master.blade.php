<!doctype html>
<html>
<head>
    <title>
        @yield('title','Random User Generator')
    </title>

    <meta charset='utf-8'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/superhero/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyles.css">
    <!-- Custom CSS -->
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="home-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand">dwa15</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://p1.donengs.com">Home</a>
                    <li><a href="http://p2.donengs.com">Password Generator</a>
                    <li><a href="http://p3.donengs.com/lorem">Lorem Ipsum Generator</a>
                    <li><a href="http://p3.donengs.com/users">Random User Generator</a>
                    <li><a href="http://p4.donengs.com">Final Project</a>
                </ul>
            </div>
        </div>
    </nav>
    <!--End Navbar-->
    <header>
       {{-- put header here --}}
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        Copyright &copy; {{ date('Y') }}  Nora Saludo
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
