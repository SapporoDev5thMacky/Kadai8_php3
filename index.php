<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form method="POST" action="insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>決算推移</legend>
                <label>年度：<input type="number" name="year" min="2017" max="2025"></label><br>
                <label>総収益：<input type="number" name="revenue" min="2500" max="5000"></label><br>
                <label>総資産：<input type="number" name="asset" min="3500" max="5000"></label><br>
                <label>負債：<input type="number" name="liab" min="1500" max="3000"></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
</body>

</html>
