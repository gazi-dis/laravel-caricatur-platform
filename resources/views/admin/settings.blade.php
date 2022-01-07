@extends('admin.bolumler.theme')
@section('baslik','Site Ayarları')
@section('content')
    <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Site Ayarları</h4>
                                <form id="settings-update" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Site Başlığı</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <input type="text" name="title" class="form-control" value="{{ config('settings.title') }}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">E-Posta</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" name="email" value="{{ config('settings.email') }}" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Telefon</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" name="phone" value="{{ config('settings.phone') }}" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Adres</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="adress" id="" cols="30" rows="5">{{ config('settings.adress') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Facebook Linki</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" name="face-link" value="{{ config('settings.face-link') }}" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">İnstagram Linki</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" name="ig-link" value="{{ config('settings.ig-link') }}" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Twitter Linki</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="text" name="twitter-link" value="{{ config('settings.twitter-link') }}" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">İletişim Açıklaması</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control" name="contact-info" id="" cols="30" rows="5">{{ config('settings.contact-info') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Favicon (Küçük Resim)</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="file" name="favicon" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Site Logo</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="file" name="logo" class="form-control" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button id="settings-update-button" type="submit" class="btn btn-info">Güncelle </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
@endsection