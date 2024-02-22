    <div class="contain detail-toko" style="display: none;">
        <!--begin::Navbar-->
        <div class="card mb-5 mb-xl-10 ">
            <div class="card-body pt-9 pb-0">
                <!--begin::Details-->
                <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                    <!--begin: Pic-->
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative img-placement">
                        </div>
                    </div>
                    <!--end::Pic-->
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <!--begin::User-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <div class="d-flex align-items-center">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1 val_head_name">Rafif</a>


                                </div>
                                <!--end::Name-->
                                <!--begin::Info-->
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">


                                    <a href="#"
                                        class="d-flex align-items-center text-gray-400 text-hover-primary mb-2 email-header">kingrnr@gmail.com</a>
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                            <!--begin::Actions-->
                            <div class="d-flex my-4">


                                <!--begin::Menu-->

                                <!--end::Menu-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap flex-stack">
                            <!--begin::Wrapper-->

                            <!--end::Wrapper-->
                            <!--begin::Progress-->

                            <!--end::Progress-->
                        </div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <!--begin::Navs-->
                <div class="d-flex overflow-auto h-55px">
                    <ul
                        class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                        <!--begin::Nav item-->
                        {{-- <li class="nav-item">
                            <a class="nav-link text-active-primary me-6 active link-tab" href="#">Profil</a>
                        </li> --}}
                        
                    </ul>
                </div>
                <!--begin::Navs-->
            </div>
        </div>
        <!--end::Navbar-->
        <!--begin::details View-->

        <div class="card mb-5 mb-xl-10 detail-all detail-profile" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Detail Toko
                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Detail Toko"
                            data-bs-original-title="Detail Toko">
                            <i class="bi bi-question-circle"></i>
                        </a>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="#" onclick="switchShowToko(this)" class="btn btn-secondary align-self-center kembali" style="">Kembali</a>
                </div>
                <!--end::Card title-->
                <!--begin::Action-->
                <!--end::Action-->
            </div>
            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Row-->
                <div class="container-show">

                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-3 fw-bold text-muted">Nama Pemilik</label>
                        <div class="col-lg-5">
                            <span class="fw-bolder fs-6 text-gray-800 val_nama">-</span>
                        </div>
                    </div>
                    <!--end::Row-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-3 fw-bold text-muted">Nama Toko</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-5 fv-row">
                            <span class="fw-bold text-gray-800 fs-6 val_nama_toko">-</span>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->

                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row mb-7">
                        <!--begin::Label-->
                        <label class="col-lg-3 fw-bold text-muted">Email</label>
                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-5">
                            <a href="#"
                                class="fw-bold fs-6 text-gray-800 text-hover-primary val_email">example@gmail.com</a>
                        </div>
                        <!--end::Col-->
                    </div>
                </div>
                <div class="container-form" style="display: none">
                    <form action="javascript:saveProfileToko()" method="post" id="formProfileToko"
                        name="formProfileToko" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="FWdYZ0M1q2zch92C7O1IdPsv6NnOBUql2jgIWPx7"
                            autocomplete="off">
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <input type="hidden" name="id" id="id"
                                class="form-control form-control-sm form-control-solid input-required" placeholder=""
                                required="" value="2">
                            <label class="col-lg-3 fw-bold text-muted required">Nama Pemilik</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama_pemilik" id="nama_pemilik"
                                    class="form-control form-control-sm form-control-solid input-required"
                                    placeholder="Masukkan Nama Pemilik Baru" required="">
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-3 fw-bold text-muted required">Nama Toko</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-5 fv-row">
                                <input type="text" name="nama_toko" id="nama_toko"
                                    class="form-control form-control-sm form-control-solid input-required"
                                    placeholder="Masukkan Nama Toko Baru" required="">
                            </div>
                            <!--end::Col-->
                        </div>

                        <!--end::Input group-->
                        <!--begin::Input group-->

                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7 d-none">
                            <!--begin::Label-->
                            <label class="col-lg-3 fw-bold text-muted required">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-5">
                                <input type="text" name="email" id="email"
                                    class="form-control form-control-sm form-control-solid input-required"
                                    disabled="" placeholder="Masukkan Email Baru" required="">
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-7">
                            <label for="" class="col-lg-3 required text-muted form-label">Foto Produk <i>max
                                    2mb</i></label>
                            <div class="col-lg-5">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url(../file/blank.webp)">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url(&quot;http://127.0.0.1:8000/file/blank.webp&quot;);">
                                    </div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        aria-label="Change avatar" data-bs-original-title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="foto_profile" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        aria-label="Cancel Photo" data-bs-original-title="Cancel Photo">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->

                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Tipe File: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                        </div>
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-3 fw-bold text-muted"></label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-5 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                            <!--end::Col-->
                        </div>
                    </form>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
                <!--begin::Input group-->

                <!--end::Input group-->
                <!--begin::Notice-->

                <!--end::Notice-->
            </div>
            <!--end::Card body-->
        </div>
    </div>
    <!--end::details View-->
    <!--begin::Row-->

    <!--end::Row-->
