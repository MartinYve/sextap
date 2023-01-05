@extends("layouts.default")
@section("title", $product->name)
@section("content")
<h1 style="margin-top:-80px; width: 100%; font-size: 50px;color: #ffffff; background-color:#28a745; text-align: center;text-transform: uppercase; font-weight: bold;"> <br>Les images du produit {{ $product->name}}</h1>
					
<div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                     <div class="container">
                        <div class="fashion_section_2"> 
                           <div class="row">
                              <?php 
                                 $images = App\Models\image_products::select('image')->where('product_id' , $product->id)->get() ;
                              ?>
                              @foreach($images as $key => $img)
                              <div class="col-lg-4 col-sm-4">
                                 <div class="box_main"> <div  class="tshirt_img"><img src="{{asset('storage/'.$img->image)}}"></div>
                                    <div class="btn_main">
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              <div class="btn_main mb-4" style="margin-left:50%;">
                                 <a class="btn btn-success btn-social mx-2"  href="https://api.whatsapp.com/send?phone=237690815505"><i class="fa fa-whatsapp"></i></a>
                                 <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('home') }}">Home</a></button>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
@endsection