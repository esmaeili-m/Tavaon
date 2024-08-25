<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                راه های ارتباطی</h2>
        </div>
        <div class="body">
            <form class="form-horizontal" wire:submit.prevent="save">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email_address_2">شماره تماس</label>
                    </div>
                    <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input wire:model.defer="phone" type="text" class="form-control"
                                       placeholder="شماره تماس را وارد کنید">
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
                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email_address_2">آدرس ایمیل</label>
                    </div>
                    <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input wire:model.defer="email" type="text" class="form-control"
                                       placeholder="ایمیل را وارد کنید">
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
                    <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email_address_2">آدرس</label>
                    </div>
                    <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input wire:model.defer="address" type="text" class="form-control"
                                       placeholder="آدرس را وارد کنید">
                                @error('address')
                                <div class="alert alert-danger mt-1">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <input type="checkbox" id="remember_me_4" class="filled-in">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت اطلاعات</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
