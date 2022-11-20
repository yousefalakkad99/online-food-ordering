<div>
    <div class="container" style="padding: 150px 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-md-9">
                                <a href="{{ route("admin.add.food") }}" class="btn btn-success pull-right"> اضافة وجبة </a>
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
                                    <th>رقم الوجبة</th>
                                    <th>الصورة</th>
                                    <th>اسم الوجبة</th>
                                    <th>الوصف</th>
                                    <th>السعر</th>
                                    <th>السعر بعد الخصم</th>
                                    <th>السعرات الحرارية</th>
                                    <th>الصنف</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($foods->Count() >0)
                                @foreach ($foods as $food )
                                <tr>
                                    <td>{{ $food->id }}</td>
                                    <td><img src="{{ asset('/assets/imgs/food') }}/{{ $food->image }}" width="120" /></td>
                                    <td>{{ $food->name }}</td>
                                    <td>{{ $food->description }}</td>
                                    <td>{{ $food->price }}</td>
                                    <td>{{ $food->sale }}</td>
                                    <td>{{ $food->calories }}</td>
                                    <td>{{ $food->category->name }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.edit.food',$food->id) }}">تعديل</i></a>
                                        <a class="btn btn-danger" href="#" onclick="confirm('هل انت متاكد, انت تريد حذف هذه الوجبة ?') || event.stopImmediatePropagation() " wire:click.prevent="delete_food({{ $food->id }})">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1 class="text-center" style="color: #d65106">لا يوجد وجبات </h1>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
