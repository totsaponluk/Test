<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>タイ・ビジネス　ナビゲーター</title>
<?php echo HTML::style("media/fontend/css/base.css",array("media"=>"all"))?>
<?php echo HTML::style("media/fontend/css/style.css")?>
<?php echo HTML::script("media/js/js.js");?>
<?php echo HTML::script("media/js/jquery-1.6.1.js");?>
<?php echo HTML::script("media/fontend/js/tinybox.js")?>
<?php echo HTML::script("media/js/jquery.DOMWindow.js")?>
<?php echo HTML::script("media/js/jquery.validate.js")?>
<?php echo HTML::script("media/js/jquery.metadata.js")?>
<!--
<script src="../lib/jquery.js" type="text/javascript"></script> 
<script src="../lib/jquery.metadata.js" type="text/javascript"></script> 
<script src="../jquery.validate.js" type="text/javascript"></script> 
 -->
 <?php echo HTML::script("media/js/cmxforms.js")?>

<script type="text/javascript">
$(function(){
    $('.bt-submit').live('click',function(){
        
        $('#form').submit();
        return false;
    })
})
</script>
</head>
<body>
<div id="mainHeader">
  <div id="nav-top">
     
    <h1>タイ在住の日本人アドバイザーがあなたの質問にお答えします。</h1>
    <ul>
      <li><a class="ap-advsr" href="<?php echo URL::site("apadvisor");?>"></a></li>
      <li><a class="ap-company" href="<?php echo URL::site("apcompany");?>"></a></li>
      <li><a class="advertising" href="<?php echo URL::site("advertising");?>"></a></li>
      <li><a class="policy" href="<?php echo URL::site("policy");?>"></a></li>
      <li><a class="jimukyoku" href="<?php echo URL::site("jimukyoku");?>"></a></li>
    </ul>
  </div>
  <div id="header">
    <div class="header-left">
        <div class="logo"> <a href="<?php echo URL::site("");?>"><?php echo HTML::image("media/fontend/images/logo.jpg")?></a> </div>
<?php
$query = DB::query(Database::SELECT, 'SELECT MAX(m.update_at) AS max_result FROM
(
SELECT MAX(update_at) as update_at
FROM advisors
UNION 
SELECT MAX(update_at)
FROM companies
UNION 
SELECT MAX(update_at)
FROM news
)
 AS m');
$max=$query->execute();
$max=$max->get('max_result');

/*foreach($max as $key=>$val){
    print $key."=>".$val;
    foreach($val as $k=>$v){
        print $val."=>".$v;
    }
}*/
//print_r($max['create_at']);
?>
      <p class="update"><?php echo date("Y年m月d日更新！",strtotime($max));?><!--2011年5月20日更新！--></p>
    </div>
      <?php
      $ad = ORM::factory("ad",1);
      ?>
    <div class="banner"> 
        <?php if($ad->picture AND $ad->status):?>
            <a href="<?php echo $ad->link;?>" target="_blank"><?php echo HTML::image("upload/ad/".$ad->picture,array("width"=>$ad->width,"height"=>$ad->height))?></a>
        <?php else:?>
            <?php echo HTML::image("media/fontend/images/img/banner592x85.gif")?>
        <?php endif;?>
    </div>
  </div>
</div>
<div id="nav">
  <ul>
    <li><a class="home" href="<?php echo URL::site("");?>"><span>home</span></a></li>
    <li><a class="consult" href="<?php echo URL::site("advisorlist");?>"><span>アドバイザーに相談する</span></a></li>
    <li><a class="listcompany" href="<?php echo URL::site("companylist");?>"><span>登録企業リストを見る</span></a></li>
    <li><a class="information" href="<?php echo URL::site("cordinator");?>"><span>コーディネーター紹介</span></a></li>
    <li><a class="businessinfo" href="../../../../uniquebusiness/uniquebusiness.html"><span>ユニークビジネス紹介</span></a></li>
    <li><a class="feedback" href="<?php echo URL::site("contact");?>"><span>ご意見・改善提案</span></a></li>
  </ul>
</div>
<div id="mainContent">
    <ul class="pr">
    <script type="text/javascript"><!--
google_ad_client = "ca-pub-4488541756243234";
/* メニュー下 */
google_ad_slot = "9885199531";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
  </ul>
    <div id="sidebarLeft">
  <?php echo $sidebarLeft?>
    </div>
    <div id="sidebarRight">
    <?php echo $sidebarRight?>
    </div>
  
</div><!--main content-->
</div>
<div id="footer">
  <div class="footer-menu">
    <ul>
      <li><a href="<?php echo URL::site("");?>">トップ</a></li>
      <li><a href="<?php echo URL::site("advisorlist");?>">アドバイザーに相談する</a></li>
      <li><a href="<?php echo URL::site("companylist");?>">登録企業リストを見る</a></li>
      <li><a href="<?php echo URL::site("cordinator");?>">コーディネーター紹介</a></li>
      <li><a href="../../../../uniquebusiness/uniquebusiness.html">ユニークビジネス紹介</a></li>
      <li><a href="<?php echo URL::site("contact");?>">ご意見・改善提案</a></li>
      <li><a href="<?php echo URL::site("apadvisor");?>">アドバイザー募集</a></li>
      <li><a href="<?php echo URL::site("apcompany");?>">企業リスト登録</a></li>
      <li class="last"><a href="<?php echo URL::site("advertising");?>">広告に関して</a></li>
      <li><a href="<?php echo URL::site("policy");?>">サイトポリシー</a></li>
      <li class="last"><a href="<?php echo URL::site("jimukyoku");?>">運営事務局</a></li>
      <!--<li class="last"><a href="<?php echo URL::site("");?>">お問い合せ</a></li>-->
    </ul>
  </div>
  <p>Copyright(c) タイ・ビジネス・ナビゲーター  All Rights Reserved.</p>
</div>
<script type="text/javascript">
    $("#Map").click(function(){
        //alert("test");
    })
	//T$('popup').onclick = function(){TINY.box.show('purpose',1,300,150,1)}
</script>

</body>
</html>
