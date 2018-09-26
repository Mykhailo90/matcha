<footer>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="author">
        <a class="navbar-brand" href="https://www.facebook.com/profile.php?id=100001749961535">@msarapii</a>
        <a class="navbar-brand" href="https://www.facebook.com/kalyan.mizin">@nmizin</a>
      </div>
      <hr id="fhr">
      @if (Route::has('login'))
      @auth
      <div class="footer_text">
        <h5>Наиболее популярные запросы на поиск:</h5>
      </div>
      <div class="conditions">
        <div class="goal">
          <ul>
            <li><h5>Цель знакомства: </h5></li>
            <li> <a href="#">Только дружба</a></li>
            <li><a href="#">Секс и не более</a></li>
            <li><a href="#">Романтические отношения</a></li>
            <li><a href="#">Общение в интернете</a></li>
          </ul>
        </div>

        <div class="age">
          <ul>
            <li><h5>Возраст: </h5></li>
            <li> <a href="#">До 18</a></li>
            <li><a href="#">18 - 25</a></li>
            <li><a href="#">25-35</a></li>
            <li><a href="#">Старше 35</a></li>
          </ul>
        </div>

        <div class="gender_type">
          <ul>
            <li><h5>Ищу: </h5></li>
            <li> <a href="#">Парня(гетеро)</a></li>
            <li><a href="#">Девушку(гетеро)</a></li>
            <li><a href="#">Парня(гомосексуал)</a></li>
            <li><a href="#">Девушку(гомосексуал)</a></li>
          </ul>
        </div>

        <div class="location">
          <ul>
            <li><h5>Расположение: </h5></li>
            <li> <a href="#">Весь Киев</a></li>
            <li><a href="#">Киев(Оболонь)</a></li>
            <li><a href="#">Киев(Левый берег)</a></li>
            <li><a href="#">Киев(Правый берег)</a></li>
          </ul>
        </div>
      </div>
      @endauth
      @endif
    </nav>
</footer>
