<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>لیست رویداد</h2>
                    <a href="{{route('event.create')}}">
                        <button class="btn btn-info btn-border-radius waves-effect mx-2 me-0 mt-5">افزودن رویداد</button>
                    </a>
                    <a href="{{route('event.list')}}">
                        <button class="btn btn-info btn-border-radius waves-effect mx-0 me-0 mt-5">لیست رویدادها</button>
                    </a>
                    <div class="row">
                        <div class="col-sm-12 col-lg-3 mt-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input wire:model.lazy="title" type="text" class="form-control">
                                    <label class="form-label">عنوان رویداد</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-3 mt-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input wire:model.lazy="description" type="text" class="form-control">
                                    <label class="form-label">توضیحات رویداد</label>
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
                            <th>تصویر</th>
                            <th>عنوان</th>
                            <th>تاریخ</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($counter=1)
                        @foreach($data ?? [] as $item)
                            <tr>
                                <th scope="row">{{$counter}}</th>
                                <td>
                                    <img style="border-radius: 5px;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;" width="80px" height="80px" src="{{asset($item->logo)}}">
                                </td>
                                <td>{{$item->title}}</td>
                                <td>
                                    {{$item->time}}
                                </td>
                                <td>
                                    <button wire:click="restore({{$item->id}})" class="btn tblActnBtn">
                                        <i class="material-icons">restore</i>
                                    </button>
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
