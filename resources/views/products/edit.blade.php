<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('nw/css/styles.css')}}" rel="stylesheet" />
        <style>
            .haut{
                width: 550px;
                height: 75px;
                padding: 2px 2px 4px 4px;
            }
        </style>
    </head>
    <body id="page-top">
        <section class="page-section" id="contact">
            <div class="container">
                @if (isset($product))
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Modifier le produit {{$product->name}}</h2>
                </div>
                <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                @csrf
                      <!-- <input type="hidden" name="_method" value="PUT"> -->
                      @method('PUT')
                @else
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Créer un produit</h2>
                </div>
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" >
                @csrf
                @method('POST')
                @endif
                    <div class="row align-items-stretch mb-5" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="haut form-control" name="name" type="text" value="{{ isset($product->name) ? $product->name : old('name') }}" placeholder="Nom du produit *" required="required" data-validation-required-message="Please enter your name." />
                                @error("name") <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <input class="haut form-control" type="number" name="price" value="{{ isset($product->price) ? $product->price : old('price') }}"  id="price" placeholder="Prix du produit"/>
                                @error("price") <div class="text-danger"> {{ $message }}</div> @enderror
                            </div>
                           <dic id="elm">
                            <div class="form-group mb-md-0 copie" >
                                    <input class="haut form-control" type="file" name="picture[]" />
                                    @error("picture")<div>{{ $message }}</div> @enderror
                                </div>
                                <a href = "" style="float: left;"><button class = "mt-2 btn btn-primary ml-1" title="Ajouter" id="plus"><i class="fa fa-plus"></i></button></a>
                                <a href = "" style="float: left;"><button class = "mt-2 ml-2 btn btn-primary mb-5" title="Ajouter" id="minus"><i class="fa fa-minus"></i></button></a>
                           </dic>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du produit" >{{ isset($product->content) ? $product->content : old('content') }}</textarea>
                                @error("content")<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    @if (isset($product))
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">Modifier</button>
                    </div>
                    @else
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">Créer</button>
                    </div>
                    @endif
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 5-->
        <!-- Modal 6-->
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('nw/assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('nw/assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('nw/js/scripts.js')}}"></script>
        <script src="{{asset('nw/js/mix.js')}}"></script>
    </body>
</html>






