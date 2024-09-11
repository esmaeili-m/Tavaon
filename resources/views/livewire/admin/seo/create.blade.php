<div>
    @push('style')
        <link href="{{asset('panel/')}}/assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css"
              rel="stylesheet"/>
        <link href="{{asset('panel/')}}/assets/js/bundles/multiselect/css/multi-select.css" rel="stylesheet">
    @endpush
    <div class="card">
        <div class="header">
            <h2>
                ایجاد صفحه</h2>
        </div>
        <div class="body">
            <form class="form-horizontal" wire:submit.prevent="save">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="password_2">صفحه</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div wire:ignore class="form-line">
                                <select wire:model.defer="role">
                                    <option value="" disabled selected>گزینه خود را انتخاب کنید</option>
                                    @foreach(\App\Models\Post::pluck('title','id') as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                    @foreach(\App\Models\Events::pluck('title','id') as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                    @foreach(\App\Models\News::pluck('title','id') as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach

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
    @push('script')
        <script src="{{asset('panel')}}/assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
        <script src="{{asset('panel')}}/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
        <script src="{{asset('panel')}}/assets/js/pages/forms/advanced-form-elements.js"></script>
    @endpush
</div>
