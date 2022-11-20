<div>
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>معلومات الأتصال</h1>
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
                        <h2>تعديل معلومات الأتصال</h2>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <form enctype="multipart/form-data" wire:submit.prevent="edit_contact">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <input type="text" placeholder="رقم الهاتف" class="form-control" wire:model="phone"  />
                                                @error('phone')
                                                <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text"  placeholder="البريد الألكتروني" class="form-control" wire:model="email"  />
                                            @error('email')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="الموقع" class="form-control" wire:model="location" />
                                            @error('location')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="من نحن" class="form-control" wire:model="about_us" />
                                            @error('about_us')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="facebook" class="form-control" wire:model="facebook" />
                                            @error('facebook')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="instagram" class="form-control" wire:model="instagram" />
                                            @error('instagram')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="whatsapp" class="form-control" wire:model="whatsapp" />
                                            @error('whatsapp')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="snapchat" class="form-control" wire:model="snapchat" />
                                            @error('snapchat')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-success"  type="submit">تعديل</button>
                                        <a class="btn btn-warning" href="{{ route('admin.dailymeal') }}" style="color: #d65106">رجوع</a>
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
