@extends('layouts.default')

@section('content')

        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 style="margin-top:-80px; width: 100%; font-size: 50px;color: #ffffff;text-align: center;text-transform: uppercase; font-weight: bold;"> <br>SEXTOYS</h1>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src=""></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle"><a class="text-white" href="{{ route('login') }}">Connexion</a> 
                     </button>
                  </div>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search this blog">
                        <div class="input-group-append">
                           <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color:#f26522 ">
                           <i class="fa fa-search"></i>
                           </button>
                        </div>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="lang_box " style="padding:7px 7px 7px 7px" >
                        <a href="{{ route('login') }}">Connexion</a>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Le meilleur choix <br>Pour plus de plaisir</h1>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Faites le choix<br>sur les meilleurs produits</h1>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Le meilleur choix <br>Pour plus de plaisir</h1>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- banner bg main end -->
      <!-- fashion section start -->
      <div class="fashion_section mb-5">
      <h1 class="fashion_taital mt-5">Nos Produits</h1>
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                     <div class="container">
                        <div class="fashion_section_2"> 
                           <div class="row">
                              @foreach($products as $key => $produit)
                              <div class="col-lg-4 col-sm-4">
                                 <div class="box_main">
                                    <h4 class="shirt_text">{{$produit->name}}</h4>
                                    <p class="price_text">Prix : <span style="color: #262626;">{{$produit->price }} fcfa</span></p>
                                    <?php 
                                       $img = App\Models\image_products::select('image')->where('product_id' , $produit->id)->first() ;
                                    ?>
                                    <div  class="tshirt_img"><img src="{{asset('storage/'.$img->image)}}"></div>
                                    <div class="btn_main">
                                       <a class="btn btn-success btn-social mx-2"  href="https://api.whatsapp.com/send?phone=237695162509&text=Salut%20il%20me%20faut%20{{$produit->name}}"><i class="fa fa-whatsapp"></i></a>
                                       <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('products.show', $produit) }}">Voir plus d'images</a></button>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @if($key == 2)
                                 $variable = " " ;
                              @endif
                           </div>
                        </div>
                     </div>
               </div>
               <div class="carousel-item">
                     <div class="container">
                        <div class="fashion_section_2"> 
                           <div class="row">
                              @foreach($products as $key => $produit)
                              <div class="col-lg-4 col-sm-4">
                                 <div class="box_main">
                                    <h4 class="shirt_text">{{$produit->name}}</h4>
                                    <p class="price_text">Prix : <span style="color: #262626;">{{$produit->price }} fcfa</span></p>
                                    <?php 
                                       $img = App\Models\image_products::select('image')->where('product_id' , $produit->id)->first() ;
                                    ?>
                                    <div class="tshirt_img"><img src="{{asset('storage/'.$img->image)}}"></div>
                                    <div class="btn_main">
                                       <a class="btn btn-success btn-social mx-2"  href="https://api.whatsapp.com/send?phone=237690815505&text=Salut%20il%20me%20faut%20{{$produit->name}}"><i class="fa fa-whatsapp"></i></a>
                                       <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('products.show', $produit) }}">Voir plus d'images</a></button>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @if($key == 2)
                                 $variable = " " ;
                              @endif
                           </div>
                        </div>
                     </div>
               </div>
            </div>
             
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- fashion section end -->
      <!-- jewellery  section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
         <h1 style="margin-top:-80px; width: 100%; font-size: 50px;color: #ffffff;text-align: center;text-transform: uppercase; font-weight: bold;"> <br>SEXTOYS</h1>
            <div class="location_main">Designed by MK : <a href="https://api.whatsapp.com/send?phone=237656959165">+237 656 95 91 65</a></div>
         </div>

@endsection