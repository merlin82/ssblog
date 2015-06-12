<div class="container">
    <div class="row widget col-md-12 ">
        <div class="col-md-10 col-md-offset-1">
            <form class="form-horizontal" id="editform" action="<? echo "./edit/" . $blog["_id"]; ?>" method="post">

                <div class="form-group">
                    <label for="title" class="control-label"><h4>标题:</h4></label>
                    <input type="text" class="form-control" name="title" value="<? echo $blog["title"]; ?>">
                </div>

                <div class="form-group">
                    <label for="datetime" class="control-label"><h4>日期:</h4></label>
                    <input type="text" id="datetimepicker" name="datetime">
                </div>
                <div class="form-group">
                    <label class="radio-inline">
                        <input type="radio" name="type" value="original" <? if ($blog["type"] == "original") {
                            echo ' checked';
                        } ?> >
                        <span class="label label-info">原创</span>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="type" value="copy" <? if ($blog["type"] == "copy") {
                            echo ' checked';
                        } ?> >
                        <span class="label label-warning">转载</span>
                    </label>

                </div>
                <div class="form-group">
                    <label for="abstract" class="control-label"><h4>摘要:</h4></label>
                    <textarea class="form-control" name="abstract" rows="3"><? echo $blog["abstract"]; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="content" class="control-label"><h4>正文:（使用<a href="http://www.appinn.com/markdown/">markdown</a>）</h4></label>
                    <textarea class="form-control" name="content" rows="30"><? echo $blog["content"]; ?></textarea>
                </div>
                <div id="editresult"></div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-lg" id="editsubmit">提交</button>
                    <a type="button" class="btn btn-default btn-lg" href="./edit/<? echo $blog['_id'] ?>">取消</a>
                </div>
            </form>
        </div>
    </div>
</div>
