<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>INSTA+</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="/plantillanew/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/themes/layout/header/base/light.css?v=7.2.0" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/themes/layout/header/menu/light.css?v=7.2.0" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/themes/layout/brand/dark.css?v=7.2.0" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/themes/layout/aside/dark.css?v=7.2.0" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/themes/layout/brand/light.css?v=1.6" rel="stylesheet" type="text/css" />
        <link href="/plantillanew/css/themes/layout/aside/light.css?v=1.6" rel="stylesheet" type="text/css" />
        <link href="/css/custom.css?v=1.6" rel="stylesheet" type="text/css" />

    </head>
    <body class="antialiased">

    <section class="container padding_section ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="container py-3 d-flex justify-content-center">
                            <img class="img-fluid" width="60%" src="{{asset('imagenes/logoinsta.png')}}">
                        </div>
                        <span style="font-size: 40px" class="d-flex text-center justify-content-center py-3">Intuitive, Easy & Friendly Web-App</span>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 16px;  text-align: center;">
                            Convert an existing image to an A # paper size <strong>insta</strong>ntly.
                        </p>

                        <form action="{{route('imageUpload')}}" id="frmImage" method="post" enctype="multipart/form-data">

                            @csrf

                                <div class="form-group justify-content-center row">
                                    <div class="col-md" style="">
                                        <label class="text-left" style="display: grid;">Set Paper:</label>
                                        <select class="form-control ml-auto " name="sizepage" id="sizepage">
                                            <option value="A4">A4</option>
                                        </select>
                                    </div>
                                </div>

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="user-image mb-3 text-center">
                                <div class="imgPreview"> </div>
                            </div>

                            <div class="custom-file">
                                <input type="file" name="imageFile[]" class="custom-file-input" id="images" multiple="multiple">
                                <label class="custom-file-label" for="images">Choose image</label>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                                Upload Images
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="output"></section>

    <!--end::Entry-->

    <script src="/plantillanew/plugins/global/plugins.bundle.js"></script>
    <script src="/plantillanew/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="/plantillanew/js/scripts.bundle.js"></script>
    <script src="/plantillanew/js/pages/widgets.js"></script>
    <script src="/plantillanew/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.0"></script>

    <script src="{{ asset('js/drag_drop.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
