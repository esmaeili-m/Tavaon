<div>
    <header id="header" class="header tra-menu navbar-dark">
        <div class="header-wrapper">
            <div class="wsmobileheader clearfix">
                <span class="smllogo"><img src="{{asset('home/logo.png')}}" alt="mobile-logo"/></span>
                <a id="wsnavtoggle" class="wsanimated-arrow"><span></span></a>
            </div>
            <div class="wsmainfull menu clearfix">
                <div class="wsmainwp clearfix">
                    <div class="desktoplogo">
                        <a href="#hero-1" class="logo-white"><img width="150px" src="{{asset('home/images/logo.png')}}" alt="header-logo"></a>
                    </div>
                    <nav class="wsmenu clearfix">
                        <ul class="wsmenu-list nav-orange-red-hover">
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('home')}}">صفحه اصلی</a></li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('events')}}">رویداد ها</a></li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('news')}}">اخبار</a></li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('queztions')}}">سوالات متداول</a></li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('projects')}}">پروژه ها </a></li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('about')}}">درباره ما </a></li>
                            <li class="nl-simple" aria-haspopup="true"><a href="{{route('contact')}}">تماس با ما</a></li>
                            <li class="nl-simple" aria-haspopup="true">
                                @auth()
                                    <a  class="{{ request()->routeIs('home') ?'btn btn-tra-white ':'btn custom-blue-button '}} last-link desktop">
                                        پروفایل کاربری</a>
                                    <div style="width: 40px" class="wsmegamenu clearfix halfmenu text-center">
                                        <div class="row">
                                            <ul class="col-lg-12 link-list">
                                                <li><a style="cursor: pointer" href="{{route('profile')}}"> پروفایل کاربری</a></li>
                                                <li><a style="cursor: pointer" href="{{route('chat')}}">ارتباط با ادمین</a></li>
{{--                                                <li><a style="cursor: pointer" href="{{route('user.orders')}}">سفارشات من</a></li>--}}
                                                @if(auth()->user()->role == 3)
                                                    <li><a style="cursor: pointer" href="{{route('dashboard')}}">داشبورد</a></li>
                                                @endif
{{--                                                <li><a style="cursor: pointer" href="{{route('fav')}}">لیست علاقه مندی ها</a></li>--}}
                                                <li><a style="cursor: pointer" wire:click="logout()">خروج</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                @else
                                    <a style="color: black !important;" href="{{route('login')}}" class="btn btn-skyblue tra-grey-hover last-link">ورود</a>
                                @endauth
                            </li>


                            <!-- HEADER SOCIAL LINKS
                            <li class="nl-simple white-color header-socials ico-20 clearfix" aria-haspopup="true">
                                <span><a href="#" class="ico-facebook"><span class="flaticon-facebook"></span></a></span>
                                <span><a href="#" class="ico-twitter"><span class="flaticon-twitter"></span></a></span>
                                <span><a href="#" class="ico-instagram"><span class="flaticon-instagram"></span></a></span>
                                <span><a href="#" class="ico-dribbble"><span class="flaticon-dribbble"></span></a></span>
                            </li> -->


                        </ul>
                    </nav>


                </div>
            </div>

        </div>
    </header>
</div>
