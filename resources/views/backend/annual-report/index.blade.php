@extends('backend.admin-master')
@section('site-title')
    {{ __('Annual Reports') }}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/media-uploader.css') }}">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
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
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-error-msg />
                <x-flash-msg />
            </div>
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('All Annual Reports') }}</h4>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead class="text-white">
                                    <tr>
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Year') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_reports as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->year }}</td>
                                            <td>
                                                @if ($data->status)
                                                    <span class="alert alert-success">{{ __('Published') }}</span>
                                                @else
                                                    <span class="alert alert-warning">{{ __('Draft') }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <x-delete-popover :url="route('admin.annual.report.delete', $data->id)" />
                                                <a href="#" data-toggle="modal" data-target="#edit_item_modal"
                                                    class="btn btn-xs btn-primary btn-xs mb-3 mr-1 edit_item_btn"
                                                    data-id="{{ $data->id }}" data-title="{{ $data->title }}"
                                                    data-year="{{ $data->year }}" data-file_url="{{ $data->file_url }}"
                                                    data-status="{{ $data->status ? 'publish' : 'draft' }}"
                                                    data-description="{{ $data->description }}">
                                                    <i class="ti-pencil"></i>
                                                </a>
                                                @if($data->file_url)
                                                    <a href="{{ asset($data->file_url) }}" target="_blank"
                                                       class="btn btn-xs btn-info btn-xs mb-3 mr-1" title="{{ __('View PDF') }}">
                                                        <i class="ti-eye"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('Add New Report') }}</h4>
                        <form action="{{ route('admin.annual.report') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}</label>
                                <input type="text" class="form-control" name="title" placeholder="{{ __('Title') }}">
                            </div>
                            <div class="form-group">
                                <label for="year">{{ __('Year') }}</label>
                                <input type="text" class="form-control" name="year" placeholder="{{ __('Year (e.g. 2024)') }}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __('Description') }}</label>
                                <textarea name="description" class="form-control" cols="30" rows="5" placeholder="{{ __('Description') }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">{{ __('Status') }}</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="publish">{{ __('Publish') }}</option>
                                    <option value="draft">{{ __('Draft') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file_url">{{ __('Upload Report (PDF)') }}</label>
                                <input type="file" name="file_url" id="file_url" class="form-control" accept="application/pdf">
                                <small class="form-text text-muted">{{ __('Allowed files: pdf. Max 20MB') }}</small>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">{{ __('Add Report') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_item_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Edit Annual Report') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.annual.report.update') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label for="edit_title">{{ __('Title') }}</label>
                            <input type="text" class="form-control" id="edit_title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="edit_year">{{ __('Year') }}</label>
                            <input type="text" class="form-control" id="edit_year" name="year">
                        </div>
                        <div class="form-group">
                            <label for="edit_description">{{ __('Description') }}</label>
                            <textarea name="description" class="form-control" id="edit_description" cols="30" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">{{ __('Status') }}</label>
                            <select name="status" class="form-control" id="edit_status">
                                <option value="publish">{{ __('Publish') }}</option>
                                <option value="draft">{{ __('Draft') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_file_url">{{ __('Upload New Report (PDF)') }}</label>
                            <input type="file" name="file_url" id="edit_file_url" class="form-control" accept="application/pdf">
                            <small class="form-text text-muted">{{ __('Leave empty to keep existing file.') }}</small>
                            <div id="current_file_link" class="mt-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit_item_btn', function() {
                var el = $(this);
                var id = el.data('id');
                var title = el.data('title');
                var year = el.data('year');
                var status = el.data('status');
                var description = el.data('description');
                var file_url = el.data('file_url');

                var form = $('#edit_item_modal form');
                form.find('#edit_id').val(id);
                form.find('#edit_title').val(title);
                form.find('#edit_year').val(year);
                form.find('#edit_description').val(description);
                form.find('#edit_status').val(status);
                
                if(file_url){
                    var link = '<a href="{{ asset('') }}' + file_url + '" target="_blank" class="text-primary">{{ __("View Current PDF") }}</a>';
                    form.find('#current_file_link').html(link);
                } else {
                    form.find('#current_file_link').html('');
                }
            });
        });
    </script>
    <!-- Datatable and Media Uploader Scripts -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table-wrap > table').DataTable({
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
    <script src="{{ asset('assets/backend/js/dropzone.js') }}"></script>
    @include('backend.partials.media-upload.media-js')
@endsection
