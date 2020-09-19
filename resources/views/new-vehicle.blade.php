<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    {{ $title }} 
                    <img src="{{ asset('images/logo-psicol.png') }}">
                </div>

                <div class="links">
                    <a href="/">Home</a>
                    <a href="/spaces">Spaces</a>
                    <a href="/vehicles">Vehicles</a>
                    <a href="/new-vehicle">New vehicle</a>
                </div>
                <small>You are in {{ $subTitle }}</small>
                <br>
                <br>
                <div style="left: 100px; margin-left: 150px;">
                    <form method="post" action="{{ url('new-vehicle') }}">
                        {{ csrf_field() }}
                        <table>
                            <tr>
                                <th>Plate</th>
                                <td>
                                    <input type="text" name="txtPlate" id="txtPlate" maxlength="20">
                                </td>
                            </tr>
                            <tr>
                                <th>Owner</th>
                                <td>
                                    <input type="text" name="txtOwner" id="txtOwner" maxlength="50">
                                </td>
                            </tr>
                            <tr>
                                <th>Space</th>
                                <td>
                                    <select name="cboSpace" id="cboSpace" style="width: 180px;">
                                        <option value="Select an option">Select an option</option>
                                        @foreach($spaces as $space)
                                        <option value="{{ $space->id }}">{{ $space->description }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit">Save record</button>
                                    <button type="reset">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        
        @include('templates/footer')
        
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script>
            $(function(){
                
            });
        </script>
    </body>
</html>
