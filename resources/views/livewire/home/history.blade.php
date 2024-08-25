<div>
    @foreach(\App\Models\History::where('status',0)->with('staff')->get() ?? [] as $history)

    <section id="reviews-1" class="bg-whitesmoke-gradient wide-100 reviews-section division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-8">
                    <div class="section-title title-01 mb-70">

                        <!-- Title -->

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
        </div>     <!-- End container -->
    </section>
    @endforeach
</div>
