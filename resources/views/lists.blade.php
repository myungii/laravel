
@extends('layouts/master')
@section('title')리스트@stop
@section('content')


<head>
    <style>
        #noticeList {
            font-weight : bold;
        }
        #new {
            color : red;
        }

    </style>
</head>

<!-- //subTitle -->
<div id="title-area">HTML </div>
<!-- Contents -->
<div id="Contents" style="width:1400px; padding-left:20em;">
    <!-- filter -->
    <form id="FrmAttendanceSearch" method="get" action="/" >
    <input type="hidden" name="p" value="">
    <table class="table table-bordered table-form pad">
        <colgroup>
            <col width="120px">
            <col>

        </colgroup>
        <tbody>
            <tr>
                <th>제목</th>
                <td>
                    <input type="text" name="filter_name" class="form-control input-xsm"  style="width:1022px;"  value="" autocomplete="off">
                </td>
            </tr>

        </tbody>
    </table>

    <div class="area-button">
        <button type="submit" class="btn btn-lg btn-theme" onclick="">검색</button>
    </div>
    </form>

        <!-- btn, total -->
        <h3 class="area-title">
        Total :
        <span class="f-bold"><strong><span id="recordsTotal"> {{ $total }} </span></strong>건</span>
        <div class="button-box">
            <button class="btn btn-flat-blue" onclick="location.replace('');" style="float: left;">게시물 등록</button>
        </div>
    </h3>

    <!-- list -->

        <table class="table table-bordered table-list table-striped table-hover table-adjehyu" id="adjehyuList">
            <colgroup>
                <col width="80px">
                <col>
                <col width="100px">
                <col width="100px">
                <col width="100px">
            </colgroup>
            <thead>
            <tr>
                <th>No</th>
                <th>제목</th>
                <th>이름</th>
                <th>등록일</th>
                <th>조회수</th>
            </tr>
            </thead>
            <tbody>
                @foreach ( $boards as $list )
                <tr>
                    <td id="noticeList">공지</td>
                    <td>
                        <a href="/index.php/content?id='.{{ $list->id }}.'">{{ $list->title }}</a>
                    </td>
                    <td> {{ $list->name }} </td>
                    <td> {{ $list->created_at }} </td>
                    <td> {{ $list->cnt }} </td>
                </tr>
                @endforeach



            </tbody>

        </table>

        <div id="paging" class="area-button">
        <ul class="pagination">

        </ul>

        </div>


</div>

<!-- Contents -->

<script type="text/javascript">

$(function() {


});

</script>




@stop


