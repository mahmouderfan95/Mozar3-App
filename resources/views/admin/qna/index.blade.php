@extends('admin.layouts.master')
@section('title')
    @lang('qnas.admin.manage_qnas')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    @include('sweetalert::alert')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="productClasses">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">@lang('qnas.admin.manage_qnas')</h5>
                        <div class="flex-shrink-0">
                            <div class="d-flex gap-1 flex-wrap">
                                <a href="{{ route("admin.qna.create") }}" class="btn btn-primary add-btn" id="create-btn">
                                    <i class="ri-add-line align-bottom me-1"></i>  @lang("qnas.admin.create")
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form action="{{ route("admin.qna.index") }}">
                        <div class="row g-3">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="search-box">
                                    <input name="search" type="text" class="form-control search"
                                           placeholder="@lang("admin.productClasses.search")">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-sm-6">
                                <div>
                                    <select name="trans" class="form-control" data-choices data-choices-search-false  id="idStatus">
                                        <option value="all" selected>@lang("admin.customer_finances.wallets.all")</option>
                                        <option value="ar">@lang("qnas.admin.question_ar")</option>
                                        <option value="en">@lang("qnas.admin.question_en")</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-1 col-sm-4">
                                <div>
                                    <button type="submit" class="btn btn-secondary w-100" onclick="SearchData();">
                                        <i class="ri-search-line search-icon"></i>
                                            @lang("admin.productClasses.search")
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-body pt-0">
                    <div>
                        <div class="table-responsive table-card mb-1">
                            <table class="table table-nowrap align-middle" id="qnasTable">
                                <thead class="text-muted table-light">
                                <tr class="text-uppercase">
                                    <th>@lang('qnas.admin.id')</th>
                                    <th>@lang('qnas.admin.question_ar')</th>
                                    <th>@lang('qnas.admin.question_en')</th>
                                    <th>@lang('qnas.admin.faq_category')</th>
                                    <th>@lang('translation.actions')</th>
                                </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                    @if ($qnas->count() > 0)
                                        @foreach($qnas as $qna)
                                            <tr>
                                                <td class="id">
                                                    <a href="{{ route("admin.productClasses.show", $qna->id) }}"class="fw-medium link-primary">
                                                        #{{$qna->id}}
                                                    </a>
                                                </td>
                                                <td class="name_ar">{{ $qna->getTranslation('question', 'ar') }}</td>
                                                <td class="name_en">{{ $qna->getTranslation('question', 'en') }}</td>
                                                <td>{{ $qna->category?->name }}</td>
                                                <td>
                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top" title="@lang('admin.productClasses.edit')">
                                                            <a href="{{ route("admin.qna.edit", $qna->id) }}"
                                                            class="text-primary d-inline-block">
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                                            data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                            <a class="text-danger d-inline-block remove-item-btn"
                                                            data-bs-toggle="modal" href="#deleteproductClass-{{$qna->id}}">
                                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                    <!-- Start Delete Modal -->
                    <div class="modal fade flip" id="deleteproductClass-{{$qna->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body p-5 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                               colors="primary:#25a0e2,secondary:#00bd9d"
                                               style="width:90px;height:90px">
                                    </lord-icon>
                                    <div class="mt-4 text-center">
                                        <h4>@lang('admin.qnas.delete_modal.title')</h4>
                                        <p class="text-muted fs-15 mb-4">@lang('admin.qnas.delete_modal.description')</p>
                                        <div class="hstack gap-2 justify-content-center remove">
                                            <button class="btn btn-link link-primary fw-medium text-decoration-none"
                                                    data-bs-dismiss="modal" id="deleteRecord-close">
                                                <i class="ri-close-line me-1 align-middle"></i>
                                                @lang('admin.close')
                                            </button>
                                            <form action="{{ route("admin.qna.destroy", $qna->id) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-primary" id="delete-record">
                                                    @lang('admin.categories.delete')
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete Modal -->
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan = "4">
                                                <center>
                                                    @lang('admin.productClasses.not_found')
                                                </center>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div>
                    <!-- End Delete Modal -->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                               colors="primary:#25a0e2,secondary:#0ab39c"
                                               style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">@lang('admin.productClasses.no_result_found')</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                {{ $qnas->appends(request()->query())->links("pagination::bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!--ecommerce-customer init js -->
    <script src="{{ URL::asset('assets/js/pages/ecommerce-order.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
