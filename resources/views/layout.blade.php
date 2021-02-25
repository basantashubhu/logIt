
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LogIt</title>
        <style>
            #edit-modal .combobox-toggle {
                margin-left: -20px;
            }
            #edit-modal .ui-button {
                display: inline;
            }
        </style>
        <!-- Styles -->
        <link rel="stylesheet" href="styles.min.css">
        <link href = "https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
    </head>
    <body>
        <main>
            @yield('content')
        </main>
        {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script type="text/javascript" src="app.js"></script>
    </body>
</html>
