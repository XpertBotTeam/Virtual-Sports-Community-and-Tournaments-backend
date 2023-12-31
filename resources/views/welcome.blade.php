
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kamkom</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="../css/app.css" rel="stylesheet" />
        <style>
            
            *{
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }
            body{
                max-width: 100vw;
                min-height: 100vh;
                
                font-family: -apple-system, BlinkMacSystemFont, sans-serif;
                background: #121212; /* fallback for old browsers */
                overflow-x: hidden;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                -o-user-select: none;
                user-select: none;
            }
            body:not(.user-is-tabbing) button:focus,
            body:not(.user-is-tabbing) input:focus,
            body:not(.user-is-tabbing) select:focus,
            body:not(.user-is-tabbing) textarea:focus {
            outline: none;
            }

            a {
                text-decoration: none;
                color: inherit;
            }
            .userName{
                color: white;
                font-size: 23px;
                font-weight: 700;
            }

            .flexMain {
                display:flex;
                align-items: center;
                justify-content: space-between;
                padding: 0Px 70px;
                background-color: #000000e6;
            }
    
            .flexMain h1{
                font-size: 35px;
                font-weight: 800;
                color: white;font-size: 35px;
                font-weight: 800;
                text-decoration: none;
            }
            button.siteLink {
                margin-left:-5px;
                border:none;
                padding:24px;
                display:inline-block;
                min-width:115px;
                background-color: transparent;
                color: white;
                font-weight: 600;
                font-size: 17px;
                cursor: pointer;
            }
            button.siteLink:hover{
                background-color: #1f1f1f;
            }
            #mainNavigation {
            transition : transform 200ms linear;
            background : #fff;
            }

        </style>
    </head>

    <body class="antialiased">

                <!-- <div class='nav'>
                       <a href="/"> <h1 style="color: white;">Kamkom</h1></a>
                        @guest
                            <ul>
                                <li><a href="register">Register</a></li>
                                <li><a href="login">Login</a></li>
                            </ul>
                        @endguest
                        @auth
                            <p class="userName">{{ucfirst(auth()->user()->name)}}</p>
                        @endauth
                </div> -->
                <div  id="menuHolder">
                    <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
                        <div class="flexMain">
                            <a href="/"> <h1>Kamkom</h1></a>
                        
                    
                            <div class="flex2 text-end d-none d-md-block">
                                <a href="register"> <button class="siteLink">Home</button></a>
                                <a href="register"> <button class="siteLink">Tournaments</button></a>
                                <a href="register"> <button class="siteLink">Leagues</button></a>
                                <a href="register"> <button class="siteLink">Games</button></a>
                                @guest
                                <a href="register"> <button class="siteLink">REGISTER</button></a>
                                <a href="login">   <button class=" siteLink">Login</button></a>
                                @endguest
                                @auth
                                    <a href="login">   <button class=" siteLink">{{ucfirst(auth()->user()->name)}}</button></a>
                                @endauth
                            </div> 
                        </div>
                    </div>
                </div>        
                @if(request()->session()->has('response'))
                <p>{{session('response')}}</p>
                @endif
                
    </body>
</html>
