<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/5/5
 * Time: 20:10
 */

require 'config.php';
require 'Parsedown.php';
//Flight::set('flight.views.path', './');
Flight::set('flight.log_errors', true);
Flight::register('user', '\models\User');
Flight::register('blog', '\models\Blog');

Flight::route('/', function () {
    $cursor = Flight::blog()->findList(0, 10);

//    var_dump(iterator_to_array($cursor));

    Flight::render('layout.php',
        array('title' => '首页',
            'base_url' => Flight::get('base_url'),
            'layout' => 'blog',
            'cursor' => $cursor,
            'pagecount' => ceil($cursor->count()/10)));
});

Flight::route('/more/@page_index', function ($page_index) {
    try {
        $cursor = Flight::blog()->findList($page_index*10, 10);

        Flight::json(array(iterator_to_array($cursor)), 200);
    }
    catch (Exception $e)
    {
        Flight::json(array('error' => 'find failed'), 404);
    }
});

Flight::route('/blog/@id', function ($id) {
    $cursor = Flight::blog()->find($id);
    Flight::render('layout.php',
        array('title' => 'blog',
            'base_url' => Flight::get('base_url'),
            'layout' => 'blog',
            'cursor' => $cursor));
});

Flight::route('GET /new', function () {
    Flight::render('layout.php',
        array('title' => '发表',
            'layout' => 'new',
            'base_url' => Flight::get('base_url')));
});

Flight::route('POST /new', function () {
    Flight::blog()->insert(Flight::request()->data->getData());
    Flight::json(array(), 200);
});

Flight::route('GET /delete/@id', function ($id) {
    Flight::blog()->remove($id);
    Flight::redirect('./manager');
});

Flight::route('GET /edit/@id', function ($id) {
    $cursor = Flight::blog()->find($id);
    $blog = $cursor->getNext();
    $cursor->reset();
    Flight::render('layout.php',
        array('title' => '编辑',
            'base_url' => Flight::get('base_url'),
            'layout' => 'edit',
            'blog' => $blog));
});

Flight::route('POST /edit/@id', function ($id) {
    Flight::blog()->update($id, Flight::request()->data->getData());
    Flight::json(array(), 200);
});

Flight::route('/manager', function () {
    $cursor = Flight::blog()->findList(0, 10);
    Flight::render('layout.php',
        array('title' => '管理',
            'base_url' => Flight::get('base_url'),
            'layout' => 'manager',
            'cursor' => $cursor,
            'pagecount' => ceil($cursor->count()/10)));
});

Flight::route('POST /login', function () {
    if (Flight::user()->auth(Flight::request()->data['username'], Flight::request()->data['password'])) {
        session_start();
        $_SESSION['username'] = Flight::request()->data['username'];
        Flight::set('username', $_SESSION['username']);
        session_write_close();
        Flight::json(array(), 200);
    } else {
        Flight::json(array('error' => 'login failed'), 403);
    }
});
// 登录验证
Flight::before('start', function () {
    $ret = true;

    session_start();

    if (isset($_SESSION['username'])) {
        Flight::set('username', $_SESSION['username']);
    } else {
        // 不需要登录的链接
        if (stristr(Flight::request()->url, 'manager')) {
            error_log("not login");
            // 未登录
            if (Flight::request()->ajax) {
                Flight::json(array('error' => 'no session'), 403);
            } else {
                Flight::redirect('./');
            }
            $ret = false;
        }
    }

    session_write_close();
    return $ret;
});

Flight::start();
