<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 150px 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-md-9">
                                <a href="{{ route("admin.add.Gallary") }}" class="btn btn-success pull-right"> اضافة  صورة</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <thead>
                                <tr>
                                    <th>رقم الصورة</th>
                                    <th>الصورة</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($gallaries->Count() >0)
                                @foreach ($gallaries as $gallary )
                                <tr>
                                    <td><strong>{{ $gallary->id }}</strong></td>
                                    <td><img src="{{ asset('/assets/imgs/gallary') }}/{{ $gallary->image }}" width="120" /></td>
                                    <td>

                                        <a class="btn btn-danger" href="#" onclick="confirm('هل انت متاكد, انت تريد حذف هذه الصورة ?') || event.stopImmediatePropagation() " wire:click.prevent="Delete_image({{ $gallary->id }})">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1 class="text-center" style="color: #d65106"> يوجد صور</h1>
                                @endif
                            </tbody>

                        </table>
                        {{ $gallaries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
