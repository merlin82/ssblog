<div class="container">
    <div class="col-md-8">
        <div class="content ">
            <? while ($cursor->hasNext()) {
                $blog = $cursor->getNext(); ?>
                <div class="row">
                    <div class="col-md-12 widget">
                        <blog>
                            <div class="blog-head">
                                <div class="blog-title">
                                    <h3>
                                        <a href="blog/<? echo $blog["_id"] ?>">
                                            <? echo $blog["title"]; ?>
                                        </a>
                                        <? if ($blog["type"] == "original") { ?>
                                            <span class="label label-info">原创</span>
                                        <? } else { ?>
                                            <span class="label label-warning">转载</span>
                                        <? } ?>
                                    </h3>
                                </div>
                                <div class="blog-meta">
                                    <? echo $blog["datetime"]; ?>
                                </div>
                            </div>
                            <? if (array_key_exists("content", $blog)) { ?>
                                <div class="blog-content">
                                    <p>
                                        <? echo Parsedown::instance()->parse($blog["content"]); ?>
                                    </p>
                                </div>
                            <? } elseif (array_key_exists("abstract", $blog)) { ?>
                                <div class="blog-abstract">
                                    <p>
                                        <? echo $blog["abstract"]; ?>
                                    </p>
                                </div>
                            <? } ?>
                        </blog>
                    </div>
                </div>
            <? } ?>
        </div>
        <? if ($title == "首页") { ?>
        <div class="hidden">
            <div id="pagecount"><? echo $pagecount ?></div>
            <div id="pageindex">0</div>
        </div>
        <a class="btn btn-primary btn-block" id="moreblog">更多</a>
        <? } ?>
    </div>


    <div class="right-side">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 widget">
                    <b>博客介绍</b>
                    <br><br>
                    <img src="www/images/1.gif" class="pull-right" width="80" height="80"/>
                    <small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;博客最初的名称是Weblog，由web和log两个单词组成，按字面意思就为网络日记，
                        后来喜欢新名词的人把这个词的发音故意改了一下，读成weblog，由此，blog这个词被创造出来。
                    </small>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 widget">
                    <b>分类</b>
                    <br><br>
                    <a class="btn btn-primary" href="#" role="button">
                        Flight <span class="badge">0</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 widget">
                    <b>存档</b>
                    <br><br>
                    <a class="strong" href="#">2015年4月(2)</a>
                </div>
            </div>
        </div>
    </div>
</div>

