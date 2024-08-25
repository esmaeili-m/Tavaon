<div>
    <div id="faqs-page" class="page-hero-section division">
        <div class="page-hero-overlay division">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xl-8">
                        <div class="hero-txt text-center white-color">

                            <h2 class="h2-xs">سوالات متداول</h2>
                            <p class="p-xl">در این بخش، تلاش کرده‌ایم به پرتکرارترین سوالاتی که ممکن است درباره محصولات، خدمات و فرآیندهای ما داشته باشید، پاسخ دهیم. هدف ما از ایجاد این صفحه، ارائه اطلاعات دقیق و مفید به شماست تا بتوانید به سرعت پاسخ سوالات خود را پیدا کنید و تجربه‌ای بهتر و راحت‌تر از خدمات ما داشته باشید.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wave-shape-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 80"><path fill="#ffffff" fill-opacity="1" d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path></svg>
        </div>
    </div>
    <section id="faqs-2" class="wide-60 faqs-section division">
        <div class="container">
            <div class="faqs-2-questions">
                <div class="row row-cols-1 row-cols-lg-12">
                    <div class="row">
                        @foreach(\App\Models\Queztions::get() as $item)
                            <div class="col-6">
                                <div class="questions-holder pr-15">
                                        <div class="question wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                            <h5 class="h5-md">{{$item['title'] ?? ''}}</h5>
                                            <p class="p-lg">
                                                {{$item['description'] ?? ''}}
                                            </p>
                                        </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="more-questions">
                        <h5 class="h5-sm">سوالات بیشتری دارید؟ <a href="{{route('contact')}}">سوال خود را اینجا مطرح کنید</a></h5>
                    </div>
                </div>
            </div>


        </div>	   <!-- End container -->
    </section>
</div>
