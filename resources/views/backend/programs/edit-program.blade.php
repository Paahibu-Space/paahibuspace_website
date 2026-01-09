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
                            <h4 class="header-title">{{__('Edit Program Link')}}</h4>
                            <a href="{{route('admin.programs.all')}}" class="btn btn-primary">{{__('All Programs')}}</a>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <x-backend.auto-slug-js :url="route('admin.programs.slug.check')" :type="'update'"/>
@endsection
