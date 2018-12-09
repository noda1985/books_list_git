
<body>
<?php if(count($result)!==0): ?>
    <?php if(isset($sarchpage)): ?>
            <div class="row" >選書：<?php echo $result[0][0]; ?>氏</div>
        <?php elseif(isset($mypage)) : ?> 
            <div class="row" >ブックマークした書籍</div>
    <?php endif; ?>

    <?php for ($i=0; $i < count($result) ; $i++) : ?>
                <div class="col s12 m3" style="float: none; display: inline-block; vertical-align: top; margin:0% -0.5%;">
                    <div class="card">
                        <div class="card-image" >
                            <a href="<?php echo $result[$i][3]; ?>" target="_blank"><img src="<?php echo $result[$i][4]; ?>"></a>
                            <a class="btn-floating halfway-fab waves-effect waves-light redbtn modal-trigger" href="#modal<?php echo $i;?>" data-target="modal<?php echo $i;?>"><i class="material-icons" >add</i></a>
                        </div>
                        <div class="card-content">
                            <p><h6><?php echo "「".$result[$i][1]."」"; ?></h6><br><?php echo $result[$i][2]; ?></p>
                        </div>
                    </div>
                </div>
                    <div id="modal<?php echo $i; ?>" class="modal">
                        <div class="modal-content">
                            <h6 data-like="<?php echo $result[$i][7]; ?>"><?php echo $result[$i][1]; ?></h6>
                            <p>選書：<?php echo $result[$i][0]; ?>氏</p>
                            <p><blockquote><?php echo $result[$i][2]; ?></blockquote></p>
                            出典：<a href="<?php echo $result[$i][6]; ?>"><?php echo $result[$i][5]; ?></a>
                        </div>
                        <div class="modal-footer">
                            <span class="like waves-effect waves-green btn-flat">Pick</span> 
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Close</a>
                        </div>
                    </div>
    <?php endfor; ?>
<?php else : ?>
        <p><?php echo "該当ワードではヒットしませんでした"; ?></p>
<?php endif; ?>
</body>
</html>
