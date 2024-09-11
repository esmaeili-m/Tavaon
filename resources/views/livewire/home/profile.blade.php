<div>
    <section id="contacts-2" class="bg-snow wide-50 inner-page-hero contacts-section division">
        <div class="container">
            <form wire:submit="update_profile()" name="contactform" class="row contact-form">
                <div class="col-md-6 mb-5">
                    <p class="p-lg">نام شما: </p>
                    <span>لطفا نام خود را وارد کنید: </span>
                    <input wire:model.lazy="name" type="text" name="name" class="form-control name message" placeholder="نام شما*" >
                    @error('name')
                        <div class=" alert alert-danger">
                            این فیلد اجباری است
                        </div>
                    @enderror
                </div>
                <div  class="col-md-6">
                    <p class="p-lg">شماره همراه شما: </p>
                    <span>لطفا شماره همراهی که به نام خود شماست را وارد کنید: </span>
                    <input  wire:model.lazy="phone" type="text" name="email" class="form-control email" placeholder="شماره همراه*">
                    @error('phone')
                        <div class=" alert alert-danger">
                            شماره همراه معتبر نیست.
                        </div>
                    @enderror
                </div>
                <div  class="col-md-6">
                    <p class="p-lg">ایمیل شما: </p>
                    <span>لطفا ایمیل خود را وارد کنید: </span>
                    <input  wire:model.lazy="email" type="text" name="email" class="form-control email" placeholder="ایمیل*">
                    @error('email')
                        <div class=" alert alert-danger">
                            ایمیل معتبر نیست.
                        </div>
                    @enderror
                </div>
                <div  class="col-md-6">
                    <p class="p-lg">رمز عبور خود را تغییر دهید: </p>
                    <span>لطفا رمز عبور جدید خود را وارد کنید: </span>
                    <input  wire:model.lazy="password" type="password" name="email" class="form-control email" placeholder="رمز عبور*">
                    @error('phone')
                        <div class=" alert alert-danger">
                            رمز عبور باید بیش تر از 8 کاراکتر باشد.
                        </div>
                    @enderror
                </div>
                <div class="col-md-12 mt-15 form-btn text-right">
                    <button wire:loading.remove type="submit" class="btn btn-skyblue tra-grey-hover submit">ذخیره</button>
                    <div wire:loading class="spinner-grow text-primary" role="status">
                    </div>
                </div>

                <!-- Contact Form Message -->
                <div class="col-lg-12 contact-form-msg">
                    <span class="loading"></span>
                </div>

            </form>
            <div class="pricing-compare pc-40">
                <div class="row">
                    <div class="col">
                        <h4 class="h3-sm text-center">دارایی ها و توضیحات کاربر</h4>
                        <div class="table-responsive">
                            <table class="table text-center">

                                <thead>
                                <tr>
                                    <th class="text-start" style="width: 34%;">عنوان</th>
                                    <th class="text-start" style="width: 22%;">توضیحات</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                    @foreach($data ?? []  as $item)
                                        <th scope="row" class="text-start">{{$item->title}}</th>
                                        <td class="ico-15 green-color text-start">{{$item->value}}</td>
                                    @endforeach

                                </tr>
                                </tbody>

                            </table>
                        </div>	<!-- End Table -->

                    </div>
                </div>
            </div>
        </div>
    </section>

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
