<div>
    <section id="features-8" class="wide-60 features-section division mt-10">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-70">

                        <!-- Title -->
                        <h2 class="h2-md">طلوع یار قم…</h2>

                        <!-- Text -->
                        <p class="p-xl">ما در طلوع یار قم با افتخار به ارائه خدمات و راهکارهای تعاونی می‌پردازیم و هدف ما فراهم آوردن تجربه‌ای بی‌نظیر برای مشتریان و شرکای تجاری‌مان است. با سال‌ها تجربه و تیمی متخصص، به دنبال ایجاد ارزش افزوده برای جامعه و کسب و کارها هستیم.
                        </p>

                    </div>
                </div>
            </div>


            <!-- FEATURES-8 WRAPPER -->
            <div class="fbox-8-wrapper text-center">
                <div class="row row-cols-1 row-cols-md-3">

                    @foreach(\App\Models\Setting::whereIn('type',[2,3,4])->get() as $item)
                        @if($item->type == 2)
                            <div class="col">
                                <div class="fbox-8 mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="fbox-img bg-whitesmoke-gradient">
                                        <img class="img-fluid" src="{{asset('home/images/img-21.png')}}" alt="feature-icon">
                                    </div>
                                    <h5 class="h5-md">شمار تلفن</h5>
                                    <p class="p-lg">
                                        برای برقراری تماس تلفنی و دریافت مشاوره فوری، با شماره {{$item->value}} تماس بگیرید. همکاران ما آماده‌اند تا به سوالات و نیازهای شما پاسخ دهند.
                                    </p>
                                </div>
                            </div>
                        @endif
                            @if($item->type == 3)
                            <div class="col">
                                <div class="fbox-8 mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="fbox-img bg-whitesmoke-gradient">
                                        <img class="img-fluid" src="{{asset('home/images/img-21.png')}}" alt="feature-icon">
                                    </div>
                                    <h5 class="h5-md">آدرس ایمیل:</h5>
                                    <p class="p-lg">
                                        برای ارسال پیام یا درخواست‌های خود، لطفاً به آدرس  {{$item->value}}ایمیل بزنید. تیم پشتیبانی ما در اسرع وقت به شما پاسخ خواهد داد.
                                    </p>
                                </div>
                            </div>
                        @endif
                            @if($item->type == 4)
                            <div class="col">
                                <div class="fbox-8 mb-40 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="fbox-img bg-whitesmoke-gradient">
                                        <img class="img-fluid" src="{{asset('home/images/img-21.png')}}" alt="feature-icon">
                                    </div>
                                    <h5 class="h5-md">آدرس :</h5>
                                    <p class="p-lg">
                                        آدرس: برای مراجعه حضوری یا ارسال مدارک و مستندات، لطفاً به آدرس {{$item->value}} مراجعه نمایید. ما در این مکان آماده خدمت‌رسانی به شما هستیم.
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>  <!-- End row -->
            </div>	<!-- END FEATURES-8 WRAPPER -->


        </div>	   <!-- End container -->
    </section>

    <section id="contacts-2" class="bg-snow wide-50 inner-page-hero contacts-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title title-02 mb-80">

                        <!-- Title -->
                        <h2 class="h2-xs">سوالی دارید؟ کمک خواستند؟ دریغ نکنید ، یک خط برای ما بگذارید</h2>

                        <!-- Text -->


                    </div>
                </div>
            </div>


            <!-- CONTACT FORM -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="form-holder">
                        <form wire:submit="save_message()" name="contactform" class="row contact-form" novalidate="novalidate">

                            <div class="col-md-12">
                                <p class="p-lg">نام شما: </p>
                                <span>لطفا نام واقعی خود را وارد کنید: </span>
                                <input type="text" name="name" wire:model.lazy="name" class="form-control name" placeholder="نام شما*">
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">آدرس ایمیل شما: </p>
                                <span>لطفاً آدرس ایمیل خود را با دقت پرکنید.</span>
                                <input type="text" name="email" wire:model.lazy="email" class="form-control email" placeholder="آدرس ایمیل*">
                                @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>

                            <div class="col-md-12">
                                <p class="p-lg">سوال خود را با جزئیات توضیح دهید: </p>
                                <textarea class="form-control message" wire:model.lazy="description" name="message" rows="6" placeholder="من مشکل دارم با..."></textarea>
                                @error('description')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="col-md-12 mt-15 form-btn text-right">
                                <button type="submit" class="btn btn-skyblue tra-grey-hover submit">ارسال درخواست</button>
                            </div>
                            <div class="col-lg-12 contact-form-msg">
                                <span class="loading"></span>
                            </div>

                        </form>
                    </div>
                </div>
            </div>	   <!-- END CONTACT FORM -->
        </div>	   <!-- End container -->
    </section>
</div>
