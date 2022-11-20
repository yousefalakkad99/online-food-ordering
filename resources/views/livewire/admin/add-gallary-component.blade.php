<div>
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>أضافة صورة</h1>
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
                        <h2>أضافة</h2>
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="contact-block">
                        <form  wire:submit.prevent="add_gallary">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group" style="text-align: center">
                                            <input type="file"  class="form-control" wire:model="image" />
                                            @error('image')
                                            <h3 class="text-danger" style="text-align:right">{{ $message }}</h3>
                                            @enderror
                                            @if ($image)
                                            @if ($image->getclientoriginalextension() == "jpg" || $image->getclientoriginalextension() == "png" || $image->getclientoriginalextension() == "jpeg")
                                            <img src="{{ $image->temporaryUrl() }}" width="400" height="300" />
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit-button text-center">
                                        <button class="btn btn-success"  type="submit">أضافة</button>
                                        <a class="btn btn-warning" href="{{ route('admin.Gallary') }}" style="color: #d65106">رجوع</a>
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
