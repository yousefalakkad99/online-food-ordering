<div>
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>تعديل صنف</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->

    <!-- Start Reservation -->
    <div class="reservation-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>تعديل</h2>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <form  wire:submit.prevent="edit_category">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="اسم الصنف" class="form-control" wire:model="name"  />
                                                @error('name')
                                                <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-success"  type="submit">تعديل</button>
                                        <a class="btn btn-warning" href="{{ route('admin.category') }}" style="color: #d65106">رجوع</a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
