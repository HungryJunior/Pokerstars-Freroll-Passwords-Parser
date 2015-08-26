<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PokerStarsFP.Hungry Junior</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/mocha/1.20.1/mocha.css'>
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
</head>
<body>
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pokerstars Freeroll`s Passwords Parser (
                    <a href="https://github.com/Bugaevskiy" id="newGame">
                        Hungry Junior
                    </a>)
                    <span id="date">{$data[0]["date"]} (UTC+01:00)</span>
                </div>
                <table class="table">
                    <tbody id="hands">
                    <tr class="success">
                        <th>ID<span id="club">♣</span></th>
                        <th>Title<span id="heart">♥</span></th>
                        <th>Time<span id="spade">♠</span></th>
                        <th>Password<span id="diamond">♦</span></th>
                    </tr>
                    {foreach $data as $key=>$value}
                        <tr>
                            <td>{$value["id"]}</td>
                            <td>{$value["title"]}</td>
                            <td>
                                <p>{$value["hour"]}</p>
                            </td>
                            <td>{$value["pass"]}</td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>