<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}" />

        <title>Prueba Place2Pay - Naudys Reina</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                @if (Session::has('status') && Session::get('status') == 'OK')
                    <div class="bg-success">
                        {{Session::get('message')}}
                    </div>
                @elseif (Session::has('status') && Session::get('status') == 'FALLO')
                    <div class="bg-danger">
                        {{Session::get('message')}}
                    </div>
                @endif
                <br>
                <form method="POST" action="{{route('send')}}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="reference" placeholder="Reference" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="description" placeholder="Description" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-9">
                                <input class="form-control" type="number" name="total" min="0" step="0.01" placeholder="Amount" required>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" name="currency" readonly placeholder="COP" value="COP">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit" name="pay">Send</button>
                    </div>            
                </form>
                @if (isset($cacheResponse) && $cacheResponse != null)
                    <div><strong>ÚLTIMA OPERACIÓN</strong></div><br>
                    <div class="d-flex justify-content-center">
                        <table class="d-table justify-content-center table table-responsive">
                            <thead>
                                <th>ESTADO</th>
                                <th>MENSAJE</th>
                                <th>FECHA</th>
                            </thead>
                            <tbody>
                                <td>{{$cacheResponse['status']}}</td>
                                <td>{{$cacheResponse['message']}}</td>
                                <td>{{$cacheResponse['date']}}</td>
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
