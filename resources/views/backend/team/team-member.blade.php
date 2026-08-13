@extends('backend.admin-master')
@section('site-title')
    {{__('Team Member Item')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0 !important;
        }
        div.dataTables_wrapper div.dataTables_length select {
            width: 60px;
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <!-- basic form start -->
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-flash-msg/>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('Team Member Items')}}</h4>
                        <div class="bulk-delete-wrapper">
                            <div class="select-box-wrap">
                                <select name="bulk_option" id="bulk_option">
                                    <option value="">{{{__('Bulk Action')}}}</option>
                                    <option value="delete">{{{__('Delete')}}}</option>
                                </select>
                                <button class="btn btn-primary btn-sm" id="bulk_delete_btn">{{__('Apply')}}</button>
                            </div>
                            <div class="select-box-wrap">
                                <select name="category_filter" id="category_filter">
                                    <option value="">{{__('All Categories')}}</option>
                                    @foreach ($all_category as $category)
                                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="tab-content margin-top-40" id="myTabContent">
                            <div class="table-wrap table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Role')}}</th>
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($all_team_member as $data)
                                        @php $img_url =''; @endphp
                                        <tr>
                                            <td>
                                                <div class="bulk-checkbox-wrapper">
                                                    <input type="checkbox" class="bulk-checkbox" name="bulk_delete[]" value="{{$data->id}}">
                                                </div>
                                            </td>
                                            <td>{{$data->id}}</td>
                                            <td>
                                                @php
                                                    $brand_img = get_attachment_image_by_id($data->image,null,true);
                                                @endphp
                                                @if (!empty($brand_img))
                                                    <div class="attachment-preview">
                                                        <div class="thumbnail">
                                                            <div class="centered">
                                                                <img class="avatar user-thumb" src="{{$brand_img['img_url']}}" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @php  $img_url = $brand_img['img_url']; @endphp
                                                @endif
                                            </td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->role}}</td>
                                            <td>{{ $data->category->name ?? '' }}</td>
                                              <td>
                                                @if($data->is_active)
                                                    <span class="alert alert-success">{{__('Active')}}</span>
                                                @else
                                                    <span class="alert alert-warning">{{__('In Active')}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <x-delete-popover :url="route('admin.team.member.delete',$data->id)"/>
                                                <a href="#"
                                                   data-toggle="modal"
                                                   data-target="#team_member_item_edit_modal"
                                                   class="btn btn-primary btn-xs mb-3 mr-1 team_member_edit_btn"
                                                   data-id="{{$data->id}}"
                                                   data-action="{{route('admin.team.member.update')}}"
                                                   data-name="{{$data->name}}"
                                                   data-imageid="{{$data->image}}"
                                                   data-image="{{$img_url}}"
                                                   data-designation="{{$data->role}}"
                                                   data-category="{{$data->team_category_id}}"
                                                   data-linkedin="{{$data->linkedin_url}}"
                                                   data-email="{{$data->email}}"
                                                   data-status="{{$data->is_active ? 'publish' : 'draft'}}"
                                                >
                                                    <i class="ti-pencil"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('New Team Member')}}</h4>
                        <form action="{{route('admin.team.member')}}" method="post" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control"  id="name"  name="name" placeholder="{{__('Name')}}">
                            </div>
                            <div class="form-group">
                                <label for="designation">{{__('Role / Designation')}}</label>
                                <input type="text" class="form-control"  id="designation"  name="designation" placeholder="{{__('Role')}}">
                            </div>
                            <div class="form-group">
                                <label for="category">{{ __('Category') }}</label>
                                <select name="category" class="form-control" id="category">
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach ($all_category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="linkedin_url">{{__('LinkedIn URL')}}</label>
                                <input type="text" class="form-control"  id="linkedin_url"  name="linkedin_url" placeholder="{{__('LinkedIn URL')}}">
                            </div>

                            <div class="form-group">
                                <label for="email">{{__('Email')}}</label>
                                <input type="email" class="form-control"  id="email"  name="email" placeholder="{{__('Email')}}">
                            </div>

                             <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="publish">{{__("Publish")}}</option>
                                    <option value="draft">{{__("Draft")}}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">{{__('Image')}}</label>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap"></div>
                                    <input type="hidden" name="image">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Team Image')}}" data-modaltitle="{{__('Upload Team Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                        {{__('Upload Image')}}
                                    </button>
                                </div>
                                <small>{{__('Recommended image size 270x280')}}</small>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Team Member')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="team_member_item_edit_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Edit Team Member Item')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="#" id="team_member_edit_modal_form"  method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="team_member_id" value="">
                        <div class="form-group">
                            <label for="edit_name">{{__('Name')}}</label>
                            <input type="text" class="form-control"  id="edit_name"  name="name" placeholder="{{__('Name')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_designation">{{__('Role / Designation')}}</label>
                            <input type="text" class="form-control"  id="edit_designation"  name="designation" placeholder="{{__('Role')}}">
                        </div>
                        <div class="form-group">
                            <label for="edit_category">{{__('Category')}}</label>
                            <select name="category" class="form-control" id="edit_category"> // Fixed ID
                                <option value="">{{__("Select Category")}}</option>
                                @foreach($all_category as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                         <div class="form-group">
                            <label for="edit_linkedin_url">{{__('LinkedIn URL')}}</label>
                            <input type="text" class="form-control"  id="edit_linkedin_url"  name="linkedin_url" placeholder="{{__('LinkedIn URL')}}">
                        </div>

                        <div class="form-group">
                            <label for="edit_email">{{__('Email')}}</label>
                            <input type="email" class="form-control"  id="edit_email"  name="email" placeholder="{{__('Email')}}">
                        </div>

                         <div class="form-group">
                            <label for="edit_status">{{__('Status')}}</label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="publish">{{__("Publish")}}</option>
                                <option value="draft">{{__("Draft")}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">{{__('Image')}}</label>
                            <div class="media-upload-btn-wrapper">
                                <div class="img-wrap"></div>
                                <input type="hidden" id="edit_image" name="image" value="">
                                <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Team Image')}}" data-modaltitle="{{__('Upload Team Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                    {{__('Upload Image')}}
                                </button>
                            </div>
                            <small>{{__('Recommended image size 270x280')}}</small>
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
    <script>
        $(document).ready(function () {

            $(document).on('click','#bulk_delete_btn',function (e) {
                e.preventDefault();

                var bulkOption = $('#bulk_option').val();
                var allCheckbox =  $('.bulk-checkbox:checked');
                var allIds = [];
                allCheckbox.each(function(index,value){
                    allIds.push($(this).val());
                });
                if(allIds != '' && bulkOption == 'delete'){
                    $(this).text('{{__('Deleting...')}}');
                    $.ajax({
                        'type' : "POST",
                        'url' : "{{route('admin.team.member.bulk.action')}}",
                        'data' : {
                            _token: "{{csrf_token()}}",
                            ids: allIds
                        },
                        success:function (data) {
                            location.reload();
                        }
                    });
                }
            });

            $('.all-checkbox').on('change',function (e) {
                e.preventDefault();
                var value = $('.all-checkbox').is(':checked');
                var allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
                if( value == true){
                    allChek.prop('checked',true);
                }else{
                    allChek.prop('checked',false);
                }
            });

            $(document).on('click','.team_member_edit_btn',function(){
                var el = $(this);
                var id = el.data('id');
                var name = el.data('name');
                var designation = el.data('designation');
                var action = el.data('action');
                var image = el.data('image');
                var imageid = el.data('imageid');
                var category = el.data('category'); // Get category
                var linkedin = el.data('linkedin');
                var email = el.data('email');
                var status = el.data('status');

                var form = $('#team_member_edit_modal_form');

                form.attr('action',action);
                form.find('#team_member_id').val(id);
                form.find('#edit_name').val(name);
                form.find('#edit_designation').val(designation);
                form.find('#edit_category').val(category); // Set category
                form.find('#edit_linkedin_url').val(linkedin);
                form.find('#edit_email').val(email);
                form.find('#edit_status').val(status);

                form.find('#preview_image').attr('src',image);

                if(imageid != ''){
                    form.find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="'+image+'" > </div></div></div>');
                    form.find('.media-upload-btn-wrapper input').val(imageid);
                    form.find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });
        });
    </script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var teamMemberTable = $('.table-wrap > table').DataTable( {
                "order": [[ 1, "desc" ]],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    'orderable' : false
                }]
            } );

            $(document).on('change', '#category_filter', function () {
                var value = this.value;
                var searchTerm = value ? '^' + $.fn.dataTable.util.escapeRegex(value) + '$' : '';
                teamMemberTable.column(5).search(searchTerm, true, false).draw();
            });
        } );
    </script>
    <script src="{{asset('assets/backend/js/dropzone.js')}}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
