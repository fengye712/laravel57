@extends('layouts.master')

@section('content')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>基本</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="table_basic.html#">
                <i class="fa fa-wrench"></i>
            </a>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>序号</th>
                <th>名称</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>#</td>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->tagname }}</td>
                    <td>23</td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
</div>
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