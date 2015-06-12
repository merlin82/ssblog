function loginSubmit() {

    $.ajax({
        cache: false,
        type: "POST",
        url: "./login",
        data: $('#loginform').serialize(),
        async: true,
        error: function () {
            $("#loginresult").html('<div class="alert alert-warning" role="alert">登录失败</div>');
        },
        success: function () {
            $("#loginresult").html('<div class="alert alert-success" role="alert">登录成功</div>');
            setTimeout(function () {
                window.location.href = "./";
            }, 500);
        }
    });
    return false;
}

function newSubmit() {
    $.ajax({
        cache: false,
        type: "POST",
        url: "./new",
        data: $('#newform').serialize(),
        async: true,
        error: function () {
            $("#newresult").html('<div class="alert alert-warning" role="alert">发表失败</div>');
        },
        success: function () {
            $("#newresult").html('<div class="alert alert-success" role="alert">发表成功</div>');
            setTimeout(function () {
                window.location.href = "./";
            }, 500);
        }
    });
    return false;
}

function editSubmit() {
    $.ajax({
        cache: false,
        type: "POST",
        url: $('#editform').action,
        data: $('#editform').serialize(),
        async: true,
        error: function () {
            $("#editresult").html('<div class="alert alert-warning" role="alert">编辑失败</div>');
        },
        success: function () {
            $("#editresult").html('<div class="alert alert-success" role="alert">编辑成功</div>');
            setTimeout(function () {
                window.location.href = "./manager";
            }, 500);
        }
    });
    return false;
}
function delBlog() {
    return confirm("确定要删除么？");
}

function getMoreMgrBlog() {
    pageidx = parseInt($('#pageindex').text()) + 1;
    pagecount = parseInt($('#pagecount').text());
    if (pageidx >= pagecount) {
        $('#moreblog').html("没有更多了");
        return;
    }
    $.ajax({
        url: "./more/" + pageidx,
        type: 'GET',
        dataType: 'json',
        async: true,
        success: function (jsonData) {
            if (jsonData != null) {
                $('#pageindex').html(pageidx);
                var html = "";

                $.each(jsonData[0], function (index, item) {

                    html += '<tr>';
                    html += '<td>' + item._id.$id + '</td>';
                    html += '<td>' + item.title + '</td>';
                    html += '<td>' + item.datetime + '</td>';
                    html += '<td>';
                    html += '<a href="./edit/' + item._id.$id + '"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;';
                    html += '<a class="delblog" href="./delete/' + item._id.$id + '"><span class="glyphicon glyphicon-remove"></span></a>';
                    html += '</td>';
                    html += '</tr>';
                });

                $('.content').append(html);
                $('.delblog').click(delBlog);
                if (pageidx == pagecount - 1) {
                    $('#moreblog').html("没有更多了");
                }
            }
        }
    });
}


function getMoreBlog() {
    pageidx = parseInt($('#pageindex').text()) + 1;
    pagecount = parseInt($('#pagecount').text());
    if (pageidx >= pagecount) {
        $('#moreblog').html("没有更多了");
        return;
    }
    $.ajax({
        url: "./more/" + pageidx,
        type: 'GET',
        dataType: 'json',
        async: true,
        success: function (jsonData) {
            if (jsonData != null) {
                $('#pageindex').html(pageidx);
                var html = "";

                $.each(jsonData[0], function (index, item) {

                    html += '<div class="row">';
                    html += '<div class="col-md-12 widget">';
                    html += '<blog>';
                    html += '<div class="blog-head">';
                    html += '<div class="blog-title">';
                    html += '<h3>';
                    html += '<a href="blog/' + item._id.$id + '">';
                    html += item.title;
                    html += '</a>';
                    if (item.type == 'original') {
                        html += '<span class="label label-info">原创</span>';
                    }
                    else {
                        html += '<span class="label label-warning">转载</span>';
                    }
                    html += '</h3>';
                    html += '</div>';
                    html += '<div class="blog-meta">';
                    html += item.datetime;
                    html += '</div>';
                    html += '</div>';

                    html += '<div class="blog-abstract">';
                    html += '<p>';
                    html += item.abstract;
                    html += '</p>';
                    html += '</div>';
                    html += '</blog>';
                    html += '</div>';
                    html += '</div>';
                });

                $('.content').append(html);
                if (pageidx == pagecount - 1) {
                    $('#moreblog').html("没有更多了");
                }
            }
        }
    });
}

$(function () {

    $('#loginModal').keydown(function (e) {
        if (e.keyCode == 13) {
            loginSubmit();
        }
    });

    $('#loginsubmit').click(loginSubmit);


    if ($('title').text() == '管理') {
        $('#moreblog').click(getMoreMgrBlog);
        $('.delblog').click(delBlog);
    }
    if ($('title').text() == '首页') {
        $('#moreblog').click(getMoreBlog);
    }
    if ($('title').text() == '发表' || $('title').text() == '编辑') {
        $('#datetimepicker')[0].value = moment().format('YYYY-MM-DD HH:mm:ss');
        $('#datetimepicker').datetimepicker({format: 'YYYY-MM-DD HH:mm:ss'});
        $('#newsubmit').click(newSubmit);
        $('#editsubmit').click(editSubmit);
    }

});

