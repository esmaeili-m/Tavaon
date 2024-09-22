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
                        ایجاد خبر</h2>
                </div>
                <div class="body">
                    <form class="form-horizontal" wire:submit.prevent="save">
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="email_address_2">عنوان خبر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.defer="title" type="text" class="form-control" placeholder="عنوان خبر را وارد کنید">
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
                                <label for="email_address_2">لینک خبر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input wire:model.lazy="slug" type="text" class="form-control" placeholder="لینک خبر را وارد کنید">
                                        @error('slug')
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
                                <label for="email_address_2">توضیحات خبر</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line" wire:ignore>
                                        <textarea wire:model.defer="description"  name="content" id="editor">{{$description}}</textarea>
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
            <script src="{{asset('panel/assets/js/tinymce.min.js')}}" referrerpolicy="origin"></script>
            <script>
                tinymce.init({
                    menubar: false,
                    language:'fa',
                    statusbar: false,
                    selector: 'textarea',
                    plugins: 'autolink autosave save directionality code fullscreen link media codesample charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount charmap emoticons accordion image imagetools',
                    toolbar: "undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image rtl ltr",
                    image_title: true,
                    automatic_uploads: true,
                    images_upload_url: '/dashboard/upload-image-tinymce', // مسیر آپلود تصویر
                    file_picker_types: 'image',
                    file_picker_callback: function (callback, value, meta) {
                        if (meta.filetype === 'image') {
                            var input = document.createElement('input');
                            input.setAttribute('type', 'file');
                            input.setAttribute('accept', 'image/*');
                            input.onchange = function () {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function () {
                                    var id = 'blobid' + (new Date()).getTime();
                                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                    var base64 = reader.result.split(',')[1];
                                    var blobInfo = blobCache.create(id, file, base64);
                                    blobCache.add(blobInfo);

                                    callback(blobInfo.blobUri(), { title: file.name });
                                };
                                reader.readAsDataURL(file);
                            };

                            input.click();
                        }
                    },
                    setup: function (editor) {
                        editor.on('change', function () {
                            editor.save();
                        @this.set('description',editor.getContent(),false)
                        });
                    }
                });
            </script>
        <script src="{{asset('panel')}}/assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
        <script src="{{asset('panel')}}/assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
        <script src="{{asset('panel')}}/assets/js/pages/forms/advanced-form-elements.js"></script>
    @endpush
</div>
