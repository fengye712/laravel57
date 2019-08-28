@extends('layouts.master')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>添加标签</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                    <i class="fa fa-wrench"></i>
                </a>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <form class="form-horizontal m-t" id="commentForm" action="/admin/tagcreate" method="post">
                {{ csrf_field()}}
                <div class="form-group">
                    <label class="col-sm-3 control-label">标签名称:</label>
                    <div class="col-sm-8">
                        <input id="cname" name="tagname" minlength="2" type="text" class="form-control" aria-required="true">
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