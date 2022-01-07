@extends('admin.bolumler.theme')
@section('baslik','İçeriği Düzenle')
@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">İçerikler</h4>
                    <form id="update-post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group mt-4">
                                <div class="row">
                                    <label class="col-lg-2">Başlık</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <input type="text" name="baslik" value="{{ $post->title }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4">
                                <div class="row">
                                    <label class="col-lg-2">Görsel</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="file" name="resim" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                            <input id="update-id" type="hidden" name="id" value="{{ $post->id }}">
                                <button id="update-post-button" type="submit" class="btn btn-info">Ekle </button>
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