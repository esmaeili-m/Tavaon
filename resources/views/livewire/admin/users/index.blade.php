<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>لیست کاربران</h2>
                    <a href="{{route('user.create')}}">
                        <button class="btn btn-info btn-border-radius waves-effect mx-2 me-0 mt-5">افزودن کاربر</button>
                    </a>
                    <a href="{{route('user.trash')}}">
                        <button class="btn btn-info btn-border-radius waves-effect mx-0 me-0 mt-5">کاربران حذف شده ( {{\App\Models\User::onlyTrashed()->count()}} )</button>
                    </a>
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 mt-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input wire:model.lazy="name" type="text" class="form-control">
                                    <label class="form-label">نام کاربر</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 mt-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input wire:model.lazy="email" type="text" class="form-control">
                                    <label class="form-label">ایمیل کاربر</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 mt-5">
                            <button wire:click="search_user" class="btn btn-primary btn-border-radius waves-effect m-lg-2"><i class="fa fa-search"></i></button>
                        </div>
                    </div>

                </div>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>ایمیل</th>
                            <th>وضعیت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if($item->status)
                                        <button wire:click="status({{$item->id}})" class="btn-hover btn-border-radius color-8 mx-0">فعال</button>
                                    @else
                                        <button wire:click="status({{$item->id}})" class="btn-hover btn-border-radius color-2 mx-0">غیر فعال</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.update',$item->id)}}"><button class="btn tblActnBtn">
                                        <i class="material-icons">mode_edit</i>
                                    </button></a>
                                    <button wire:click="delete({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                            @php($counter++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
