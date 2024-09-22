<div>
    <div id="download-page" class="page-hero-section division">
        <div class="page-hero-overlay division">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-txt text-center white-color">

                            <!-- Title -->
                            <h3 class="h2-xs">پروژه های شرکت تعاونی طلوع یار </h3>

                            <!-- Text -->
                            <p class="p-xl"> ما با ایجاد روحیه مشارکتی که باعث ایجاد تجربیات استثنایی ، روابط متعادل و محیط ساخته شده در جامعه می شود ، متعهد هستیم آینده ای پایدار ایجاد کنیم. ساختمان فقط کار نیست. این اشتیاق ماست. با هر پروژه ای که انجام می دهیم ، بهترین صنعت را ارائه می دهیم.
                            </p>

                        </div>
                    </div>
                </div>	  <!-- End row -->
            </div>	   <!-- End container -->
        </div>	 <!-- End hero-overlay -->


        <!-- WAVE SHAPE BOTTOM -->
        <div class="wave-shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80"><path fill="#ffffff" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
        </div>


    </div>
    <section id="blog-1" class="wide-60 blog-section division">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                @foreach($data ?? [] as $item)
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
                                    <a href="{{route('projects.details',$item->slug)}}">{{$item->title}} </a>
                                </h5>
                                <p class="p-lg">{{substr(strip_tags($item->description),0,200) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
