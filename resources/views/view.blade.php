<div class="box box-info box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">{{$viewData['text']}}</h3>
        <div class="box-tools pull-right">
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body" style="display: block;">
        <table class="table ">
            <thead><tr>
                <th>分类</th>
                <th>内容</th>
            </tr></thead>
            <tbody>
            <tr>
                <td>标准答案</td>
                <td>{{$viewData['re_str']}}</td>
            </tr>
            <tr>
                <td>标签</td>
                <td>{{$viewData['conen']}}</td>
            </tr>
            <tr>
                <td>情感倾向分析</td>
                <td>{{$viewData['sentimentStr']}}</td>
            </tr>
            <tr>
                <td>打开</td>
                <td>@if($viewData['video'] != '')<video src="{{$viewData['video']}}" width="200" autoplay muted>
                    </video>@endif</td>
            </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>