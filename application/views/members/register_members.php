<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Home</title>
    </head>
    <body>
        <form action="" method="post">
            <fieldset >
                <legend>登入帳密</legend>
                    <label>帳 號：<input type="text" name="account" placeholder="帳號"><br></label>
                    <label>密 碼：<input type="password" name="password" placeholder="密碼"><br></label>
                    <label>確認密碼：<input type="password" name="checkPassword" placeholder="請再次輸入密碼"><br></label>
                    <label>姓 名：<input type="text" name="name" placeholder="姓名"><br></label>
                    <label>電 話：<input type="tel" name="phone" placeholder="電話"  pattern="09[0-9]{8}"required><br></label>
                    <label>信 箱:<input type="email" name="email" placeholder="信箱"><br></label>
            </fieldset>
            <button type="submit">送出</button>
        </form>
    </body>
</html>