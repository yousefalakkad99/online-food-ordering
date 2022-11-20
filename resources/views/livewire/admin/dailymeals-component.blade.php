<div>
    <div class="container" style="padding: 150px 20px;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">

                            <div class="col-md-9">
                                <a href="{{ route("admin.add.dailymeal") }}" class="btn btn-success pull-right"> اضافة وجبة يومية</a>
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
                                    <th>اليوم</th>
                                    <th>اسم الوجبة</th>
                                    <th>الوصف</th>
                                    <th>السعر</th>
                                    <th>السعرات الحرارية</th>
                                    <th>العمليات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if($daily_meal->Count() >0)
                                @foreach ($daily_meal as $daily_meal )
                                <tr>
                                    <td>{{ $daily_meal->id }}</td>
                                    <td><img src="{{ asset('assets/imgs/food') }}/{{ $daily_meal->image }}" width="120" /></td>
                                    <td>{{ $daily_meal->day }}</td>
                                    <td>{{ $daily_meal->name }}</td>
                                    <td>{{ $daily_meal->description }}</td>
                                    <td>{{ $daily_meal->price }}</td>
                                    <td>{{ $daily_meal->calories }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ route('admin.edit.dailymeal',$daily_meal->id) }}">تعديل</a>
                                        <a class="btn btn-danger" href="#" onclick="confirm('هل انت متاكد, انت تريد حذف هذه الوجبة ?') || event.stopImmediatePropagation() " wire:click.prevent="Delete_dailymeal({{ $daily_meal->id }})">حذف</a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <h1 class="text-center" style="color: #d65106">لا يوجد وجبات يومية</h1>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
