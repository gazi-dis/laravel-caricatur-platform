@extends('admin.bolumler.theme')
@section('baslik','Profil')
@section('content')
    <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Profil</h4>
                                <form id="profile-update">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">İsim</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                        <input type="text" name="isim" class="form-control" value="{{ $user->name }}" placeholder="İsminiz">
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
                                                            <input type="text" name="eposta" value="{{ $user->email }}" class="form-control" placeholder="E-Posta Adresiniz">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Eski Parola</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="password" name="eskiParola" class="form-control" placeholder="Eski Parolanız">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <div class="row">
                                                <label class="col-lg-2">Yeni Parola</label>
                                                <div class="col-lg-10">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="password" name="yeniParola" class="form-control" placeholder="Yeni Parolanız">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button id="profile-update-button" type="submit" class="btn btn-info">Güncelle </button>
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