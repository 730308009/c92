<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius: 0">
    <div class="container">
        <a class="navbar-brand" href="">Student Manager</a>
        <ul class="nav navbar-nav" style="float: right;">
            <li class="active">
                <a href="">homepage</a>
            </li>
            <li>
                <a href=""><span style="color: red">张三</span>&nbsp;&nbsp;退出</a>
                <!--                    <a href="">登录</a>-->
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <a href="#" class="list-group-item disabled">
                    manager
                </a>
                <a href="" class="list-group-item">user</a>
                <a href="" class="list-group-item">grade</a>
                <a href="" class="list-group-item ">student</a>
            </div>
        </div>
        <div class="col-lg-9">
            <!-- TAB NAVIGATION -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="">grade list</a></li>
                <li><a href="">add grade</a></li>
            </ul>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>id</th>
                    <th>班级名称</th>
                    <th>班级人数</th>
                    <th width="150">操作</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>c92</td>
                        <td>19</td>
                        <td>
                            <div class="btn-group">
                                <a href="" class="btn btn-primary">编辑</a>
                                <a href="" class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.houdunwang.com" target="_blank">houdunwang.com</a></li>
                    <li><a href="http://www.houdunren.com" target="_blank">houdunren.com.cn</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>