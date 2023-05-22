  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        @foreach (config('nav') as $item) 
        <li class=" nav-item"><a href="{{$item['route']}}"><i class="{{$item['icon']}}"></i><span class="menu-title" data-i18n="nav.dash.{{$item['title']}}">{{$item['title']}}</span></a>
          @if (isset($item['sub_menu']))
        
              <ul class="menu-content">
                  @foreach ($item['sub_menu'] as $item)

                    <li><a href="{{$item['route']}}">

                      <i class="{{$item['icon']}}"></i><span class="menu-title" data-i18n="nav.dash.{{str_replace(' ','-',$item['title'])}}">{{$item['title']}}</span>

                    </a></li>
          @endforeach
          </ul>
          @endif
        </li>
        @endforeach
      </ul>
    </div>
  </div>