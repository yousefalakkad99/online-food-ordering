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
                                <a href="{{ route("admin.add.category") }}" class="btn btn-success pull-right"> اضافة  صنف</a>
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
                                    <th>رقم الصنف</th>
                                    <th>اسم الصنف</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($categories->Count() >0)
                                @foreach ($categories as $category )
                                <tr>
                                    <td><strong>{{ $category->id }}</strong></td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.edit.category',$category->id) }}">تعديل</a>
                                        <a class="btn btn-danger" href="#" onclick="confirm('هل انت متاكد, انت تريد حذف هذه الوجبة ?') || event.stopImmediatePropagation() " wire:click.prevent="Delete_category({{ $category->id }})">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1 class="text-center" style="color: #d65106">لا يوجد أصناف</h1>
                                @endif
                            </tbody>

                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
