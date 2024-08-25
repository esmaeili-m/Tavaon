<div>
    @push('style')
        <link href="{{asset('panel/')}}/assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css"
              rel="stylesheet"/>
        <link href="{{asset('panel/')}}/assets/js/bundles/multiselect/css/multi-select.css" rel="stylesheet">
    @endpush
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ایجاد کاربر</h2>
                </div>
                <div class="body">
                    <form class="form-horizontal" wire:submit="save">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">نام کاربر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="name" type="text" class="form-control" placeholder="نام کاربر را وارد کنید">
                                        @error('name')
                                            <div class="alert alert-danger mt-1">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">کد ملی</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="code_meli" type="text" class="form-control" placeholder="کدملی کاربر را وارد کنید">
                                        @error('code_meli')
                                        <div class="alert alert-danger mt-1">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">شماره همراه</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="phone" type="text" class="form-control"
                                               placeholder="شماره همراه کاربر را وارد کنید">
                                        @error('phone')
                                        <div class="alert alert-danger mt-1">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">آدرس ایمیل</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="email" type="text" class="form-control"
                                               placeholder="آدرس ایمیل خود را وارد کنید">
                                        @error('email')
                                        <div class="alert alert-danger mt-1">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">رمز عبور</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="password"  type="password" id="password_2" class="form-control"
                                               placeholder="رمز عبور خود را وارد کنید">
                                        @error('password')
                                        <div class="alert alert-danger mt-1">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">نقش کاربر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div wire:ignore class="form-line">
                                        <select wire:model.defer="role">
                                            <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                            <option value="1">کاربر عادی</option>
                                            <option value="2">ادمین</option>
                                        </select>
                                    </div>
                                    @error('role')
                                    <div class="alert alert-danger mt-1">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <input type="checkbox" id="remember_me_4" class="filled-in">
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت اطلاعات</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="{{asset('panel')}}/assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
        <script src="{{asset('panel')}}/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
        <script src="{{asset('panel')}}/assets/js/pages/forms/advanced-form-elements.js"></script>
    @endpush
</div>
