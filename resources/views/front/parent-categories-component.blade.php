 <div class="mega-category-menu">
     <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
     <ul class="sub-category">
         @foreach ($parents as $item)
             <li><a href="product-grids.html">{{ $item->name }} </a></li>
         @endforeach

     </ul>
 </div>
