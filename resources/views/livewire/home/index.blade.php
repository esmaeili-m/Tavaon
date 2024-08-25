<div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @for($i=0;$i<\App\Models\Slider::where('status',1)->count();$i++)
                @if($i===0)
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i+1}}"></button>
                @endif
            @endfor
        </div>
        <div class="carousel-inner">
            @foreach(\App\Models\Slider::where('status',1)->get() as $key => $item)
                <div class="carousel-item {{$key==0 ?'active':''}}" data-bs-interval="2000">
                    <img height="700px" src="{{asset($item->image)}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-white">{{$item->title ?? ''}}</h1>
                        <p class="text-white">{{$item->description ?? ''}}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section id="content-2" class="content-2 wide-60 content-section division">
        <div class="container">
            <div class="row d-flex align-items-center">

                <div class="col-md-5 col-lg-6">
                    <div class="txt-block right-column wow fadeInLeft">

                        <!-- Title -->
                        <h3 class="h2-xs">شرکت تعاونی طلوع یار:</h3>
                        <p class="p-lg">
                            {{\App\Models\Setting::where('type',1)->first()['value'] ?? ''}}
                        </p>

                    </div>
                </div>	<!-- END TEXT BLOCK -->
                <div class="col-md-7 col-lg-6">
                    <div class="rel img-block left-column wow fadeInRight">
                        <img style="height: 400px;width: 100%;border-radius: 10px"  class="img-fluid" src="{{asset('home/images/7114.jpg')}}" alt="content-image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="divider">
    <div id="statistic-4" class="pt-70 pb-70 statistic-section division">
        <div class="container">
            <div class="statistic-4-wrapper">
                <div class="row justify-content-md-center row-cols-1 row-cols-md-3">
                    <div id="sb-4-1" class="col">
                        <div class="statistic-block pr-15 d-flex align-items-center wow fadeInUp">
                            <div class="statistic-block-digit">
                                <h2 class="h2-lg statistic-number"><span class="count-element">65</span>هزار </h2>
                            </div>
                            <div class="statistic-block-txt grey-color">
                                <h6 class="h6-md">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. </h6>
                            </div>

                        </div>
                    </div>
                    <div id="sb-4-2" class="col">
                        <div class="statistic-block pr-15 d-flex align-items-center wow fadeInUp">
                            <div class="statistic-block-digit">
                                <h2 class="h2-lg statistic-number"><span class="count-element">54</span>%</h2>
                            </div>
                            <div class="statistic-block-txt grey-color">
                                <h6 class="h6-md">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                            </div>
                        </div>
                    </div>


                    <!-- STATISTIC BLOCK #3 -->
                    <div id="sb-4-3" class="col">
                        <div class="statistic-block pr-15 d-flex align-items-center wow fadeInUp">

                            <!-- Digit -->
                            <div class="statistic-block-digit">
                                <h2 class="h2-lg statistic-number">
                                    <span class="count-element">4</span>.<span class="count-element">86</span>
                                </h2>
                            </div>

                            <!-- Text -->
                            <div class="statistic-block-txt grey-color">
                                <h6 class="h6-md">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</h6>
                            </div>

                        </div>
                    </div>


                </div>
            </div>	<!-- END STATISTIC-4 WRAPPER -->


        </div>	 <!-- End container -->
    </div>
    <hr class="divider">
    <section id="reviews-1" class="bg-whitesmoke-gradient wide-100 reviews-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-70">
                        <h3 class="h2-md">پروژه های ما</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="owl-carousel owl-theme reviews-1-wrapper">
                        @foreach($projects ?? [] as $item)
                            <div class="review-1">
                                <div id="bp-1-1" class="blog-1-post mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="blog-post-img">
                                        <div class="hover-overlay">
                                            <img class="img-fluid" src="{{asset($item->logo)}}" alt="blog-post-image">
                                            <div class="item-overlay"></div>
                                        </div>
                                    </div>
                                    <div class="blog-post-txt">
                                        <h5 class="h5-md">
                                            <a href="{{route('projects.details',$item->id)}}">{{$item->title}} </a>
                                        </h5>
                                        <p class="p-lg">{{substr(str_replace('nbsp;&','',strip_tags($item->description)),0,50) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="features-8" class="wide-60 features-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-70">

                        <!-- Title -->
                        <h3 class="h2-md">                            اخبار شرکت تعاونی طلوع یار
                        </h3>

                        <!-- Text -->

                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                @foreach($news ?? [] as $item)
                    <div class="col">
                        <div id="bp-1-1" class="blog-1-post mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="blog-post-img">
                                <div class="hover-overlay">
                                    <img class="img-fluid" src="{{asset($item->logo)}}" alt="blog-post-image">
                                    <div class="item-overlay"></div>
                                </div>
                            </div>
                            <div class="blog-post-txt">
                                <h5 class="h5-md">
                                    <a href="{{route('news.details',$item->id)}}">{{$item->title}} </a>
                                </h5>
                                <p class="p-lg">{{substr(str_replace('nbsp;&','',strip_tags($item->description)),0,50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section id="features-8" class="wide-60 features-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-70">
                        <h3 class="h2-md"> رویدادها و دستاوردهای شرکت ما</h3>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

                @foreach($events ?? [] as $item)
                    <div class="col">
                        <div id="bp-1-1" class="blog-1-post mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="blog-post-img">
                                <div class="hover-overlay">
                                    <img class="img-fluid" src="{{asset($item->logo)}}" alt="blog-post-image">
                                    <div class="item-overlay"></div>
                                </div>
                            </div>
                            <div class="blog-post-txt">
                                <h5 class="h5-md">
                                    <a href="{{route('events.details',$item->id)}}">{{$item->title}} </a>
                                </h5>
                                <p class="p-lg">{{substr(str_replace('nbsp;&','',strip_tags($item->description)),0,50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
