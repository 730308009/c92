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
    <!-- 加载顶部模板 -->
<?php include 'public/view/header.php' ?>
<div class="container">
    <div class="row">
        <!-- 加载左边模板 -->
        <?php include 'public/view/left.php' ?>
        <div class="col-lg-9">
            <!-- TAB NAVIGATION -->
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">修改信息</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputID" class="col-sm-2 control-label">班级名称:</label>
                            <div class="col-sm-10">
                                <input type="text" name="gname" id="inputID" class="form-control" value="<?php echo $result['gname']; ?>">
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- 加载底部模板 -->
    <?php include 'public/view/footer.php' ?>
</body>
</html>