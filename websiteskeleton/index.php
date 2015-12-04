<?php
session_start();
if (isset($_SESSION['username'])) { ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cat Feeder</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="layout.css">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script src="js/Chart.js"></script>

    </head>
    <body>
    <header>
        <a href="php/logout.php" class="btn btn-default pull-right">Log Out</a>
        <h1>Cat Feeder</h1>
        <h1>Welcome back, <?= $_SESSION['username']; ?>!</h1>
    </header>

    <div class="row">
        <div class="col-sm-1"> </div>
        <aside class="col-sm-3" >

            <img src="CatEmoji\HeartEyesCat.png" class="center-block" id="face" alt="Heart Eyes Cat Face">
            <img src="CatEmoji\Button.png" class="center-block" id="button" alt="Button">

        </aside>
        <section class="col-sm-7">
            <div style="width:100%" class="hidden-xs">
                <div>
                    <canvas id="canvas" height="450" width="600"></canvas>
                </div>
            </div>
            <script src="js/line.js"></script>
            <br><br>
            <form name="journal_entry">
                <label for="journalText" class="sr-only">Journal Entry</label>
                <textarea type="journalText" id="journalText" name="journalText"  placeholder="Journal Entry (500 Character limit)" rows="5" maxlength="500" required autofocus></textarea>
                <br>

                <label>
                    <input type="radio" name="cat_radio" value="9" required="required"/>
                    <img src="CatEmoji\HeartEyesCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="8"  required="required"/>
                    <img src="CatEmoji\KissingCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="7"   required="required"/>
                    <img src="CatEmoji\HappyTearsCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="6"   required="required"/>
                    <img src="CatEmoji\GrinningCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="5"   required="required"/>
                    <img src="CatEmoji\SmilingCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="4"   required="required"/>
                    <img src="CatEmoji\SmirkingCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="3"   required="required"/>
                    <img src="CatEmoji\WearyCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="2"   required="required"/>
                    <img src="CatEmoji\PoutingCat.png" class="radio_cat">
                </label>

                <label>
                    <input type="radio" name="cat_radio" value="1"   required="required"/>
                    <img src="CatEmoji\CryingCat.png" class="radio_cat">
                </label>
                <button class="btn btn-lg btn-primary" type="submit">Submit Entry</button>
            </form>
            <br><br><br>
        </section>
        <div class="col-sm-1"> </div>
    </div>

    <footer>CatFeeder ©2015</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
    </html>
<?php } else {
        header('Location: login.html');
    } ?>