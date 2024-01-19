    <!--begin::Post-->
    <div class="content flex-row-fluid" id="kt_content">
        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Content-->
            <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-12">
                        <!--begin::Form-->
                        <form action="" id="kt_invoice_form">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column align-items-start flex-xxl-row">
                                <!--begin::Input group-->
                                <div class="d-flex align-items-center flex-equal fw-row me-4 order-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Specify invoice date">
                                    <!--begin::Date-->
                                    <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Date:</div>
                                    <!--end::Date-->
                                    <!--begin::Input-->
                                    <div class="position-relative d-flex align-items-center w-150px">
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-white fw-bolder pe-5 flatpickr-input" placeholder="Select date" name="invoice_date" type="text" readonly="readonly">
                                        <!--end::Datepicker-->
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Enter invoice number">
                                    <span class="fs-2x fw-bolder text-gray-800">Invoice #</span>
                                    <input type="text" class="form-control form-control-flush fw-bolder text-muted fs-3 w-125px" value="2021001" placehoder="...">
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Specify invoice due date">
                                    <!--begin::Date-->
                                    <div class="fs-6 fw-bolder text-gray-700 text-nowrap">Due Date:</div>
                                    <!--end::Date-->
                                    <!--begin::Input-->
                                    <div class="position-relative d-flex align-items-center w-150px">
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-white fw-bolder pe-5 flatpickr-input" placeholder="Select date" name="invoice_due_date" type="text" readonly="readonly">
                                        <!--end::Datepicker-->
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute end-0 ms-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                    </div>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Top-->
                            <!--begin::Separator-->
                            <div class="separator separator-dashed my-10"></div>
                            <!--end::Separator-->
                            <!--begin::Wrapper-->
                            <div class="mb-0">
                                <!--begin::Row-->
                                <div class="row gx-10 mb-5">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bill From</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-solid" placeholder="Name">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-solid" placeholder="Email">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Who is this invoice from?"></textarea>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <label class="form-label fs-6 fw-bolder text-gray-700 mb-3">Bill To</label>
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-solid" placeholder="Name">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <input type="text" class="form-control form-control-solid" placeholder="Email">
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-5">
                                            <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="What is this invoice for?"></textarea>
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Table wrapper-->
                                <div class="table-responsive mb-10">
                                    <!--begin::Table-->
                                    <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                                <th class="min-w-300px w-475px">Item</th>
                                                <th class="min-w-100px w-100px">QTY</th>
                                                <th class="min-w-150px w-150px">Price</th>
                                                <th class="min-w-100px w-150px text-end">Total</th>
                                                <th class="min-w-75px w-75px text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                <td class="pe-7">
                                                    <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name">
                                                    <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description">
                                                </td>
                                                <td class="ps-0">
                                                    <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" value="1" data-kt-element="quantity">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" value="0.00" data-kt-element="price">
                                                </td>
                                                <td class="pt-8 text-end text-nowrap">$
                                                <span data-kt-element="total">0.00</span></td>
                                                <td class="pt-5 text-end">
                                                    <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                                <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                                <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                        <!--begin::Table foot-->
                                        <tfoot>
                                            <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                                <th class="text-primary">
                                                    <button class="btn btn-link py-1" data-kt-element="add-item">Add item</button>
                                                </th>
                                                <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                                    <div class="d-flex flex-column align-items-start">
                                                        <div class="fs-5">Subtotal</div>
                                                        <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Coming soon">Add tax</button>
                                                        <button class="btn btn-link py-1" data-bs-toggle="tooltip" data-bs-trigger="hover" title="" data-bs-original-title="Coming soon">Add discount</button>
                                                    </div>
                                                </th>
                                                <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                                                <span data-kt-element="sub-total">0.00</span></th>
                                            </tr>
                                            <tr class="align-top fw-bolder text-gray-700">
                                                <th></th>
                                                <th colspan="2" class="fs-4 ps-0">Total</th>
                                                <th colspan="2" class="text-end fs-4 text-nowrap">$
                                                <span data-kt-element="grand-total">0.00</span></th>
                                            </tr>
                                        </tfoot>
                                        <!--end::Table foot-->
                                    </table>
                                </div>
                                <!--end::Table-->
                                <!--begin::Item template-->
                                <table class="table d-none" data-kt-element="item-template">
                                    <tbody><tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                        <td class="pe-7">
                                            <input type="text" class="form-control form-control-solid mb-2" name="name[]" placeholder="Item name">
                                            <input type="text" class="form-control form-control-solid" name="description[]" placeholder="Description">
                                        </td>
                                        <td class="ps-0">
                                            <input class="form-control form-control-solid" type="number" min="1" name="quantity[]" placeholder="1" data-kt-element="quantity">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-solid text-end" name="price[]" placeholder="0.00" data-kt-element="price">
                                        </td>
                                        <td class="pt-8 text-end">$
                                        <span data-kt-element="total">0.00</span></td>
                                        <td class="pt-5 text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-active-color-primary" data-kt-element="remove-item">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </td>
                                    </tr>
                                </tbody></table>
                                <table class="table d-none" data-kt-element="empty-template">
                                    <tbody><tr data-kt-element="empty">
                                        <th colspan="5" class="text-muted text-center py-10">No items</th>
                                    </tr>
                                </tbody></table>
                                <!--end::Item template-->
                                <!--begin::Notes-->
                                <div class="mb-0">
                                    <label class="form-label fs-6 fw-bolder text-gray-700">Notes</label>
                                    <textarea name="notes" class="form-control form-control-solid" rows="3" placeholder="Thanks for your business"></textarea>
                                </div>
                                <!--end::Notes-->
                            </div>
                            <!--end::Wrapper-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
            <!--begin::Sidebar-->
            <div class="flex-lg-auto min-w-lg-300px">
                <!--begin::Card-->
                <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                    <!--begin::Card body-->
                    <div class="card-body p-10">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Currency</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="currnecy" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid select2-hidden-accessible" data-select2-id="select2-data-10-jvdg" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="select2-data-12-ajuk"></option>
                                <option data-kt-flag="flags/united-states.svg" value="USD">
                                USD&nbsp;-&nbsp;USA dollar</option>
                                <option data-kt-flag="flags/united-kingdom.svg" value="GBP">
                                GBP&nbsp;-&nbsp;British pound</option>
                                <option data-kt-flag="flags/australia.svg" value="AUD">
                                AUD&nbsp;-&nbsp;Australian dollar</option>
                                <option data-kt-flag="flags/japan.svg" value="JPY">
                                JPY&nbsp;-&nbsp;Japanese yen</option>
                                <option data-kt-flag="flags/sweden.svg" value="SEK">
                                SEK&nbsp;-&nbsp;Swedish krona</option>
                                <option data-kt-flag="flags/canada.svg" value="CAD">
                                CAD&nbsp;-&nbsp;Canadian dollar</option>
                                <option data-kt-flag="flags/switzerland.svg" value="CHF">
                                CHF&nbsp;-&nbsp;Swiss franc</option>
                            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-11-gede" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-currnecy-co-container" aria-controls="select2-currnecy-co-container"><span class="select2-selection__rendered" id="select2-currnecy-co-container" role="textbox" aria-readonly="true" title="Select currency"><span class="select2-selection__placeholder">Select currency</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            <!--end::Select-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        <div class="mb-8">
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Payment method</span>
                                <input class="form-check-input" type="checkbox" checked="checked" value="">
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Late fees</span>
                                <input class="form-check-input" type="checkbox" value="">
                            </label>
                            <!--end::Option-->
                            <!--begin::Option-->
                            <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack">
                                <span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Notes</span>
                                <input class="form-check-input" type="checkbox" value="">
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Actions-->
                        <div class="mb-0">
                            <!--begin::Row-->
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col">
                                    <a href="#" class="btn btn-light btn-active-light-primary w-100">Preview</a>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col">
                                    <a href="#" class="btn btn-light btn-active-light-primary w-100">Download</a>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                            <button type="submit" href="#" class="btn btn-primary w-100" id="kt_invoice_submit_button">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="black"></path>
                                    <path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Send Invoice</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Post-->

<div class="formProduk" style="display: none;">
    @include('toko.keranjang.form')
</div>
