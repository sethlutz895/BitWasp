        <div class="mainContent">
                        <h3><?=$user['userName'] ?></h3>

                        <div id="main">
Date Registered: <?php echo date('j / F / Y ',$user['timeRegistered']); ?><br />
Rating: <?=$user['rating'] ?><br />
<?=anchor('messages/send/'.$user['userHash'],'Message this user');?>
                        </div>

                        <div class="clear"></div>

                </div>

                <div class="productImgs">

                        <div class="clear"></div>
                </div>
                <div class="clear"></div>
        </div>



