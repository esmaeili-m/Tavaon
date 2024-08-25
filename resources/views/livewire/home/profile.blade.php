<div>
    <section id="contacts-2" class="bg-snow wide-50 inner-page-hero contacts-section division">
        <div class="container">
            <form wire:submit="update_profile()" name="contactform" class="row contact-form">
                <div class="col-md-6 mb-5">
                    <p class="p-lg">نام شما: </p>
                    <span>لطفا نام خود را وارد کنید: </span>
                    <input wire:model.lazy="name" type="text" name="name" class="form-control name message" placeholder="نام شما*" >
                </div>
                <div  class="col-md-6">
                    <p class="p-lg">شماره همراه شما: </p>
                    <span class="text-danger"> شماره همراه قابل تغییر نمی باشد: </span>
                    <input style="  background-color : #d1d1d1; " disabled value="{{$phone}}" type="text" name="email" class="form-control email" placeholder="شماره همراه*">
                    @error('phone')
                    <div class="mt-1 alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-12 mt-15 form-btn text-right">
                    <button type="submit" class="btn btn-skyblue tra-grey-hover submit">ذخیره</button>
                </div>

                <!-- Contact Form Message -->
                <div class="col-lg-12 contact-form-msg">
                    <span class="loading"></span>
                </div>

            </form>



        </div>
    </section>
    <div wire:ignore  class="modal fade" id="order" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div  class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">تعداد نان مورد نظر را وارد کنید</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div  class="modal-body">
                    <form class="sigin-form">
                        <div class="col-md-12">
                            <input id="count" type="number" name="name" class="form-control name" placeholder="تعداد نان">
                            <div class="d-none alert-danger alert mt-1" id="errorcount">تعداد نان مد نظر خود را وارد کنید</div>
                        </div>
                        <a style="padding: 12px" onclick="validatecount()" class="mt-3 btn btn-stateblue violet-hover last-link coustom-submit">ثبت</a>
                        <a wire:click="set_order" id="set_order" class=""></a>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        function validatecount() {
            const count=document.getElementById('count').value;
            if (count) {
                document.getElementById('errorcount').classList.add('d-none');
                return true;
            } else {
                document.getElementById('errorcount').classList.remove('d-none')
                return false;
            }
        }
    </script>
</div>
