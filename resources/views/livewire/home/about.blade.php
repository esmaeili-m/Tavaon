<div>

    <section id="content-2" class="content-2 wide-60 content-section division">
        <div class="container">
            <div style="margin-top: 40px" class="row d-flex align-items-center">

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
    <section id="reviews-1" class="bg-whitesmoke-gradient wide-100 reviews-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-70">

                        <!-- Title -->
                        <h3 class="h2-md">تیم ما</h3>

                        <!-- Text -->
                        <p class="p-xl">
                            {{$history->date ?? ''}}<br>
                            {!! $history->description ?? '' !!}
                        </p>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="owl-carousel owl-theme reviews-1-wrapper">
                        @foreach($history->staff ?? [] as $key => $item)
                            <div class="review-1">
                                <div class="review-1-txt">
                                    <div class="author-data clearfix">
                                        <div class="review-avatar">
                                            <img src="{{asset($item->logo)}}" alt="review-avatar">
                                        </div>
                                        <div class="review-author">
                                            <h6 class="h6-xl">{{$item->name}}</h6>
                                            <p class="p-md">{{$item->role}}</p>
                                        </div>
                                    </div>
                                    <p class="p-lg">{!! $item->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
            <a href="{{route('history')}}" class="btn btn-skyblue tra-grey-hover last-link">تاریخچه شرکت</a>
        </div>     <!-- End container -->
    </section>

</div>
