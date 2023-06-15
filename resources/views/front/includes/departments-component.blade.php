 <div class="single-footer f-link">
     <h3>Shop Departments</h3>
     <ul>

         @foreach ($categories as $item)
             <li><a href="javascript:void(0)">{{ $item->name }}</a></li>
         @endforeach
     </ul>
 </div>
