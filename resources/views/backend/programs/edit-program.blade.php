@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Programs Post')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
               <x-flash-msg/>
                <x-error-msg/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Edit Program')}} &mdash; {{$program->name}}</h4>
                            <a href="{{route('admin.programs.all')}}" class="btn btn-primary">{{__('All Programs')}}</a>
                        </div>

                        <ul class="nav nav-tabs mt-3" id="program_edit_tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab">{{__('Details')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="fellows-tab" data-toggle="tab" href="#fellows" role="tab">{{__('Fellows')}} <span class="badge badge-secondary">{{$fellows->count()}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="partners-tab" data-toggle="tab" href="#partners" role="tab">{{__('Partners')}} <span class="badge badge-secondary">{{$attachedPartners->count()}}</span></a>
                            </li>
                        </ul>

                        <div class="tab-content pt-4" id="program_edit_tabs_content">

                            {{-- ================= DETAILS TAB ================= --}}
                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                <form action="{{route('admin.programs.update')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="program_id" value="{{$program->id}}">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="title">{{__('Name')}}</label>
                                                <input type="text" class="form-control"  id="name" name="name" value="{{$program->name}}" placeholder="{{__('Name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="slug">{{__('Slug')}}</label>
                                                <input type="text" class="form-control"  id="slug" name="slug" value="{{$program->slug}}" placeholder="{{__('slug')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="application_link">{{__('Application Link')}}</label>
                                                <input type="text" class="form-control"  id="application_link" name="application_link" value="{{$program->application_link}}" placeholder="{{__('Application Link')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="application_start_date">{{__('Application Start Date')}}</label>
                                                <input type="date" class="form-control"  id="application_start_date" name="application_start_date" value="{{$program->application_start_date ? $program->application_start_date->format('Y-m-d') : ''}}" placeholder="{{__('Application Start Date')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="application_end_date">{{__('Application End Date')}}</label>
                                                <input type="date" class="form-control"  id="application_end_date" name="application_end_date" value="{{$program->application_end_date ? $program->application_end_date->format('Y-m-d') : ''}}" placeholder="{{__('Application End Date')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="status">{{__('Status')}}</label>
                                                <select name="status" id="status"  class="form-control">
                                                    <option @if($program->is_active) selected @endif value="publish">{{__('Publish')}}</option>
                                                    <option @if(!$program->is_active) selected @endif value="draft">{{__('Draft')}}</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Program')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            {{-- ================= FELLOWS TAB ================= --}}
                            <div class="tab-pane fade" id="fellows" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h5 class="header-title">{{__('Program Fellows')}}</h5>
                                        <div class="table-wrap table-responsive">
                                            <table class="table table-default">
                                                <thead>
                                                <th>{{__('Image')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Role')}}</th>
                                                <th>{{__('Status')}}</th>
                                                <th>{{__('Action')}}</th>
                                                </thead>
                                                <tbody>
                                                @forelse($fellows as $fellow)
                                                    @php
                                                        $fellow_img = get_attachment_image_by_id($fellow->image, null, true);
                                                        $fellow_img_url = !empty($fellow_img) ? $fellow_img['img_url'] : '';
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            @if(!empty($fellow_img_url))
                                                                <div class="attachment-preview">
                                                                    <div class="thumbnail">
                                                                        <div class="centered">
                                                                            <img class="avatar user-thumb" src="{{$fellow_img_url}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>{{$fellow->name}}</td>
                                                        <td>{{$fellow->role}}</td>
                                                        <td>
                                                            @if($fellow->is_active)
                                                                <span class="alert alert-success">{{__('Active')}}</span>
                                                            @else
                                                                <span class="alert alert-warning">{{__('Inactive')}}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <x-delete-popover :url="route('admin.programs.fellows.delete',$fellow->id)"/>
                                                            <a href="#"
                                                               data-toggle="modal"
                                                               data-target="#fellow_edit_modal"
                                                               class="btn btn-xs btn-primary btn-sm mb-3 mr-1 fellow_edit_btn"
                                                               data-id="{{$fellow->id}}"
                                                               data-name="{{$fellow->name}}"
                                                               data-role="{{$fellow->role}}"
                                                               data-quote="{{$fellow->quote}}"
                                                               data-imageid="{{$fellow->image}}"
                                                               data-image="{{$fellow_img_url}}"
                                                               data-status="{{$fellow->is_active ? 'active' : 'inactive'}}"
                                                            >
                                                                <i class="ti-pencil"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">{{__('No fellows added yet.')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <h5 class="header-title">{{__('Add Fellow')}}</h5>
                                        <form action="{{route('admin.programs.fellows.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="program_id" value="{{$program->id}}">
                                            <div class="form-group">
                                                <label for="fellow_name">{{__('Name')}}</label>
                                                <input type="text" class="form-control" id="fellow_name" name="name" placeholder="{{__('Fellow Name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fellow_role">{{__('Role / School')}}</label>
                                                <input type="text" class="form-control" id="fellow_role" name="role" placeholder="{{__('e.g. Wa Senior High School')}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fellow_quote">{{__('Quote')}}</label>
                                                <textarea class="form-control" id="fellow_quote" name="quote" rows="3" placeholder="{{__('A short quote from the fellow')}}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">{{__('Status')}}</label>
                                                <select name="status" class="form-control">
                                                    <option value="active">{{__('Active')}}</option>
                                                    <option value="inactive">{{__('Inactive')}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">{{__('Image')}}</label>
                                                <div class="media-upload-btn-wrapper">
                                                    <div class="img-wrap"></div>
                                                    <input type="hidden" name="image">
                                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Fellow Image" data-modaltitle="Upload Fellow Image" data-toggle="modal" data-target="#media_upload_modal">
                                                        {{__('Upload Image')}}
                                                    </button>
                                                </div>
                                                <small>{{__('Recommended image size 800x1000')}}</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-2 pr-4 pl-4">{{__('Add Fellow')}}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- ================= PARTNERS TAB ================= --}}
                            <div class="tab-pane fade" id="partners" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <h5 class="header-title">{{__('Attached Partners')}}</h5>
                                        <div class="table-wrap table-responsive">
                                            <table class="table table-default">
                                                <thead>
                                                <th>{{__('Logo')}}</th>
                                                <th>{{__('Name')}}</th>
                                                <th>{{__('Role Label')}}</th>
                                                <th>{{__('Order')}}</th>
                                                <th>{{__('Action')}}</th>
                                                </thead>
                                                <tbody>
                                                @forelse($attachedPartners as $partner)
                                                    @php
                                                        $partner_img = get_attachment_image_by_id($partner->logo, null, true);
                                                        $partner_img_url = !empty($partner_img) ? $partner_img['img_url'] : '';
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            @if(!empty($partner_img_url))
                                                                <div class="attachment-preview">
                                                                    <div class="thumbnail">
                                                                        <div class="centered">
                                                                            <img class="avatar user-thumb" src="{{$partner_img_url}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>{{$partner->name}}</td>
                                                        <td>{{$partner->pivot->role_label}}</td>
                                                        <td>{{$partner->pivot->order}}</td>
                                                        <td>
                                                            <x-delete-popover :url="route('admin.programs.partners.detach',$partner->pivot->id)"/>
                                                            <a href="#"
                                                               data-toggle="modal"
                                                               data-target="#partner_link_edit_modal"
                                                               class="btn btn-xs btn-primary btn-sm mb-3 mr-1 partner_link_edit_btn"
                                                               data-id="{{$partner->pivot->id}}"
                                                               data-role_label="{{$partner->pivot->role_label}}"
                                                               data-description="{{$partner->pivot->description}}"
                                                               data-order="{{$partner->pivot->order}}"
                                                            >
                                                                <i class="ti-pencil"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">{{__('No partners attached yet.')}}</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <h5 class="header-title">{{__('Attach Partner')}}</h5>
                                        @if($availablePartners->isEmpty())
                                            <p>{{__('No partners exist yet.')}} <a href="{{route('admin.partners')}}">{{__('Create one first')}}</a>.</p>
                                        @else
                                            <form action="{{route('admin.programs.partners.attach')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="program_id" value="{{$program->id}}">
                                                <div class="form-group">
                                                    <label for="partner_id">{{__('Partner')}}</label>
                                                    <select name="partner_id" id="partner_id" class="form-control">
                                                        @foreach($availablePartners as $p)
                                                            <option value="{{$p->id}}">{{$p->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="role_label">{{__('Role Label')}}</label>
                                                    <input type="text" class="form-control" id="role_label" name="role_label" placeholder="{{__('e.g. Principal Funder, Co-Funder, Community Partner')}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">{{__('Description')}}</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="{{__('Program-specific description of this partner')}}"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="order">{{__('Order')}}</label>
                                                    <input type="number" class="form-control" id="order" name="order" value="0">
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-2 pr-4 pl-4">{{__('Attach Partner')}}</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Fellow edit modal --}}
    <div class="modal fade" id="fellow_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Fellow')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('admin.programs.fellows.update')}}" id="fellow_edit_modal_form" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="fellow_edit_id">
                        <div class="form-group">
                            <label for="fellow_edit_name">{{__('Name')}}</label>
                            <input type="text" class="form-control" id="fellow_edit_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="fellow_edit_role">{{__('Role / School')}}</label>
                            <input type="text" class="form-control" id="fellow_edit_role" name="role">
                        </div>
                        <div class="form-group">
                            <label for="fellow_edit_quote">{{__('Quote')}}</label>
                            <textarea class="form-control" id="fellow_edit_quote" name="quote" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fellow_edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control" id="fellow_edit_status">
                                <option value="active">{{__('Active')}}</option>
                                <option value="inactive">{{__('Inactive')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fellow_edit_image">{{__('Image')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" id="fellow_edit_image" name="image" value="">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="Select Fellow Image" data-modaltitle="Upload Fellow Image" data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Image')}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Partner link edit modal --}}
    <div class="modal fade" id="partner_link_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Partner Link')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form action="{{route('admin.programs.partners.update')}}" id="partner_link_edit_modal_form" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="partner_link_edit_id">
                        <div class="form-group">
                            <label for="partner_link_edit_role_label">{{__('Role Label')}}</label>
                            <input type="text" class="form-control" id="partner_link_edit_role_label" name="role_label">
                        </div>
                        <div class="form-group">
                            <label for="partner_link_edit_description">{{__('Description')}}</label>
                            <textarea class="form-control" id="partner_link_edit_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="partner_link_edit_order">{{__('Order')}}</label>
                            <input type="number" class="form-control" id="partner_link_edit_order" name="order">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('Save Changes')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('backend.partials.media-upload.media-upload-markup')
@endsection
@section('script')
    <x-backend.auto-slug-js :url="route('admin.programs.slug.check')" :type="'update'"/>
    <script>
        $(document).ready(function () {
            $(document).on('click', '.fellow_edit_btn', function () {
                var el = $(this);
                var form = $('#fellow_edit_modal_form');
                var image = el.data('image');
                var imageid = el.data('imageid');

                form.find('#fellow_edit_id').val(el.data('id'));
                form.find('#fellow_edit_name').val(el.data('name'));
                form.find('#fellow_edit_role').val(el.data('role'));
                form.find('#fellow_edit_quote').val(el.data('quote'));
                form.find('#fellow_edit_status').val(el.data('status'));

                form.find('.media-upload-btn-wrapper .img-wrap').html('');
                form.find('.media-upload-btn-wrapper input[name="image"]').val('');
                form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('{{__("Upload Image")}}');

                if (imageid) {
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '"></div></div></div>');
                    form.find('.media-upload-btn-wrapper input[name="image"]').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('{{__("Change Image")}}');
                }
            });

            $(document).on('click', '.partner_link_edit_btn', function () {
                var el = $(this);
                var form = $('#partner_link_edit_modal_form');
                form.find('#partner_link_edit_id').val(el.data('id'));
                form.find('#partner_link_edit_role_label').val(el.data('role_label'));
                form.find('#partner_link_edit_description').val(el.data('description'));
                form.find('#partner_link_edit_order').val(el.data('order'));
            });
        });
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
