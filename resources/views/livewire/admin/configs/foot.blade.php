<div>
    <script src="{{asset('/panel')}}/assets/js/app.min.js"></script>
    <script src="{{asset('/panel')}}/assets/js/chart.min.js"></script>
    <script src="{{asset('/panel')}}/assets/js/admin.js"></script>
    @stack('script')
    <script src="{{asset('/panel')}}/assets/js/bundles/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('/panel')}}/assets/js/pages/index.js"></script>
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
