<div>
    <script src="{{asset('home')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('home')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('home')}}/js/modernizr.custom.js"></script>
    <script src="{{asset('home')}}/js/jquery.easing.js"></script>
    <script src="{{asset('home')}}/js/jquery.appear.js"></script>
    <script src="{{asset('home')}}/js/jquery.scrollto.js"></script>
    <script src="{{asset('home')}}/js/menu.js"></script>
    <script src="{{asset('home')}}/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('home')}}/js/isotope.pkgd.min.js"></script>
    <script src="{{asset('home')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('home')}}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('home')}}/js/quick-form.js"></script>
    <script src="{{asset('home')}}/js/request-form.js"></script>
    <script src="{{asset('home')}}/js/jquery.validate.min.js"></script>
    <script src="{{asset('home')}}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{asset('home')}}/js/wow.js"></script>
    <script src="{{asset('home')}}/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('alert', (data) => {
                Swal.fire({
                    text: data.message,
                    icon: data.icon,
                    timer: 2000,
                    showConfirmButton: false,
                })
            });
        });
    </script>
</div>
