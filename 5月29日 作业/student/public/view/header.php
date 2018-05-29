<nav class="navbar navbar-inverse" style="border-radius: 0">
    <div class="container">
        <a class="navbar-brand" href="">Student Manager</a>
        <ul class="nav navbar-nav" style="float: right;">
            <li class="active">
                <a href="">homepage</a>
            </li>
            <li>
                <a href="index.php?s=admin/login/logout"><span style="color: red"><?php echo $_SESSION['username'] ?></span>&nbsp;&nbsp;退出</a>
                <!--                    <a href="">登录</a>-->
            </li>
        </ul>
    </div>
</nav>