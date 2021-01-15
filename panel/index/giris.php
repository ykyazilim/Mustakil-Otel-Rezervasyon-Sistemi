<?php session_start();
ob_start();

require"../sistem/db.php";
if (isset($_SESSION['k_adi'])) {
  $kullanicisor=$db->prepare("select * from kullanicilar where k_adi=:ad");
  $kullanicisor->execute(array(
    'ad' => $_SESSION['k_adi'] ));
  $say=$kullanicisor->rowCount();
  if ($say>0) {
    header("Location:index.php"); exit; } }

    if (isset($_POST['giris'])) {

      $kullanici_ad=$_POST['k_adi'];
      $kullanici_password=md5(sha1($_POST['password']));
      if ($kullanici_ad && $kullanici_password) {
        $kullanicisor=$db->prepare("SELECT * from kullanicilar where k_adi=:ad and password=:password  ");
        $kullanicisor->execute(array(
          'ad' => $kullanici_ad,
          'password' => $kullanici_password ));
        $say=$kullanicisor->rowCount();
        $kcek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

        if ($say>0) {
          if ($kcek['yetki']!=5) {echo "yetki";  exit(); }

          $_SESSION['ad']=$kcek['ad'];
          $_SESSION['k_adi'] = $kullanici_ad;
          $_SESSION['yetki']=$kcek['yetki'];
          echo "başarılı"; exit();
        } else {
          echo "başarısız"; exit();} } } 


          ?>
          <!DOCTYPE HTML>
          <html>
          <head>
            <title>YK Yazılım | Yönetim Paneli</title>
            <style type="text/css">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}ol,ul{list-style:none;margin:0;padding:0}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}a{text-decoration:none}.txt-rt{text-align:right}.txt-lt{text-align:left}.txt-center{text-align:center}.float-rt{float:right}.float-lt{float:left}.clear{clear:both}.pos-relative{position:relative}.pos-absolute{position:absolute}.vertical-base{vertical-align:baseline}.vertical-top{vertical-align:top}.underline{padding-bottom:5px;border-bottom:1px solid #eee;margin:0 0 20px}nav.vertical ul li{display:block}nav.horizontal ul li{display:inline-block}img{max-width:100%}body{font-family:'Montserrat',sans-serif;font-size:100%;background:url(arka.jpg)no-repeat;background-size:cover}.login-form{padding:100px 0 50px}.login-form h1{font-size:2em;color:#fff;font-weight:800;text-transform:uppercase;text-align:center;margin-bottom:2em}.top-login{width:130px;height:130px;display:block;-webkit-transform:rotate(45deg) translate3d(0,0,0);-moz-transform:rotate(45deg) translate3d(0,0,0);-ms-transform:rotate(45deg) translate3d(0,0,0);-o-transform:rotate(45deg) translate3d(0,0,0);transform:rotate(45deg) translate3d(0,0,0);margin:0 auto 4em;background:#fff;position:relative}.top-login span{border:2px solid #F36;width:105px;height:105px;display:block;margin:0 auto;position:absolute;top:11px;left:11px}.top-login span img{-webkit-transform:rotate(-45deg) translate3d(0,0,0);-moz-transform:rotate(-45deg) translate3d(0,0,0);-ms-transform:rotate(-45deg) translate3d(0,0,0);-o-transform:rotate(-45deg) translate3d(0,0,0);transform:rotate(-45deg) translate3d(0,0,0);margin:20px 0 0 20px}.login-top{width:460px;display:block;margin:0 auto}.login-ic{background:rgba(255,255,255,0.32);margin-bottom:1.5em;padding:8px}.login-ic i{background:url(m.png)no-repeat 6px 6px;width:38px;height:38px;float:left;display:inline-block}.login-ic i.icon{background:url(l.png)no-repeat 6px 6px}.login-ic input[type="text"],.login-ic input[type="password"]{float:left;background:none;outline:none;font-size:15px;font-weight:400;color:#fff;padding:10px 16px;border:none;border-left:1px solid #fff;width:82%;display:inline-block;margin-left:7px}.log-bwn{text-align:center}.log-bwn button{font-size:15px;font-weight:700;color:#fff;padding:13px 0;background:#f36;display:inline-block;width:100%;outline:none;border:2px solid #f36;cursor:pointer;text-transform:uppercase}.log-bwn button:hover{transition:all .3s ease;-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-o-transition:all .3s ease;border:2px solid #fff}p.copy{color:#fff;font-size:1em;text-align:center;margin-top:6em}p.copy a{color:#fff;text-decoration:underline}p.copy a:hover{text-decoration:none}@media (max-width:1024px){p.copy{margin-top:3.5em}.login-form{padding:60px 0 40px}}@media (max-width:768px){body{min-height:929px;min-height:auto}}@media (max-width:600px){.login-top{width:425px}.login-ic input[type="text"],.login-ic input[type="password"]{width:79%}}@media (max-width:480px){p.copy{font-size:.9em;padding:0 .5em;line-height:1.8em}}@media (max-width:450px){.login-top{width:360px}.login-ic input[type="text"],.login-ic input[type="password"]{width:76%}.top-login{width:90px;height:90px;margin:0 auto 3em}.top-login span img{margin:5px 0 0 5px}.top-login span{width:75px;height:75px;top:5px;left:5px}.login-form h1{margin-bottom:1em;font-size:1.7em}p.copy{margin-top:3em}.login-form{padding:80px 0 45px}.login-ic{margin-bottom:1em;padding:3px}.log-bwn button{padding:10px 0}p.copy{font-size:.8em}body{min-height:672px}}@media (max-width:384px){.login-top{width:340px}.login-ic input[type="text"],.login-ic input[type="password"]{width:75%}body{min-height:600px}}@media(max-width:320px){.login-top{width:280px}.login-ic input[type="text"],.login-ic input[type="password"]{width:70%}.login-form{padding:50px 0 45px}body{min-height:540px}}
            input::placeholder {
              color: white;
            }
            .alert {
              padding: 20px;
              background-color: #f44336;
              color: white;
            }
            .basarili {
              padding: 20px;
              background-color: #6ABC6E;
              color: white;
            }

            .closebtn {
              margin-left: 15px;
              color: white;
              font-weight: bold;
              float: right;
              font-size: 22px;
              line-height: 20px;
              cursor: pointer;
              transition: 0.3s;
            }

            .closebtn:hover {
              color: black;
            }</style>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
            
          </head> <body>
            <div class="login-form">
              <div class="top-login">
                <span><img src="group.png" alt=""/></span>
              </div>
              <h1>YK Yazılım - CMS</h1>

              <div class="login-top">
               <div id="bilgi"></div>
               <form action="" method="POST" id="girisform">
                <div class="login-ic">
                  <i ></i>
                  <input type="text"  name="k_adi" placeholder="Kullanıcı Adı"/>
                  <div class="clear"> </div>
                </div>
                <div class="login-ic">
                  <i class="icon"></i>
                  <input type="password" name="password" placeholder="Şifre" />
                  <div class="clear"> </div>
                </div>
                <input type="hidden" name="giris" value="giriş">
                <div class="log-bwn">
                  <button type="submit">Giriş Yap!</button>
               
                </div>
              </form>

              <div id="ajaxloaderr" style="display:none"><img class="center-block" src="../../loader.gif" alt="loader" ></div>
            </div>

            <p class="copy">© 2019 | <a href="https://ykyazilim.net">YK Yazılım</a> | Design by  <a href="https://yusufkarakaya.com.tr" target="_blank">Y.Karakaya</a></p>
          </div>
        </body>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
        <script type="text/javascript">

          $("#girisform").on("submit",function(e){
            e.preventDefault();

            $('#girisform').hide();
            $('#ajaxloaderr').show();
            $.ajax( {
              type: "post",
              url: "giris.php",
              data:$('#girisform').serialize(),
              success: function(cevap) {
                $('#ajaxloaderr').hide(300);
                $('#girisform').show(300);
                $('#bilgi').show();
                if(cevap.trim()=='başarılı'){

                  $('#bilgi').html('<div class="basarili"> <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>Başarılı!</strong> İşlem Başarılı Yönlendiriliyorsun. </div><br><meta http-equiv="refresh" content="3;URL=index.php">');
                } 
             
            else if(cevap.trim()=='yetki'){

              $('#bilgi').html('<div class="alert"> <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>Başarısız!</strong> Yetkiniz Yetersiz </div><br>');
            }
            else {

              $('#bilgi').html('<div class="alert"> <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> <strong>Başarısız!</strong> İşlem Başarısız, Bilgileri Kontrol Ediniz. </div><br>');
            } } });
          })

        </script>
        </html>