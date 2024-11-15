<!DOCTYPE html>
<html>
    <head>
        <style>
            h1 {
                font-size: 150px
            }

            h2 {
                font-size: 50px
            }

            header {
                height: 800px;
                width: 100vw;
                background:black;
                overflow: hidden;
            }

            img {
                object-fit: cover;
                opacity: 0.4;
                z-index: -1;
            }

            section {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-family: 'Helvetica';
            }
        </style>
    </head>

    <header>
        <img src="https://24.media.tumblr.com/4f128698c69f95a8881793b021cf2014/tumblr_mjan9lpopZ1rfimo0o1_400.gif" style="width:100%;">
        <section>
            <center>
                <h1>Lob City</h1>
                <h2>Hoopers' Network</h2>
            </center>
        </section>
    </header>

    <body>
        <ul>
            <li><a href="{{ route('cities.index') }}"> Cities </a></li>
            <li><a href="{{ route('teams.index') }}"> Teams </a></li>
        </ul>
    </body>
</html>
