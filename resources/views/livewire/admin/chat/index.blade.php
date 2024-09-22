<div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>لیست پیام ها جدید</h2>
                    <div class="row">
                </div>
                <div class="body table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام</th>
                            <th>اخرین پیام</th>
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
                                <td>{{$item->latestChat->message}}</td>
                                <td>{{verta($item->latestChat->created_at)->format('H:i:s Y-m-d')}}</td>
                                <td>
                                    <a href="{{route('chat.user',$item->id)}}"><button class="btn tblActnBtn">
                                            <i class="material-icons">chat</i>
                                        </button>
                                    </a>
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
