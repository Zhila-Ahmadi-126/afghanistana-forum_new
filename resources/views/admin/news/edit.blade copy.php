<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add News</title>

    <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/admin-create.css') }}">

</head>

<body>

    <div class="background">

        <div class="blur one"></div>
        <div class="blur two"></div>
        <div class="blur three"></div>

    </div>

   <div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="font-weight-bold">
            Edit News
        </h2>

        <button id="theme-toggle" class="btn btn-light shadow">

            <i class="bi bi-moon-stars-fill"></i>

        </button>

    </div>

    <form action="{{ route('admin.news.update', $news->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="glass-card">

            <div class="row">

                <!-- ========================= -->
                <!-- FEATURED IMAGE -->
                <!-- ========================= -->

                <div class="col-md-3 text-center">

                    <div class="photo-box" id="dropArea">

                        <img id="preview"
                             src="{{ $news->featured_image ? asset('dashboard/images/news/'.$news->featured_image) : asset('dashboard/images/news/default.JPG') }}"
                             class="avatar-preview">

                    </div>

                    <h5 class="mt-3">
                        Featured Image
                    </h5>

                    <small class="text-muted d-block mb-2">
                        Click or Drag & Drop
                    </small>

                    <input
                        type="file"
                        name="featured_image"
                        id="photo"
                        accept="image/*"
                        hidden>

                </div>

                <!-- ========================= -->
                <!-- NEWS INFORMATION -->
                <!-- ========================= -->

                <div class="col-md-9">

                    <div class="row">

                      

                       
                        <div class="col-md-6 mb-3">

                            <label>Status</label>

                            <select
                                name="status"
                                class="form-control">

                                <option value="draft"
                                    {{ old('status',$news->status)=='draft' ? 'selected' : '' }}>
                                    Draft
                                </option>

                                <option value="published"
                                    {{ old('status',$news->status)=='published' ? 'selected' : '' }}>
                                    Published
                                </option>

                                <option value="archived"
                                    {{ old('status',$news->status)=='archived' ? 'selected' : '' }}>
                                    Archived
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Media Type</label>

                            <select
                                name="media_type"
                                class="form-control">

                                <option value="text"
                                    {{ old('media_type',$news->media_type)=='text' ? 'selected' : '' }}>
                                    Text
                                </option>

                                <option value="image"
                                    {{ old('media_type',$news->media_type)=='image' ? 'selected' : '' }}>
                                    Image
                                </option>

                                <option value="video"
                                    {{ old('media_type',$news->media_type)=='video' ? 'selected' : '' }}>
                                    Video
                                </option>

                                <option value="mixed"
                                    {{ old('media_type',$news->media_type)=='mixed' ? 'selected' : '' }}>
                                    Mixed
                                </option>

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Media URL</label>

                            <input
                                type="url"
                                name="media_url"
                                class="form-control"
                                value="{{ old('media_url',$news->media_url) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>YouTube URL</label>

                            <input
                                type="url"
                                name="youtube_url"
                                class="form-control"
                                value="{{ old('youtube_url',$news->youtube_url) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Source Name</label>

                            <input
                                type="text"
                                name="source_name"
                                class="form-control"
                                value="{{ old('source_name',$news->source_name) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Source URL</label>

                            <input
                                type="url"
                                name="source_url"
                                class="form-control"
                                value="{{ old('source_url',$news->source_url) }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label>Published At</label>

                            <input
                                type="datetime-local"
                                name="published_at"
                                class="form-control"
                                value="{{ old('published_at', optional($news->published_at)->format('Y-m-d\TH:i')) }}">

                        </div>

                    </div>

                </div>

            </div>

            <hr>

        </div>

        <div class="text-right mt-4">

            <a href="{{ route('admin.news.index') }}"
               class="btn btn-secondary">
<br>

                <i class="bi bi-arrow-left"></i>

                Back

            </a>

            <button
                type="submit"
                id="saveBtn"
                class="btn btn-warning">

                <i class="bi bi-pencil-square"></i>

                Update News

            </button>

        </div>

    </form>

</div>
    <script>

document.addEventListener("DOMContentLoaded", function () {

    /* ==========================
       ELEMENTS
    ========================== */

    const form = document.querySelector("form");
    const btn = document.getElementById("saveBtn");

    const body = document.body;
    const toggle = document.getElementById("theme-toggle");
    const icon = toggle ? toggle.querySelector("i") : null;

    const dropArea = document.getElementById("dropArea");
    const photo = document.getElementById("photo");
    const preview = document.getElementById("preview");


    /* ==========================
       CLICK TO SELECT IMAGE
    ========================== */

    if (dropArea) {

        dropArea.addEventListener("click", function () {

            photo.click();

        });

    }


    /* ==========================
       IMAGE PREVIEW
    ========================== */

    if (photo) {

        photo.addEventListener("change", function (e) {

            const file = e.target.files[0];

            if (!file) return;

            preview.src = URL.createObjectURL(file);

        });

    }


    /* ==========================
       DRAG & DROP
    ========================== */

    if (dropArea) {

        ["dragenter", "dragover"].forEach(event => {

            dropArea.addEventListener(event, function (e) {

                e.preventDefault();

                dropArea.classList.add("dragging");

            });

        });


        ["dragleave", "dragend"].forEach(event => {

            dropArea.addEventListener(event, function () {

                dropArea.classList.remove("dragging");

            });

        });


        dropArea.addEventListener("drop", function (e) {

            e.preventDefault();

            dropArea.classList.remove("dragging");

            const file = e.dataTransfer.files[0];

            if (!file) return;

            photo.files = e.dataTransfer.files;

            preview.src = URL.createObjectURL(file);

        });

    }


    /* ==========================
       BUTTON LOADING
    ========================== */

    if (form && btn) {

        form.addEventListener("submit", function () {

            btn.disabled = true;

            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';

        });

    }


    /* ==========================
       DARK MODE
    ========================== */

    if (toggle && icon) {

        if (localStorage.getItem("theme") === "dark") {

            body.classList.add("dark");

            icon.className = "bi bi-sun-fill";

        } else {

            icon.className = "bi bi-moon-stars-fill";

        }

        toggle.addEventListener("click", function () {

            body.classList.toggle("dark");

            if (body.classList.contains("dark")) {

                localStorage.setItem("theme", "dark");

                icon.className = "bi bi-sun-fill";

            } else {

                localStorage.setItem("theme", "light");

                icon.className = "bi bi-moon-stars-fill";

            }

        });

    }


    /* ==========================
       VALIDATION
    ========================== */

    function validate(id, callback) {

        const input = document.getElementById(id);

        if (!input) return;

        input.classList.remove("is-valid", "is-invalid");

        if (callback(input.value)) {

            input.classList.add("is-valid");

        } else {

            input.classList.add("is-invalid");

        }

    }


    if (window.title) {

        title.onkeyup = () => validate("title", value => value.trim().length >= 5);

    }


    if (window.source_name) {

        source_name.onkeyup = () => {

            if (source_name.value.trim() === "") {

                source_name.classList.remove("is-valid", "is-invalid");

                return;

            }

            validate("source_name", value => value.length >= 2);

        };

    }


    if (window.source_url) {

        source_url.onkeyup = () => {

            if (source_url.value.trim() === "") {

                source_url.classList.remove("is-valid", "is-invalid");

                return;

            }

            validate("source_url", value => /^https?:\/\/.+/.test(value));

        };

    }


    if (window.media_url) {

        media_url.onkeyup = () => {

            if (media_url.value.trim() === "") {

                media_url.classList.remove("is-valid", "is-invalid");

                return;

            }

            validate("media_url", value => /^https?:\/\/.+/.test(value));

        };

    }


    if (window.youtube_url) {

        youtube_url.onkeyup = () => {

            if (youtube_url.value.trim() === "") {

                youtube_url.classList.remove("is-valid", "is-invalid");

                return;

            }

            validate("youtube_url", value => /^https?:\/\/.+/.test(value));

        };

    }

});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>