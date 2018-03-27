<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="coinbox/template/css/site.css">
    <link rel="stylesheet" href="coinbox/template/css/style.css">
    <style type="text/css">
    <?php echo $data["custom_css"]; ?>
</style>
<title><?php echo $data["name"]; ?> - <?php echo $data["short"]; ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#"><?php echo $data["name"]; ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php foreach($data["user_pages"] as $page): ?>
                        <li><a href="?p=<?php echo $page["url_name"]; ?>"><?php echo $page["name"]; ?></a></li>
                    <?php endforeach; ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope-open"></i> Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="ads">
            <?php echo $data["custom_box_top"]; ?>
        </div>
        <div class="row">
            <div class="col-md-3 ads">
                <?php echo $data["custom_box_left"]; ?> 
            </div>
            <div class="col-md-6">
                <h1 class="ribbon ribbon-content"><?php echo $data["name"]; ?></h1>
                <div class="main">
                    <?php if($data["page"] != 'user_page'): ?>
                        <button type="button" class="btn btn-info"><i class="fas fa-gift"></i> <?php echo $data["balance"]." ".$data["unit"]; ?></buttom>

                            <button type="button" class="btn btn-success"><i class="fas fa-trophy"></i> <?php echo $data["rewards"]. '<u style="color: #F67F7F;"> + ( ' .$link_reward. ' )</u> ' .$data['unit'].  ' every ' .$data["timer"]; ?> minutes.</button>
                        <?php endif;    if($data["error"]) echo $data["error"]; ?>
                        <?php if($data["safety_limits_end_time"]): ?>
                            <p class="alert alert-warning">This faucet exceeded it's safety limits and may not payout now!</p>
                        <?php endif; ?>
                        <?php switch($data["page"]):
                        case "disabled": ?>
                        <p class="alert alert-danger">FAUCET DISABLED. Go to <a href="admin.php">admin page</a> and fill all required data!</p>
                        <?php break; case "paid":
                        echo $data["paid"];
                        if($data["referral"]): ?>
                        Referral commission: <?php echo $data["referral"]; ?>%<br>
                        Reflink: <?php echo $data["reflink"]; ?>
                    <?php endif;
                    break; case "eligible": ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" name="address" class="form-control" style="position: absolute; position: fixed; left: -99999px; top: -99999px; opacity: 0; width: 1px; height: 1px">
                            <input type="checkbox" name="honeypot" style="position: absolute; position: fixed; left: -99999px; top: -99999px; opacity: 0; width: 1px; height: 1px">
                            <label class="control-label"><span class="badge badge-success">Your Address:</span></label>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><img src="coinbox/template/img/bitcoin.png"></span>
                                    </div>
                                    <input type="text" name="<?php echo $data["address_input_name"]; ?>" class="form-control" value="<?php echo $data["address"]; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="ads">
                            <?php echo $data["custom_box_bottom"]; ?>
                        </div>
                        <div class="form-group">
                            <center>
                                <?php echo $data["captcha"]; ?>
                                <div class="text-center">
                                    <?php
                                    if (count($data['captcha_info']['available']) > 1) {
                                        foreach ($data['captcha_info']['available'] as $c) {
                                            if ($c == $data['captcha_info']['selected']) {
                                                echo '<b>' .$c. '</b> ';
                                            } else {
                                                echo '<a href="?cc='.$c.'">'.$c.'</a> ';
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </center>
                        </div>
                        <button type="button" class="btn btn-primary btn-lg btn-block claim-button" data-toggle="modal" data-target=".bd-example-modal-lg">Next</button>
                        <?php if ($link_status == 'on' and $link_force !== 'on') { for ($i=1; $i <= count($link) ; $i++) { if (!isset($_COOKIE[$i])) { ?>
                        <input type="checkbox" name="shortlink" value="coinbox" checked> <i class="fa fa-gift" aria-hidden="true"></i> <strong>I want to click <font color="#F67F7F">SHORT LINK</font> and receive <font color="#F67F7F"> + <?=$link_reward?> satoshi bounus</font></strong><br>
                        <?php break; } }} ?>
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="ads">
                                        <?php echo $data["custom_footer"]; ?>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-block btn-warning">Get Reward!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if ($data["reflink"]): ?>
                        <blockquote class="text-left">
                            <p>
                                Reflink: <code><?php echo $data["reflink"]; ?></code>
                            </p>
                            <footer>Share this link with your friends and earn <?php echo $data["referral"]; ?>% referral commission</footer>
                        </blockquote>
                    <?php endif; ?>
                    <?php break; case "visit_later": ?>
                    <p class="alert alert-info">You have to wait <?php echo $data["time_left"]; ?></p>
                    <?php break; case "user_page": ?>
                    <?php echo $data["user_page"]["html"]; ?>
                    <?php break; endswitch; ?>
                </div>
            </div>
            <div class="col-md-3 ads">
                <?php echo $data["custom_box_right"]; ?>
            </div>
        </div>
    </div>
    <p class="text-center footer">&copy 2018 <a href="<?=$protocol.$_SERVER['HTTP_HOST'].strtok($_SERVER['REQUEST_URI'], '?')?>"><?php echo $data["name"]; ?></a>, script by <a href="http://coinbox.club" rel="dofollow" id="copyright">CoinBox Script</a></p>
    <!-- Do not remove or edit the footer script by <a href="http://coinbox.club" rel="dofollow" id="copyright">CoinBox Script</a>, you will be redirected -->

    <script src="coinbox/template/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="libs/mmc.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>


    <?php if($data['button_timer']): ?>
        <script type="text/javascript" src="libs/button-timer.js"></script>
        <script> startTimer(<?php echo $data['button_timer']; ?>); </script>
    <?php endif; ?>
    <?php if($data['block_adblock'] == 'on'): ?>
        <script type="text/javascript" src="libs/advertisement.js"></script>
        <script type="text/javascript" src="libs/check.js"></script>
    <?php endif; ?>
</body>
</html>