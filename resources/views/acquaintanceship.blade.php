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
        <div class="row">
            <div class="col-sm-6">
                <h5>Сортировать по:</h5>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-distance-tab" data-toggle="pill" href="#v-pills-distance" role="tab" aria-controls="v-pills-distance" aria-selected="true">По удаленности</a>
                    <a class="nav-link" id="v-pills-age-tab" data-toggle="pill" href="#v-pills-age" role="tab" aria-controls="v-pills-age" aria-selected="false">По возрасту</a>
                    <a class="nav-link" id="v-pills-interests-tab" data-toggle="pill" href="#v-pills-interests" role="tab" aria-controls="v-pills-interests" aria-selected="false">По интересам</a>
                    <a class="nav-link" id="v-pills-rate-tab" data-toggle="pill" href="#v-pills-rate" role="tab" aria-controls="v-pills-rate" aria-selected="false">По рейтингу</a>
                </div>
            </div>
            <div class="col-sm-6">
                <h5>Фильтр:</h5>
                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="formControlRangeFrom">Минимальный возраст - <span id="ageFrom"></spane></label>
                        <input type="range" min="16" max="120" value="16" class="form-control-range" id="formControlRangeFrom" name="ageFrom">
                    </div>

                    <div class="form-group">
                        <label for="formControlRangeTo">Максимальный возраст - <span id="ageTo"></spane></label>
                        <input type="range" min="16" max="120" value="120" class="form-control-range" id="formControlRangeTo" name="ageTo">
                    </div>

                    <div class="form-group">
                        <label for="formControlRangeDistance">Максимальный удаленность - <span id="maxDistance"></spane></label>
                        <input type="range" min="0" max="2000" value="50" class="form-control-range" id="formControlRangeDistance" name="maxDistance">
                    </div>

                    <div class="form-group">
                        <label for="genderFormSelect">Искать</label>
                        <select class="form-control" id="genderFormSelect">
                            <option>Девушку(гетеро)</option>
                            <option>Мужчину(Гетеро)</option>
                            <option>Девушку(Би)</option>
                            <option>Мужчину(Би)</option>
                            <option>Всех</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="interestSelect">Выбрать интересы для поиска</label>
                        <select multiple class="form-control" id="interestSelect">
                            @foreach($allInterests as $key => $interest)
                                <option>{{$interest['interst_name']}}</option>
                            @endforeach

                        </select>
                    </div>

                </form>
            </div>
        </div>
        <div content_field>

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-distance" role="tabpanel" aria-labelledby="v-pills-distance-tab"><h5>Результаты сортированы по расстоянию:</h5>
                    @if (isset($allUsersByDistance))
                        @foreach($allUsersByDistance as $User)
                            {{$User['age']}}
                        @endforeach
                    @else
                        <div class="alert alert-warning" role="alert">
                            По вашему запросу пользователей не найдено!
                        </div>
                    @endif
                    <div class="pagination">
                        {{ $allUsersByDistance->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-age" role="tabpanel" aria-labelledby="v-pills-age-tab"><h5>Результаты сортированы по возрасту кандидатов:</h5>
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
                        <div class="alert alert-warning" role="alert">
                            По вашему запросу пользователей не найдено!
                        </div>
                    @endif
                    <div class="pagination">
                        {{ $allUsersByDistance->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-interests" role="tabpanel" aria-labelledby="v-pills-interests-tab"><h5>Результаты сортированы по количеству совпавших интересов:</h5></div>
                <div class="tab-pane fade" id="v-pills-rate" role="tabpanel" aria-labelledby="v-pills-rate-tab"><h5>Результаты сортированы по рейтингу кандидатов:</h5></div>
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
@endsection
