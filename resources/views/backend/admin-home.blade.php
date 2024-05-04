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
                                <a href="{{route('admin.events.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-calendar"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_upcoming_programs}}</span>
                                    <h4 class="title">{{__('Total Events')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-3 mt-md-5 mb-3">
                            <div class="card text-dark mb-3">
                                <div class="dsh-box-style">
                                    <a href="{{route('admin.event.attendance.logs')}}" class="add-new"><i class="ti-eye"></i></a>
                                    <div class="icon">
                                        <i class="ti-stats-up"></i>
                                    </div>
                                    <div class="content">
                                        <span class="total">{{$total_upcoming_program_attendance}}</span>
                                        <h4 class="title">{{__('Total Events Attendance')}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.services.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-blackboard"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_services}}</span>
                                    <h4 class="title">{{__('Total Services')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mt-md-5 mb-3">
                        <div class="card text-dark  mb-3">
                            <div class="dsh-box-style">
                                <a href="{{route('admin.work.new')}}" class="add-new"><i class="ti-plus"></i></a>
                                <div class="icon">
                                    <i class="ti-write"></i>
                                </div>
                                <div class="content">
                                    <span class="total">{{$total_works}}</span>
                                    <h4 class="title">{{__('Total Case Study')}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
                <div class="col-lg-6">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            <h4 class="title">{{__('Recent Event Attendance Booking')}}</h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th>{{__('Attendance ID')}}</th>
                                    <th>{{__('Amount')}}</th>
                                    <th>{{__('Payment Status')}}</th>
                                    <th>{{__('Date')}}</th>
                                    </thead>
                                    <tbody>
                                    @foreach($event_attendance_recent_order as $data)
                                        <tr>
                                            <td>#{{$data->id}}</td>
                                            <td>{{amount_with_currency_symbol((int)$data->event_cost * $data->quantity)}}</td>
                                            <td>
                                                @php $pay_status = $data->payment_status; @endphp
                                                @if($pay_status == 'complete')
                                                    <span class="alert alert-success">{{__($pay_status)}}</span>
                                                @elseif($pay_status == 'pending')
                                                    <span class="alert alert-warning">{{__($pay_status)}}</span>
                                                @endif
                                            </td>
                                            <td>{{date_format($data->created_at,'d M Y h:i:s')}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div> --}}
    </div>
@endsection
