<div>
    @push('style')
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
                        ایجاد تاریخجه</h2>
                </div>
                <div class="body">
                    <form class="form-horizontal" wire:submit.prevent="save">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">تاریخ</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="date" type="text" class="form-control" placeholder="تاریخ را وارد کنید">
                                        @error('date')
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
                                <label for="email_address_2">توضیحات </label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line" wire:ignore>
                                        <textarea wire:model.defer="description"  name="content" id="editor"></textarea>

                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger mt-1">
                                        {{$message}}
                                    </div>
                                    @enderror
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
        <script src="{{asset('panel/assets/js/ckeditor.js')}}"></script>
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
    @endpush
</div>
