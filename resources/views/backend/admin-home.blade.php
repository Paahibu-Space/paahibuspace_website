@extends('backend.admin-master')
@section('site-title')
    {{__('Dashboard')}}
@endsection
@section('content')

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3 mt-5 mb-3">
                        <div class="card text-dark mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.new.user')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_admin}}</span>
                                    <h4 class="title">{{__('Total Admin')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.blog.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-comments"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$blog_count}}</span>
                                    <h4 class="title">{{__('Total Blogs')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.programs.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-calendar"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_programs}}</span>
                                    <h4 class="title">{{__('Total Programs')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card text-dark mb-3">
                                <div class="dsh-box-style">
                                    <a href="{{route('admin.program.registration.logs')}}" class="add-new"><i class="ti-eye"></i></a>
                                    <div class="icon">
                                        <i class="ti-stats-up"></i>
                                    </div>
                                    <div class="content">
                                        <span class="total">{{$total_program_registration}}</span>
                                        <h4 class="title">{{__('Waitlist Entries')}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.story.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-write"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_stories}}</span>
                                    <h4 class="title">{{__('Total Stories')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.team.member')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-user"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_team}}</span>
                                    <h4 class="title">{{__('Team Members')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{__('Recent Program Registration')}}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th>{{__('Registration ID')}}</th>
                                    <th>{{__('Date')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($program_registration_recent_registration as $data)
                                        <tr>
                                            <td>#{{$data->id}}</td>
                                            <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
