  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

              @php
                  config()->set('navcounts.mainCat', $MainCatCount);
                  // echo config('nav_01.mainCat');
                  echo printTreeArray(config('nav'));
              @endphp

          </ul>
      </div>
  </div>
