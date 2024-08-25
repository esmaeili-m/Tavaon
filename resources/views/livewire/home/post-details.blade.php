<div>
    <section id="single-post" class="wide-100 inner-page-hero single-post-section division">
        <div class="container">


            <!-- SINGLE POST CONTENT -->
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="single-post-wrapper">


                        <!-- SINGLE POST TITLE -->
                        <div class="single-post-title">

                            <!-- CATEGORY -->
                            <p class="p-sm post-tag txt-500 txt-upcase">پروژه ها </p>

                            <!-- TITLE -->
                            <h2 class="h2-md">{{$post->title}}</h2>
                        </div>


                        <!-- BLOG POST TEXT -->
                        <div class="single-post-txt">

                            <!-- Text -->
                            <p class="p-lg">
                                {!! $post->description ?? '' !!}
                            </p>

                        </div>	<!-- END BLOG POST TEXT -->


                        <!-- BLOG POST INNER IMAGE -->



                        <!-- BLOG POST TEXT -->


                        <!-- SINGLE POST SHARE LINKS -->

                    </div>
                </div>
            </div>	<!-- END SINGLE POST CONTENT -->


        </div>     <!-- End container -->
    </section>
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
                                    <a href="{{route('projects.details',$item->id)}}">{{$item->title}} </a>
                                </h5>
                                <p class="p-lg">{{substr(strip_tags($item->description),0,50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>
