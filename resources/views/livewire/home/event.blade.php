<div>
    <div id="download-page" class="page-hero-section division">
        <div class="page-hero-overlay division">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-txt text-center white-color">

                            <!-- Title -->
                            <h4 class="h4-xs">رویداد های شرکت تعاونی طلوع یار </h4>

                            <!-- Text -->
                            <h5 style="line-height: 40px" class="p-xl"> در این بخش، شما می‌توانید از آخرین اخبار، رویدادها و دستاوردهای شرکت ما مطلع شوید. هدف ما ارائه اطلاعات به‌روز و دقیق درباره پروژه‌های در حال اجرا، افتتاحیه‌ها، جشنواره‌های فروش، جوایز و دستاوردهای شرکت است. همچنین، گزارش‌های دوره‌ای عملکرد و برنامه‌های آینده شرکت را می‌توانید در اینجا مشاهده کنید.
                            </h5>

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
