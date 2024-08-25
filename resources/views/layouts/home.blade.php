<!DOCTYPE html>
<!-- اولمو - قالب چند منظوره نرم افزار و استارت آپ  شرکتی html design by theme-file.ir (http://www.theme-file.ir) -->
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->  <!--طراح و توسعه دهنده قالب های اچ تی ام ال و وردپرس جعفر عباسی><!-->
<html lang="en">



<livewire:home.configs.head/>


<body>




<!-- PRELOADER SPINNER
============================================= -->
{{--<div id="loading" class="orange-red-loading">--}}
{{--    <div id="loading-center">--}}
{{--        <div id="loading-center-absolute">--}}
{{--            <div class="object" id="object_one"></div>--}}
{{--            <div class="object" id="object_two"></div>--}}
{{--            <div class="object" id="object_three"></div>--}}
{{--            <div class="object" id="object_four"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div id="page" class="page">
<livewire:home.configs.header/>
    {{$slot}}




   <livewire:home.configs.footer/>
   <livewire:home.configs.foot/>
    @livewireScripts
</div>
</body>




</html>
