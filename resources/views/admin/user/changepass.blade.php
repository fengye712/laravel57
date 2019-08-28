@extends('layouts.master')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>修改密码</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                    <i class="fa fa-wrench"></i>
                </a>
                {{--<ul class="dropdown-menu dropdown-user">--}}
                    {{--<li><a href="form_basic.html#">选项1</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="form_basic.html#">选项2</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal m-t" id="commentForm" action="/admin/changePass" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">原密码:</label>
                    <div class="col-sm-8">
                        <input id="cname" name="origin_pass" minlength="2" type="text" class="form-control" aria-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">新密码:</label>
                    <div class="col-sm-8">
                        <input id="cemail" type="text" class="form-control" name="password"  aria-required="true">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">确认密码:</label>
                    <div class="col-sm-8">
                        <input id="curl" type="text" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-3">
                        <button class="btn btn-primary" type="submit">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--@include('flash::message')--}}
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
