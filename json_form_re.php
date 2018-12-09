<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>ListBooks</title>
    </head>
    <body>
    <header>
        <nav>
            <div class="nav-wrapper teal blue-grey darken-4">
               <div class="row"><strong><span style="font-size:32px; margin-left:1.5%;">   ListBooks </span></strong>   - プロがおすすめした本をご紹介してます -</div>
            </div>
        </nav>
    </header>
    <div class="card-panel teal blue-grey lighten-5"> 
        <div id="">
            <a class="tagbtn waves-effect waves-light btn"><i class="material-icons left">label</i>Name</a>
            <a class="tagbtn waves-effect waves-light btn"><i class="material-icons left">label</i>Theme</a>
            <a class="tagbtn waves-effect waves-light btn"><i class="material-icons left">label</i>Review</a>
            <a class="mypagebtn waves-effect waves-light btn blue darken-2"><i class="material-icons left">bookmark</i>Bookmark</a>
        </div>
        <div id="taglist" style="margin-top:1%"></div>
    </div>
    <div class="row" id="contents" style="width:90%; margin-left:7%;"></div>
    <footer class="page-footer teal blue-grey darken-4">
        <div class="footer-copyright">
            <div class="container" style="text-align:center">
            © 2018 Copyright ListBooks
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script type="module">

        import Tag from './class_tag.js';
        import Mypage from './class_mypage.js';
        
        const tag = new Tag();
        const mypage = new Mypage();

        $(".tagbtn").on("click", function() {
            tag.tagajax();
        });

        $(document).on("click",".chip", function() {
            tag.tagsearch(this);
        });

        $(".mypagebtn").on("click", function() {
            mypage.mypage_view();

        });

        $(document).on("click",".like",function(){
            mypage.mypage_save();

        });

    </script>
    </body>
  </html>


