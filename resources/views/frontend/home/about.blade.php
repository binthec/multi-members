@extends('frontend.layouts.app')

@section('bodyId', 'home')

@section('content')
    <header id="gtco-header" class="gtco-cover gtco-cover-custom gtco-inner" role="banner">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-left">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="row">
                                <div class="col-md-8 animate-box">
                                    <h1 class="no-margin">About Us</h1>
                                    <p>立ち読みサーチとは。登録方法などもこちら。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END #gtco-header -->

    <div class="gtco-client">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-2 col-md-offset-1 text-center client col-sm-6 col-xs-6 col-xs-offset-0 col-sm-offset-0">
                    <img src="images/client_1.png" alt="Free Website Template by FreeHTML5.co" class="img-responsive">
                </div>
                <div class="col-md-2 text-center client col-sm-6 col-xs-6 col-xs-offset-0 col-sm-offset-0">
                    <img src="images/client_2.png" alt="Free Website Template by FreeHTML5.co" class="img-responsive">
                </div>
                <div class="col-md-2 text-center client col-sm-6 col-xs-6 col-xs-offset-0 col-sm-offset-0">
                    <img src="images/client_3.png" alt="Free Website Template by FreeHTML5.co" class="img-responsive">
                </div>
                <div class="col-md-2 text-center client col-sm-6 col-xs-6 col-xs-offset-0 col-sm-offset-0">
                    <img src="images/client_4.png" alt="Free Website Template by FreeHTML5.co" class="img-responsive">
                </div>
                <div class="col-md-2 text-center client col-sm-6 col-xs-6 col-xs-offset-0 col-sm-offset-0">
                    <img src="images/client_5.png" alt="Free Website Template by FreeHTML5.co" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
    <!-- END .gtco-client -->

    <div class="gtco-services gtco-section">
        <div class="gtco-container">
            <div class="row row-pb-sm">
                <div class="col-md-8 col-md-offset-2 gtco-heading text-center">
                    <h2>Make your life simpler.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod erat tincidunt. Donec tincidunt volutpat erat.</p>
                    <p><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn btn-special popup-vimeo">Watch The Video</a></p>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-md-4 col-sm-4 service-wrap">
                    <div class="service">
                        <h3><i class="ti-pie-chart"></i> Marketing</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur voluptatibus nesciunt, est alias deleniti ipsum fuga ullam maxime repudiandae neque, ad. Maiores quis atque, culpa rem inventore vero amet praesentium, quam sint, magnam reprehenderit doloremque.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 service-wrap">
                    <div class="service animate-change">
                        <h3><i class="ti-ruler-pencil"></i> Design</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima quidem quae, assumenda dolores ad pariatur! Deleniti debitis, voluptatem! Omnis enim magnam perspiciatis, natus. Ipsum distinctio, voluptatibus vero laboriosam sequi! Officia fuga quam eveniet quo similique!</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 service-wrap">
                    <div class="service">
                        <h3><i class="ti-settings"></i> Development</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta aperiam, maiores officia alias accusantium fugiat, doloremque voluptas, voluptatem dolore vel animi praesentium saepe unde consequuntur, eum asperiores odit aliquam error nulla impedit repellendus. Nesciunt, delectus.</p>
                    </div>
                </div>

                <div class="clearfix visible-md-block visible-sm-block"></div>

            </div>
        </div>
    </div>
    <!-- END .gtco-services -->

    <div class="gtco-section gtco-products">
        <div class="gtco-container">
            <div class="row row-pb-sm">
                <div class="col-md-8 col-md-offset-2 gtco-heading text-center">
                    <h2>Popular Products</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod erat tincidunt. Donec tincidunt volutpat erat.</p>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-md-4 col-sm-4">
                    <a href="#" class="gtco-item two-row bg-img animate-box" style="background-image: url(images/img_1.jpg)">
                        <div class="overlay">
                            <i class="ti-arrow-top-right"></i>
                            <div class="copy">
                                <h3>Paper Hot Cup</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <img src="images/img_1.jpg" class="hidden" alt="Free HTML5 Website Template by FreeHTML5.co">
                    </a>
                    <a href="#" class="gtco-item two-row bg-img animate-box" style="background-image: url(images/img_2.jpg)">
                        <div class="overlay">
                            <i class="ti-arrow-top-right"></i>
                            <div class="copy">
                                <h3>Notepad Mockup</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <img src="images/img_2.jpg" class="hidden" alt="Free HTML5 Website Template by FreeHTML5.co">
                    </a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="#" class="gtco-item one-row bg-img animate-box" style="background-image: url(images/img_md_1.jpg)">
                        <div class="overlay">
                            <i class="ti-arrow-top-right"></i>
                            <div class="copy">
                                <h3>Paper Pouch</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <img src="images/img_md_1.jpg" class="hidden" alt="Free HTML5 Website Template by FreeHTML5.co">
                    </a>
                </div>
                <div class="col-md-4 col-sm-4">
                    <a href="#" class="gtco-item two-row bg-img animate-box" style="background-image: url(images/img_3.jpg)">
                        <div class="overlay">
                            <i class="ti-arrow-top-right"></i>
                            <div class="copy">
                                <h3>Fancy 3D</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <img src="images/img_3.jpg" class="hidden" alt="Free HTML5 Website Template by FreeHTML5.co">
                    </a>
                    <a href="#" class="gtco-item two-row bg-img animate-box" style="background-image: url(images/img_4.jpg)">
                        <div class="overlay">
                            <i class="ti-arrow-top-right"></i>
                            <div class="copy">
                                <h3>Hard Cover Book</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <img src="images/img_4.jpg" class="hidden" alt="Free HTML5 Website Template by FreeHTML5.co">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><a href="http://freehtml5.co" target="_blank" class="btn btn-special">Visit Gettemplates.co</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- END .gtco-products -->

    <div class="gtco-section gtco-testimonial gtco-gray">
        <div class="gtco-container">

            <div class="row row-pb-sm">
                <div class="col-md-8 col-md-offset-2 gtco-heading text-center">
                    <h2>People Love Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod erat tincidunt. Donec tincidunt volutpat erat.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 animate-box">
                    <div class="gtco-testimony gtco-left">
                        <div><img src="images/person_1.jpg" alt="Free Website template by FreeHTML5.co"></div>
                        <blockquote>
                            <p>&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author">&mdash; Ferdinand A. Porsche</cite></p>
                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 animate-box">
                    <div class="gtco-testimony gtco-left">
                        <div><img src="images/person_2.jpg" alt="Free Website template by FreeHTML5.co"></div>
                        <blockquote>
                            <p>&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn’t really do it, they just saw something. It seemed obvious to them after a while.&rdquo; <cite class="author">&mdash; Steve Jobs</cite></p>
                        </blockquote>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 animate-box">
                    <div class="gtco-testimony gtco-left">
                        <div><img src="images/person_3.jpg" alt="Free Website template by FreeHTML5.co"></div>
                        <blockquote>
                            <p>&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly.&rdquo; <cite class="author">&mdash; Frank Chimero</cite></p>
                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 animate-box">
                    <div class="gtco-testimony gtco-left">
                        <div><img src="images/person_1.jpg" alt="Free Website template by FreeHTML5.co"></div>
                        <blockquote>
                            <p>&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained.&rdquo; <cite class="author">&mdash; Ferdinand A. Porsche</cite></p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
@endsection