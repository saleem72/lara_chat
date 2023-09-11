<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        @vite(['resources/js/chat.js'])

        <style>
            .photo {
                height: 50px;
                width: 50px;
                background-color: orange;
            }
        </style>
    </head>

    <body style="height: 100vh">
        <div class="h-100 d-flex align-items-center justify-content-center align-items-stretch">
            <div class="d-flex flex-column col-2 my-2 border border-dark rounded-3" style="background-color: lightgrey">
                <div class="d-flex flex-row pt-2 px-2 rounded-top-3" style="background-color:blue">
                    <h6 class="text-center">Online users</h6>
                </div>

                <div>

                </div>
                <div id="some-thing" users = []>
                    {{-- @foreach ( __('users') as $user) --}}

                        <div class="row d-flex flex-row mx-0 p-2">
                            <div class="photo rounded-circle" ></div>
                            <div class="col">
                                <div id="user-name" style="font-weight: 600; font-size: 14;">Jack</div>
                                <span id="user-email" style="color: grey; font-size: 12">jack@gmail.com</span>
                            </div>
                        </div>
                    {{-- @endforeach --}}
                </div>





            </div>
            <div class="d-flex flex-column col-8 my-2 ms-2 border border-dark rounded-3" style="background-color: lightgrey">
                <div class="d-flex flex-column align-items-center justify-content-center pt-2 rounded-top-3" style="background-color:blue">
                    <h6 class="text-center">Messages</h6>

                </div>

                <div class="col flex-fill d-flex my-2"></div>

                <div class="form-group p-2">
                    <input type="string" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter message">
                  </div>
            </div>
        </div>
    </body>
</html>
