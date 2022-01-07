@extends('admin.bolumler.theme')
@section('baslik','İçerikler')
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
                    <form id="add-post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="form-group mt-4">
                                <div class="row">
                                    <label class="col-lg-2">Başlık</label>
                                    <div class="col-lg-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="text" name="baslik" class="form-control">
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
                                <button id="add-post-button" type="submit" class="btn btn-info">Ekle </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Eklenen İçerikler</h4>
                    <div id="post-kutu" class="row d-flex justify-content-center">
                        @foreach ($posts as $post)
                        <div id="post-{{ $post->id }}" class="card col-md-4 mt-3">
                            <img class="card-img-top mt-3" src="{{ asset($post->featured) }}"
                                alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title text-center"><b>{{ $post->title }}</b></h5>
                                <p class="card-text text-center">{{ $post->content }}</p>
                                <p>
                                    <div class="d-flex justify-content-center">
                                        <a href="update-post/{{  $post->id  }}"><button
                                                class="btn btn-secondary px-2 mr-1"
                                                style="border-radius: 50px;">Güncelle</button></a>
                                        <a type="button" onclick="deletePost({{ $post->id }})"><button
                                                id="delete-post-button" class="btn btn-danger px-4 ml-1"
                                                style="border-radius: 50px;">Sil</button></a>
                                    </div>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
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