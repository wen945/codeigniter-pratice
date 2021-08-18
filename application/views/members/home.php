<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
</head>
<body>
    <form action="login_members" method="post">
        <fieldset >
            <legend>登入帳密</legend>
                <label>帳號：<input type="text" name="account" placeholder="帳號"><br></label>
                <label>密碼：<input type="password" name="password" placeholder="密碼"><br></label>
        </fieldset>
        <button  onclick="login_members();">Login登入</button>
    </form>
        <button onclick="register_members()">Register註冊</button>

    
</body>
<script type="text/javascript">
    // function login_members()
    // {
    //     window.location.href="login_members";
    // }
    function register_members()
    {
        window.location.href="register_members";
    }
</script>
</html>

                   