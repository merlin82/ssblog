<div class="container">
    <div class="row widget col-md-12 ">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" id="newform" action="./new" method="post">
                <div class="form-group">
                    <label for="title" class="control-label"><h4>标题:</h4></label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="datetime" class="control-label"><h4>日期:</h4></label>
                    <input type="text" id="datetimepicker" name="datetime">
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="type" value="original" checked>
                        <span class="label label-info">原创</span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" value="copy">
                        <span class="label label-warning">转载</span>
                    </label>

                </div>
                <div class="form-group">
                    <label for="abstract" class="control-label"><h4>摘要:</h4></label>
                    <textarea class="form-control" name="abstract" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="content" class="control-label"><h4>正文:（使用<a href="http://www.appinn.com/markdown/">markdown</a>）</h4></label>
                    <textarea class="form-control" name="content" rows="30"></textarea>
                </div>
                <div id="newresult"></div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-lg" id="newsubmit">发表</button>
                    <button type="reset" class="btn btn-default btn-lg">取消</button>
                </div>
            </form>
        </div>
    </div>
</div>
