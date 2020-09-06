<footer>
    <?php
    if(isset($_SESSION['login']) == false){
        echo '<p><a href="admin_login.php">管理者ログイン</a></p>';
    } else {
        echo '<p><a href="child_add.php">園児追加</a> / ';
        echo '<a href="admin_logout.php">ログアウト</a></p>';
    }
    ?>
</footer>

</body>
</html>