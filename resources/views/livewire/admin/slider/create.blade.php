<div>
    @push('style')
        <link href="{{asset('panel/')}}/assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css"
              rel="stylesheet"/>
        <link href="{{asset('panel/')}}/assets/js/bundles/multiselect/css/multi-select.css" rel="stylesheet">
        <style>
            .ck-editor__editable {
                min-height: 400px; /* حداقل ارتفاع ویرایشگر */
                max-height: 600px; /* حداکثر ارتفاع ویرایشگر */
            }
        </style>
    @endpush
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ایجاد اسلایدر</h2>
                </div>
                <div class="body">
                    <form class="form-horizontal" wire:submit.prevent="save">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">عنوان اسلایدر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="title" type="text" class="form-control" placeholder="عنوان اسلایدر را وارد کنید">
                                        @error('title')
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
                                <label for="email_address_2">رنگ متن</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="color" type="text" class="form-control" placeholder="رنگ متن اسلایدر را وارد کنید">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">توضیحات اسلایدر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line" wire:ignore>
                                        <textarea class="form-control" wire:model.defer="description"  name="content" rows="10"></textarea>
                                        @error('description')
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
                                <label for="email_address_2">تصویر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>فایل</span>
                                                <input wire:model.lazy="logo" type="file">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input wire:model.lazy="logo" class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        @error('logo')
                                        <div class="alert alert-danger mt-1">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <button wire:loading.remove type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت اطلاعات</button>
                                <div wire:loading class="spinner-grow text-primary" style="width: 3rem; height: 3rem;"
                                     role="status">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    language: 'fa',
                    ckfinder: {
                        uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token(), 'type' => 'news']) }}",
                        headers: {
                            'X-File-Type': 'news'
                        }
                    }
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        </script>
        <script src="{{asset('panel')}}/assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
        <script src="{{asset('panel')}}/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
        <script src="{{asset('panel')}}/assets/js/pages/forms/advanced-form-elements.js"></script>
    @endpush
</div>
