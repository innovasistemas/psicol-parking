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
                @include('templates/header')
                @include('templates/subtitle')
                <br>
                <br>
                @include('templates/menu')
                <br>
                <br>

                <div style="left: 100px; margin-left: 150px;">
                    <form id="frmRegister" method="post" action="{{ url('new-vehicle') }}">
                        {{ csrf_field() }}
                        <table>
                            <tr>
                                <th>Plate</th>
                                <td>
                                    <input type="text" name="plate" id="txtPlate" maxlength="20" value="{{ old('plate') }}" placeholder="Plate">
                                </td>
                            </tr>
                            <tr>
                                <th>Owner</th>
                                <td>
                                    <input type="text" name="owner" id="txtOwner" maxlength="50" value="{{ old('owner') }}" placeholder="Owner">
                                </td>
                            </tr>
                            <tr>
                                <th>Space</th>
                                <td>
                                    <select name="space" id="cboSpace" style="width: 180px;">
                                        @foreach($spaces as $space)
                                        <option value="{{ $space->id }}">{{ $space->description }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button type="submit" id="btnSubmit">Save record</button>
                                    <button type="reset">Reset</button>
                                </td>
                            </tr>
                        </table>
                    </form>

                    @if($errors->any())
                    <div class="">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @include('templates/footer')

        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script>
            $(function(){
                $('#frmRegister').on('submit', function(event){
                    var plate = $('#txtPlate');
                    var owner = $('#txtOwner');
                    var space = $('#cboSpace');
                    if(plate.val().trim().length === 0){
                        event.preventDefault();
                    }
                    if(owner.val().trim().length === 0){
                        event.preventDefault();
                    }
                    if(space.val().trim().length === 0){
                        event.preventDefault();
                    }
                });
            });
        </script>
    </body>
</html>
