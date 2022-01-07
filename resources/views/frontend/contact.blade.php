@extends('frontend.bolumler.theme')
@section('baslik','İletişim')
@section('content')
<section class="page-title section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="text-capitalize mb-0 text-lg">Bizimle İletişime Geçin</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact form start -->
<section class="contact section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4 mb-lg-0 col-md-4">
                <h4>İletişime Geçin</h4>
            <p>{{ config('settings.contact-info') }}</p>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 col-md-4">
                <h4>Adres</h4>
                <p>{{ config('settings.adress') }}</p>
            </div>
            <div class="col-lg-4 col-md-4">
                <h4>İletişim Bilgilerimiz</h4>
                <p class="mb-0">{{ config('settings.email') }}</p>
                <p class="mb-0">{{ config('settings.phone') }}</p>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8">
                <div class="text-center mb-5 contact-title">
                    <h2>İletişim Formu</h2>
                </div>

                <form id="contact-form" class="contact__form mt-5" method="post" action="mail.php">
                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Mesajınız başarılı bir şekilde gönderildi.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <input name="name" type="text" class="form-control" placeholder="İsminiz">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-3">
                                <input name="name" type="text" class="form-control" placeholder="Konu">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group mb-3">
                                <input name="email" type="email" class="form-control" placeholder="Email Adresiniz">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group-2 mb-4">
                                <textarea name="message" class="form-control" rows="6"
                                    placeholder="Mesajınız"></textarea>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-main" name="submit" type="submit">Gönder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- free block -->
@endsection