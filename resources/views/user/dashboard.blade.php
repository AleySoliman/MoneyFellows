<x-app-layout>
    <x-slot name='styles'>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- SEO Meta Tags -->
        <meta name="description"
            content="Create a stylish landing page for your business startup and get leads for the offered services with this HTML landing page template.">
        <meta name="author" content="Inovatik">

        <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
        <meta property="og:site_name" content="" /> <!-- website name -->
        <meta property="og:site" content="" /> <!-- website link -->
        <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
        <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
        <meta property="og:type" content="article" />

        <!-- Website Title -->
        <title>Evolo - StartUp HTML Landing Page Template</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext"
            rel="stylesheet">
        <link href=" {{ asset('css/bootstrap.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/fontawesome-all.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/swiper.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/magnific-popup.css') }} " rel="stylesheet">
        <link href=" {{ asset('css/styles.css') }} " rel="stylesheet">
        

    </x-slot>

    <?php try {
        if ($_GET['exists'])?>
            <div class="alert alert-warning" role="alert">
                You are already enrolled in this Gameeya !
              </div>
        <?php 
    } catch (\Throwable $th) {
        //throw $th;
    }
    ?>

    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Multiple Pricing Options</h2>
                    <p class="p-heading p-large">We've prepared pricing plans for all budgets so you can get started
                        right away. They're great for small companies and large organizations</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card-->
                    @foreach ($currents as $item)
                    <div class="card">
                        <div class="card-body">
                            @foreach ($categories as $cat)

                            @if ($cat->id == $item->category_id)
                            <div class="card-title">{{$cat->name}}</div>
                            <hr class="cell-divide-hr">
                            <div class="price">
                                <div class="frequency">Total Price</div>
                                <span class="currency">$</span><span class="value">{{$cat->price}}</span>
                                    <?php
                                       $monthly = $cat->price/$cat->no_months;
                                    ?>
                                    <div class="frequency">${{$monthly}} Monthly </div>
                            </div>
                            <hr class="cell-divide-hr">
                            <ul class="list-unstyled li-space-lg">
                                <li class="media">
                                    <i class="fas fa-calendar"></i>
                                    <div class="media-body">Starting at -> {{ $item->start_date }}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-clock"></i>
                                    <div class="media-body">Number of Months -> {{ $cat->no_months }}</div>
                                </li>
                                <li class="media">
                                    <i class="fas fa-user"></i>
                                    <div class="media-body">Maximum Number of User -> {{ $cat->no_users }}</div>
                                </li>
                            </ul>
                            <div class="button-wrapper">
                                <form action="{{ route('userCurrent.store', "current_id=$item->id" ) }}" method="post">
                                    @csrf
                                    <button class="btn-solid-reg page-scroll" type="submit">JOIN</button>
                                </form>
                            </div>
                                
                            @endif
                                
                            @endforeach
                        </div>
                    </div> <!-- end of card -->
                    @endforeach
                    <!-- end of card -->
                    
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->
    
    <!-- Scripts -->
    <x-slot name='scripts'>
        <script src=" {{ asset('js/jquery.min.js') }} "></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
        <script src=" {{ asset('js/popper.min.js') }} "></script> <!-- Popper tooltip library for Bootstrap -->
        <script src=" {{ asset('js/bootstrap.min.js') }} "></script> <!-- Bootstrap framework -->
        <script src=" {{ asset('js/jquery.easing.min.js') }} "></script> <!-- jQuery Easing for smooth scrolling between anchors -->
        <script src=" {{ asset('js/swiper.min.js') }} "></script> <!-- Swiper for image and text sliders -->
        <script src=" {{ asset('js/jquery.magnific-popup.js') }} "></script> <!-- Magnific Popup for lightboxes -->
        <script src=" {{ asset('js/validator.min.js') }} "></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
        <script src=" {{ asset('js/scripts.js') }} "></script> <!-- Custom scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    </x-slot>

</x-app-layout>
