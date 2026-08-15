            <!DOCTYPE html>
            <html lang="en">

            <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Add Administrator</title>

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
            Add Administrator
            </h2>

            <button id="theme-toggle" class="btn btn-light shadow">

            <i class="bi bi-moon-stars-fill"></i>

            </button>

            </div>

          <form action="{{ route('admin.users.store') }}"
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
            <!-- PHOTO -->
            <!-- ========================= -->

            <div class="col-md-3 text-center">

                <div class="photo-box" id="dropArea">

                    <img id="preview"
                         src="{{ asset('storage/avatar/default.JPG') }}"
                         class="avatar-preview">

                </div>

                <h4>Choose your avatar or your photo</h4>

                <!-- عکس آپلودی -->
                <input type="file"
                       name="photo"
                       id="photo"
                       hidden>

                <!-- آواتار انتخابی -->
                <input type="hidden"
                       name="selected_avatar"
                       id="selectedAvatar">

            </div>

            <!-- ========================= -->
            <!-- USER INFORMATION -->
            <!-- ========================= -->

            <div class="col-md-9">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>First Name</label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="form-control"
                            value="{{ old('first_name') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Last Name</label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="form-control"
                            value="{{ old('last_name') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Username</label>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control"
                            value="{{ old('username') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Phone</label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Gender</label>

                        <select
                            name="gender"
                            class="form-control">

                            <option value="Male">Male</option>
                            <option value="Female">Female</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Role</label>

                        <select
                            name="role"
                            class="form-control">

                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                            <option value="user">User</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Status</label>

                        <select
                            name="status"
                            class="form-control">

                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="pending">Pending</option>

                        </select>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Password</label>

                        <div class="password-box">

                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control">

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="password">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Confirm Password</label>

                        <div class="password-box">

                            <input
                                type="password"
                                name="password_confirmation"
                                id="password_confirmation"
                                class="form-control">

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="password_confirmation">

                                <i class="bi bi-eye"></i>

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <hr>

      <hr>

                            <div class="ZAedAge-container">

                                <!-- Header -->
                                <div class="ZAedAge-header">

                                    <div class="ZAedAge-titleBox">

                                        <h2 class="ZAedAge-title">
                                            Administrator Permissions
                                        </h2>

                                        <p class="ZAedAge-subTitle">
                                            Manage administrator access permissions.
                                        </p>

                                    </div>

                                    <label class="ZAedAge-masterLabel">

                                        <input type="checkbox" id="ZAedAge-selectAll">

                                        <span class="ZAedAge-masterCheck"></span>

                                        <span class="ZAedAge-masterText">
                                            Select All
                                        </span>

                                    </label>

                                </div>


                                {{-- ========================= --}}
                                {{-- GROUP LOOP --}}
                                {{-- ========================= --}}

                                @foreach($permissions as $group => $items)

                                    @php
                                        $permission = $items->first();
                                    @endphp

                                    <div class="ZAedAge-group">

                                        <div class="ZAedAge-groupHeader">

                                            <div class="ZAedAge-groupTitle">

                                                <span class="ZAedAge-dot"></span>

                                                <span>
                                                    {{ ucfirst($group) }}
                                                </span>

                                            </div>

                                            <label class="ZAedAge-groupLabel">

                                                <input type="checkbox" class="ZAedAge-groupCheck">

                                                <span class="ZAedAge-groupCheckbox"></span>

                                                <span>Select Group</span>

                                            </label>

                                        </div>


                                        <div class="ZAedAge-grid">

                                            {{-- VIEW --}}
                                            <label class="ZAedAge-card">

                                                <input type="checkbox"
                                                    class="ZAedAge-itemCheck"
                                                    name="permissions[]"
                                                    value="{{ $permission->slug }}.view">

                                                <div class="ZAedAge-cardBox">

                                                    <div class="ZAedAge-icon">👁</div>

                                                    <div class="ZAedAge-cardTitle">View</div>

                                                </div>

                                            </label>


                                            {{-- CREATE --}}
                                            <label class="ZAedAge-card">

                                                <input type="checkbox"
                                                    class="ZAedAge-itemCheck"
                                                    name="permissions[]"
                                                    value="{{ $permission->slug }}.create">

                                                <div class="ZAedAge-cardBox">

                                                    <div class="ZAedAge-icon">➕</div>

                                                    <div class="ZAedAge-cardTitle">Create</div>

                                                </div>

                                            </label>


                                            {{-- EDIT --}}
                                            <label class="ZAedAge-card">

                                                <input type="checkbox"
                                                    class="ZAedAge-itemCheck"
                                                    name="permissions[]"
                                                    value="{{ $permission->slug }}.edit">

                                                <div class="ZAedAge-cardBox">

                                                    <div class="ZAedAge-icon">✏</div>

                                                    <div class="ZAedAge-cardTitle">Edit</div>

                                                </div>

                                            </label>


                                            {{-- DELETE --}}
                                            <label class="ZAedAge-card">

                                                <input type="checkbox"
                                                    class="ZAedAge-itemCheck"
                                                    name="permissions[]"
                                                    value="{{ $permission->slug }}.delete">

                                                <div class="ZAedAge-cardBox">

                                                    <div class="ZAedAge-icon">🗑</div>

                                                    <div class="ZAedAge-cardTitle">Delete</div>

                                                </div>

                                            </label>

                                        </div>

                                    </div>

                                @endforeach

    </div>

    <div class="text-right mt-4">

        <a href="{{ route('admin.users.index') }}"
           class="btn btn-secondary">
<br>

            <i class="bi bi-arrow-left"></i>

            Back

        </a>
        <button type="submit" id="saveBtn" class="btn btn-primary">
            <i class="bi bi-check-circle"></i>
            Save Administrator
        </button>
       

    </div>

</form>
    </div>

<!-- ========================= -->
<!-- AVATAR MODAL -->
<!-- ========================= -->

<div class="modal fade" id="avatarModal" tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content glass-card">

            <div class="modal-header">

                <h5>Choose Avatar or Upload</h5>

                <button class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">
                <input
                type="hidden"
                name="selected_avatar"
                id="selectedAvatar">

                <h6>👤 Avatars</h6>

                <div class="avatar-grid">

                    @for($i=1;$i<=8;$i++)

                        <img src="{{ asset('storage/avatar/male/'.$i.'.JPG') }}"
                             class="choose-avatar"
                             data-avatar="male/{{ $i }}.JPG">

                       <img src="{{ asset('storage/avatar/female/'.$i.'.JPG') }}"
                             class="choose-avatar"
                             data-avatar="female/{{ $i }}.JPG">

                    @endfor

                </div>

                <hr>

                <div class="text-center mt-4">

                    <p class="text-muted">or</p>

                    <button type="button"
                            id="chooseFileBtn"
                            class="btn btn-outline-primary">

                        Choose your photo

                    </button>

                  
                </div>

            </div>

            <div class="modal-footer">

                <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal">

                Close

            </button>

            </div>

        </div>

    </div>

</div>


<script>


    document.addEventListener("DOMContentLoaded", function () {

    /* =========================
    ELEMENTS
    ========================= */
    const form = document.querySelector("form");
    const btn = document.getElementById("saveBtn");

    const body = document.body;
    const toggle = document.getElementById("theme-toggle");
    const icon = toggle ? toggle.querySelector("i") : null;

    const dropArea = document.getElementById("dropArea");
    const modalEl = document.getElementById("avatarModal");

    const photo = document.getElementById("photo");
    const preview = document.getElementById("preview");


    /* =========================
    PREVIEW FILE INPUT
    ========================= */
    if (photo) {
    photo.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (file) {
    preview.src = URL.createObjectURL(file);
    }
    });
    }


    /* =========================
    FORM LOADING
    ========================= */
    if (form && btn) {
    form.addEventListener("submit", function () {
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';
    });
    }


    /* =========================
    THEME TOGGLE (SAFE)
    ========================= */
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


    /* =========================
    PASSWORD TOGGLE
    ========================= */
    document.querySelectorAll(".password-toggle").forEach(btn => {

    btn.addEventListener("click", function () {

    const input = document.getElementById(this.dataset.target);
    const icon = this.querySelector("i");

    if (!input) return;

    if (input.type === "password") {
    input.type = "text";
    icon.className = "bi bi-eye-slash";
    } else {
    input.type = "password";
    icon.className = "bi bi-eye";
    }

    });

    });


    /* =========================
    VALIDATION
    ========================= */
    function validate(id, condition) {

    const input = document.getElementById(id);
    if (!input) return;

    input.classList.remove("is-valid", "is-invalid");

    if (condition(input.value)) {
    input.classList.add("is-valid");
    } else {
    input.classList.add("is-invalid");
    }
    }

    if (window.first_name) first_name.onkeyup = () => validate("first_name", v => v.length >= 2);
    if (window.last_name) last_name.onkeyup = () => validate("last_name", v => v.length >= 2);
    if (window.username) username.onkeyup = () => validate("username", v => v.length >= 4);
    if (window.email) email.onkeyup = () => validate("email", v => /\S+@\S+\.\S+/.test(v));


    /* =========================
    DRAG & DROP UPLOAD
    ========================= */
    if (dropArea && photo) {

    dropArea.addEventListener("click", function () {
    bootstrap.Modal.getOrCreateInstance(modalEl).show();
    });

    dropArea.addEventListener("dragover", e => {
    e.preventDefault();
    dropArea.classList.add("drag");
    });

    dropArea.addEventListener("dragleave", () => {
    dropArea.classList.remove("drag");
    });

    dropArea.addEventListener("drop", e => {

    e.preventDefault();

    dropArea.classList.remove("drag");

    photo.files = e.dataTransfer.files;

    const file = e.dataTransfer.files[0];
    if (file) preview.src = URL.createObjectURL(file);

    });

    }


    /* =========================
    AVATAR MODAL SYSTEM (FIXED + SAFE)
    ========================= */
    if (modalEl && photo && preview) {

    document.querySelectorAll(".choose-avatar").forEach(img => {

    img.addEventListener("click", function () {

    document.querySelectorAll(".choose-avatar").forEach(i => {
        i.classList.remove("active");
    });

    this.classList.add("active");

    preview.src = this.src;
    document.getElementById("selectedAvatar").value = this.dataset.avatar;

    photo.value = "";

    bootstrap.Modal.getOrCreateInstance(modalEl).hide();

    });

    });

   const chooseFileBtn = document.getElementById("chooseFileBtn");

    if (chooseFileBtn) {

        chooseFileBtn.onclick = function () {

            document.getElementById("photo").click();

        };

    }

    document.getElementById("photo").onchange = function () {

        if (this.files.length) {

            preview.src = URL.createObjectURL(this.files[0]);

            document.getElementById("selectedAvatar").value = "";

            bootstrap.Modal.getOrCreateInstance(modalEl).hide();

        }

    };

        }

        });

        //   zhila promotiion 
    

        // ==========================
        // GROUP SYSTEM
        // ==========================
    
    document.addEventListener("DOMContentLoaded", function () {

        const selectAll = document.getElementById("ZAedAge-selectAll");

        const groups = document.querySelectorAll(".ZAedAge-group");

        // ======================
        // SELECT ALL
        // ======================
        selectAll.addEventListener("change", function () {

            const checked = this.checked;

            groups.forEach(group => {

                group.querySelector(".ZAedAge-groupCheck").checked = checked;

                group.querySelectorAll(".ZAedAge-itemCheck").forEach(item => {
                    item.checked = checked;
                });

            });

        });

        // ======================
        // EACH GROUP
        // ======================
        groups.forEach(group => {

            const groupCheck = group.querySelector(".ZAedAge-groupCheck");
            const items = group.querySelectorAll(".ZAedAge-itemCheck");

            // Group checkbox
            groupCheck.addEventListener("change", function () {

                items.forEach(item => {
                    item.checked = this.checked;
                });

                updateSelectAll();

            });

            // Items inside group
            items.forEach(item => {

                item.addEventListener("change", function () {

                    let allChecked = true;

                    items.forEach(i => {
                        if (!i.checked) allChecked = false;
                    });

                    groupCheck.checked = allChecked;

                    updateSelectAll();

                });

            });

        });

        // ======================
        // UPDATE MAIN SELECT ALL
        // ======================
        function updateSelectAll() {

            const allGroups = document.querySelectorAll(".ZAedAge-groupCheck");
            const allItems = document.querySelectorAll(".ZAedAge-itemCheck");

            let allChecked = true;

            allItems.forEach(i => {
                if (!i.checked) allChecked = false;
            });

            selectAll.checked = allChecked;
        }

    });


  
   


</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>