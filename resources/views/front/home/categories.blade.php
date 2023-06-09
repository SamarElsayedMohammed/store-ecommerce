     <!-- Start Featured Categories Area -->
     <section class="featured-categories section">
         <div class="container">
             <div class="row">
                 <div class="col-12">
                     <div class="section-title">
                         <h2>Featured Categories</h2>
                         <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                             suffered alteration in some form.</p>
                     </div>
                 </div>
             </div>
             <div class="row">
                 @foreach ($categories as $item)
                     <div class="col-lg-4 col-md-6 col-12">
                         <!-- Start Single Category -->
                         <div class="single-category">
                             <h3 class="heading">
                                 {{ $item->name }}</h3>
                             <ul>
                                 @foreach ($item->products as $item)
                                     <li><a href="product-grids.html">{{ $item->name }}</a></li>
                                 @endforeach
                                 <li><a href="product-grids.html">View All</a></li>
                             </ul>
                             <div class="images">
                                 <img src="https://via.placeholder.com/180x180" alt="#">
                             </div>
                         </div>
                         <!-- End Single Category -->
                     </div>
                 @endforeach
             </div>
         </div>
     </section>
     <!-- End Features Area -->
