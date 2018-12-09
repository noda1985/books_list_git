<?php 

class Bookdata{

    private $data = "";

    public function __construct($data) {
        $this->setData($data);
    }

    public function fileGet($data){
        $json = file_get_contents($data);
        $json_decode = json_decode($json);
        $posts = $json_decode->feed->entry; 
        return $posts;
        }

    public function setData($data){
        $this->data = (string)filter_var($data);
    }

    public function getData(){
        return $this->data;
    }

}

class Booklist{
    private $listcontents = '<?php if(count($result)!==0): ?>
    <div class="row" >選書：<?php echo $result[0][0]; ?>氏</div>
    <?php for ($i=0; $i < count($result) ; $i++) : ?>    
    <div class="col s12 m3" style="float: none; display: inline-block; vertical-align: top; margin:0% -0.5%;">
            <div class="card">
                <div class="card-image" >
                    <a href="<?php echo $result[$i][3]; ?>" target="_blank"><img src="<?php echo $result[$i][4]; ?>"></a>
                    <a class="btn-floating halfway-fab waves-effect waves-light redbtn modal-trigger" href="#modal<?php echo $i;?>" data-target="modal<?php echo $i;?>"><i class="material-icons" >add</i></a>
                </div>
                <div class="card-content">
                    <!-- <a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $i;?>" data-target="modal<?php echo $i;?>" >Modal</a> -->
    
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
    <?php endif; ?>';

    public function getlistcontents(){
        return $this->listcontents;
    }


}

class Search{

    private  $posts_base = array();

    public function getpost_base(){
        return $this->posts_base;
    }

    public function arraypush($posts,$posts_base){
        foreach($posts as $post ){
                $kari = array();
           
                array_push($kari,$post->{'gsx$推薦者'}->{'$t'});//0
                array_push($kari,$post->{'gsx$書籍タイトル'}->{'$t'});//1
                array_push($kari,$post->{'gsx$レビュー'}->{'$t'});//2
                array_push($kari,$post->{'gsx$書籍リンク'}->{'$t'});//3
                array_push($kari,$post->{'gsx$書籍画像'}->{'$t'});//4
                array_push($kari,$post->{'gsx$出典'}->{'$t'});//5
                array_push($kari,$post->{'gsx$出典リンク'}->{'$t'});//6
                array_push($kari,$post->{'gsx$書籍番号'}->{'$t'});//7
                
            
                array_push($posts_base,$kari);
            }
            return $posts_base;
        }
}


?>
