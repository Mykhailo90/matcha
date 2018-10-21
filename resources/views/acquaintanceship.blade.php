<style>
    .inputGroup {
        background-color: #fff;
        display: block;
        margin: 10px 0;
        position: relative;
    }
    .inputGroup label {
        padding: 12px 30px;
        width: 100%;
        display: block;
        text-align: left;
        color: #3c454c;
        cursor: pointer;
        position: relative;
        z-index: 2;
        transition: color 200ms ease-in;
        overflow: hidden;
    }
    .inputGroup label:before {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        content: "";
        background-color: blue;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transform: translate(-50%, -50%) scale3d(1, 1, 1);
        transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
        opacity: 0;
        z-index: -1;
    }
    .inputGroup label:after {
        width: 32px;
        height: 32px;
        content: "";
        border: 2px solid #d1d7dc;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
        background-repeat: no-repeat;
        background-position: 2px 3px;
        border-radius: 50%;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        cursor: pointer;
        transition: all 200ms ease-in;
    }
    .inputGroup input:checked ~ label {
        color: #fff;
    }
    .inputGroup input:checked ~ label:before {
        -webkit-transform: translate(-50%, -50%) scale3d(56, 56, 1);
        transform: translate(-50%, -50%) scale3d(56, 56, 1);
        opacity: 1;
    }
    .inputGroup input:checked ~ label:after {
        background-color: #54e0c7;
        border-color: #54e0c7;
    }
    .inputGroup input {
        width: 32px;
        height: 32px;
        order: 1;
        z-index: 2;
        position: absolute;
        right: 30px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        cursor: pointer;
        visibility: hidden;
    }

    .form {
        padding: 0 16px;
        max-width: 550px;
        margin: 50px auto;
        font-size: 18px;
        font-weight: 600;
        line-height: 36px;
    }

    body {
        background-color: #d1d7dc;
        font-family: "Fira Sans", sans-serif;
    }

    *,
    *::before,
    *::after {
        box-sizing: inherit;
    }

    html {
        box-sizing: border-box;
    }

    code {
        background-color: #9aa3ac;
        padding: 0 8px;
    }


</style>
@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
<style>
    .container h4{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .container h5{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .container {
        width: 100%;
        text-align: center;
    }
    .pagination{
        text-align: center;
        justify-content: center;
    }
</style>
@section('content')
    <div class="container">
        <h4>Поиск друзей</h4>
        <form id="search_form">
            <input type="hidden" id="cs" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-sm-6">
                <h5>Сортировать по:</h5>
                <div class="inputGroup">
                    <input id="radio1" name="sort_param" value="distance" type="radio" checked="checked"/>
                    <label for="radio1">По удаленности</label>
                </div>
                <div class="inputGroup">
                    <input id="radio2" value="age" name="sort_param" type="radio"/>
                    <label for="radio2">По возрасту</label>
                </div>
                <div class="inputGroup">
                    <input id="radio3" name="sort_param" value="interests" type="radio"/>
                    <label for="radio3">По интересам</label>
                </div>
                <div class="inputGroup">
                    <input id="radio4" name="sort_param" value="fame_rating" type="radio"/>
                    <label for="radio4">По рейтингу</label>
                </div>
            </div>
            <div class="col-sm-6">
                <h5>Фильтр:</h5>

                    <div class="form-group">
                        <label for="formControlRangeFrom">Минимальный возраст - <span id="ageFrom"></span></label>
                        <input type="range" min="16" max="120" value="16" class="form-control-range" id="formControlRangeFrom" name="ageFrom">
                    </div>

                    <div class="form-group">
                        <label for="formControlRangeTo">Максимальный возраст - <span id="ageTo"></span></label>
                        <input type="range" min="16" max="120" value="120" class="form-control-range" id="formControlRangeTo" name="ageTo">
                    </div>

                    <div class="form-group">
                        <label for="formControlRangeDistance">Максимальный удаленность - <span id="maxDistance"></span> км </label>
                        <input type="range" min="0" max="2000" value="50" class="form-control-range" id="formControlRangeDistance" name="maxDistance">
                    </div>

                    <div class="form-group">
                        <label for="genderFormSelect">Искать</label>
                        <select class="form-control" id="genderFormSelect">
                            <option value="female" selected>Девушку(гетеро)</option>
                            <option value="male">Мужчину(Гетеро)</option>
                            <option value="bi-sexual">Би</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="interestSelect">Выбрать интересы для поиска</label>
                        <select multiple class="form-control" id="interestSelect">
                            @foreach($allInterests as $key => $interest)
                                <option value="{{$interest['user_interest_id']}}">{{$interest['interst_name']}}</option>
                            @endforeach
                        </select>
                    </div>


            </div>
        </div>
        </form>
        <div content_field>
           <h5 id="searchHeader">Анкеты пользователей:</h5>
                    <div id="result-wrapper">
                        @if (isset($allUsersByDistance))
                            <div class="foto_block">
                            @foreach($allUsersByDistance as $user)
                                <a href="/profile/{{ $user->id }}">
                                    <div class="card" style="width: 15rem;">
                                        <img class="card-img-top" src="{{ $user->avatar }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h6>{{ $user->name }}</h6>
                                            <p class="card-text">{{ $user->city }}, {{ $user->distance }}</p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        @else

                        @endif

                        {{--<div class="pagination">--}}
                            {{--<button onclick="prevPage()">Prev</button>--}}
                            {{--<button onclick="nextPage()">Next</button>--}}
                        {{--</div>--}}
                    </div>



        </div>
    </div>
    <script>
        var sliderFrom = document.getElementById("formControlRangeFrom");
        var sliderTo = document.getElementById("formControlRangeTo");
        var sliderDistance = document.getElementById("formControlRangeDistance");

        var outputFrom = document.getElementById("ageFrom");
        var outputTo = document.getElementById("ageTo");
        var outputDistance = document.getElementById("maxDistance");

        outputFrom.innerHTML = sliderFrom.value;
        outputTo.innerHTML = sliderTo.value;
        outputDistance.innerHTML = sliderDistance.value;

        sliderFrom.oninput = function() {
            outputFrom.innerHTML = this.value;
        }
        sliderTo.oninput = function() {
            outputTo.innerHTML = this.value;
        }
        sliderDistance.oninput = function() {
            outputDistance.innerHTML = this.value;
        }
    </script>

    <script>
        function ajaxSendForm() {

            // create ajax request
           var request = new XMLHttpRequest();

           // get token value
           var token = document.querySelector('#cs').value;

            // get radio button value
            var sort_param = '';
            var radios = document.getElementsByName('sort_param');
            for (var i = 0, length = radios.length; i < length; i++)
            {
                if (radios[i].checked)
                {
                    sort_param = radios[i].value;
                    break;
                }
            };

            //get minAge

            var min_age = $('#formControlRangeFrom').val();

            //get maxAge
            var max_age = $('#formControlRangeTo').val();

            //get maxDistance
            var max_distance = $('#maxDistance').val();

            //get gender
            var gender = $('#genderFormSelect').val();

            //get interests
            var interests = $('#interestSelect').val();

           request.open('POST', '/search', true);
           request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           request.send('_token=' + token +
                        '&min_age=' + min_age +
                        '&max_age=' + max_age +
                        '&max_distance=' + max_distance +
                        '&gender=' + gender +
                        '&sort_param=' + sort_param +
                        '&interests=' + interests
                       );
           request.onreadystatechange = function (e) {
           if(request.readyState == 4 && request.status == 200) {
            var res = request.responseText;
            var res = JSON.parse(res);
            console.log(res);

            // Выводим результаты поиска
            if(res == ''){

                var info = '<div class="alert alert-warning" role="alert">' +
                            'По вашему запросу пользователей не найдено!</div>';
                alert(info);
            }

                    }
                }

        }

        var myForm = document.getElementById("search_form");
        //Extract Each Element Value
        for (var i = 0; i < myForm.elements.length; i++) {
            myForm.elements[i].addEventListener("change", ajaxSendForm);
        }
    </script>
@endsection
