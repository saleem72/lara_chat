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


        @vite('resources/js/app.js')

        <style>
        .divColor{
            background-color: lightgray;
            margin: 20px;
            padding: 20px;
            border-radius: 20px;
        }
        html,
        body {
        height: 100%
        }
        </style>
    </head>
    <body>
        {{-- <div class="container-fluid" style="background-color: pink;">
              <div class="row justify-content-center">
                <div class="col-6">
                    <form>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
              </div>
          </div> --}}

          <div class="h-100 d-flex align-items-center justify-content-center ">
            <div class="p-4 divColor col-6">

                <div >
                    <form>
                        <div class="form-group mb-2">
                            <label for="exampleInputEmail1">Email address</label>
                            <input value=@{{ imageZaki }} type="email" class="form-control" id="user-email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group mt-2 mb-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="user-password" placeholder="Password">
                          </div>
                          <div class="d-grid">
                              <button id="submit-btn" class="btn btn-primary">Submit</button>
                          </div>
                    </form>




                        <div id="usersList" class="row d-flex flex-row mx-0 p-2">
                            <div class="photo rounded-circle" ></div>
                            <div class="col">
                                <div style="font-weight: 600; font-size: 14;">Jack</div>
                                <span style="color: grey; font-size: 12">jack@gmail.com</span>
                            </div>
                        </div>

                </div>
            </div>
        </div>

    </body>
</html>
