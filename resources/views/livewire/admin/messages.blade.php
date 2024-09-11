<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>لیست پیام ها </h2>
                    <div class="row">
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام</th>
                                <th>ایمیل</th>
                                <th>پیام</th>
                                <th>تاریخ</th>
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
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
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
