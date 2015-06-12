<div class="container">
    <div class="row widget col-md-12 ">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <td class="col-md-2">id</td>
                    <td class="col-md-7">标题</td>
                    <td class="col-md-2">日期</td>
                    <td class="col-md-1"></td>
                </tr>
                </thead>
                <tbody class="content">
                <? while ($cursor->hasNext()) {
                    $blog = $cursor->getNext(); ?>
                    <tr>
                        <td><? echo $blog["_id"] ?></td>
                        <td><? echo $blog["title"] ?></td>
                        <td><? echo $blog["datetime"] ?></td>
                        <td>
                            <a href="./edit/<? echo $blog['_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a>
                            &nbsp;&nbsp;
                            <a href="./delete/<? echo $blog['_id'] ?>" class="delblog"><span
                                    class="glyphicon glyphicon-remove"></span></a>
                        </td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
            <div class="hidden">
                <div id="pagecount"><? echo $pagecount ?></div>
                <div id="pageindex">0</div>
            </div>
            <a class="btn btn-primary btn-block" id="moreblog">更多</a>
        </div>
    </div>
</div>
