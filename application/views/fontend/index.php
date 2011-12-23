<style type="text/css">
.gtext{color:black;}    
.advisor-list a:link {text-decoration: none;color:black;}
.advisor-list a:visited {text-decoration: none}
.advisor-list a:active {text-decoration: none}
.advisor-list a:hover {text-decoration: none;}
</style>
<div id="example8Content" style=" display:none;"> 
<p>サイトの目的<br />
本サイトはタイのビジネス情報のマッチングの場として提供するものです。<br /><br />

すなわちタイに来たばかりの人やこれから会社や工場を設立したり取引先を探したりしている人達が、必要とする情報を尋ねたり、あるいはサービスを提供してくれる会社を探したりするため、現地の事情に精通したアドバイザーや信用のおける会社を紹介するものです。<br /><br />

皆様のご質問に正確かつスピーディーに答えるため本サイトはアドバイザー制をとっております。アドバイザーは一般募集もしていますので、タイに詳しく何らかの専門知識や経験をお持ちの方は是非ご応募して、ご自分のキャリアを生かしてください。<br /><br />

質問される方は各分野のアドバイザーを選んでお聞きください。誠意をもってなるべく早くお答えするように努めてまいります。特殊な内容や個別事項の質問、あるいは調査依頼は有償になる場合もありますが、あらかじめアドバイザーから料金をお知らせしますので双方納得の上すすめていただければと思います。<br /><br />

また掲載会社からサービスの提供を受けたい方は、掲載会社一覧の中からお見積もりを取ったり、お問い合わせをしてください。ここに掲載している会社は、実績のある対応のしっかりした会社です。タイには残念ながらいい加減な会社も数多くあり、トラブルの話が絶えません。はじめてタイに来られて不愉快な思いをすることないように対応のしっかりした会社のみを掲載していく予定です。<br /><br />

どうぞこのサイトを皆様がタイでビジネスを始める第一歩の有効なビジネスツールとしてお役に立てられますようにお祈りしております。<br /><br />

サイト事務局</p>
</div>
<?php echo HTML::image("media/fontend/images/img/banner-top.jpg",array("usemap"=>"#Map"))?> 
    <div id="popup"><map name="Map" id="Map">
      <area shape="rect" coords="342,99,468,115" href="#" alt="" />
    </map>
    </div>
<h2 class="m10"><?php echo HTML::image("media/fontend/images/img/tit-01.jpg")?> </h2>
<?php $i = 0 ;?>
    <?php foreach($advisorList as $al):?>

<div class="block1 gg <?php if($i++ % 2 == 0){echo "r10";}?>">
     <a href="<?php echo URL::site("advisorprofile/advisor/".$al->id);?>">
      <h3><?php echo $al->category->name;?></h3>
      <span class="advisor-list">
       
            <div class="pic"><?php echo HTML::image("upload/advisor/".$al->picture,array("width"=>"75"))?></div>
            <div class="detail"><span>氏名：</span><span color="#000000" class="gtext"><?php echo $al->name?></span><br />
                <span>所属：</span><span class="gtext"><?php echo $al->affliation?></span><br />
            <span>紹介：</span><span class="gtext"><?php echo Text::limit_chars($al->introduce,45);?></span>
            </div>
     
      </span> </a>
</div>

    <?php endforeach;?>

    <!--<div class="block1 r10">
         
      <h3>翻訳・通訳</h3>
      <div class="pic"><?php echo HTML::image("media/fontend/images/img/img-sample01.jpg")?></div>
      <div class="detail"><span>氏名：</span>小堤一郎（おずつみいちろう）<br />
        <span>所属：</span>Ohmi Corporation Co.,Ltd.<br />
        <span>経歴：</span>東京工業大学化学工学卒。日揮（株）原子力事業本部。タイで翻訳、通訳会社経営。1994年タイ商務省からビジネスマ</div>
    </div>-->
    
    <div class="btn-center"><a href="<?php echo URL::site("advisorlist")?>"><?php echo HTML::image("media/fontend/images/button/btn-01.jpg")?></a></div>
    <div class="clear"></div>
    <div class="col-left">
      <h2><?php echo HTML::image("media/fontend/images/img/tit-02.jpg")?></h2>
      <div class="link">
        <ul>
          <li><a href="http://www.th.emb-japan.go.jp/" target="_blank">在タイ日本大使館</a></li>
          <li><a href="http://www.jetro.go.jp/indexj.html" target="_blank">ジェトロ（日本貿易振興機構）</a></li>
          <li><a href="http://www.jat.or.th/" target="_blank">タイ国日本人会</a></li>
          <li><a href="http://www.thaiembassy.jp/rte1/" target="_blank">在日タイ大使館</a></li>
          <li><a href="http://www.hellothai.com/" target="_blank">ハロータイランド</a></li>
          <li><a href="http://ja.exchange-rates.org/currentRates/P/THB" target="_blank">タイ バーツ の為替レート</a></li>

        </ul>
      </div>
      <div class="exchange">
        <!--<iframe frameborder="0" scrolling="no" width="178" height="165" src="http://www.bangkokbank.com/fxbanner/banner1.htm"></iframe>-->
      </div>
       <div>
   <!-My calendar widget - HTML code - mycalendar.org --><div align="center" style="margin:15px 0px 0px 0px"><noscript><div align="center" style="width:140px;border:1px solid #ccc;background:#fff ;color: #fff ;font-weight:bold;"><a style="font-size:12px;text-decoration:none;color:#000 ;" href="http://mycalendar.org/Holiday/Thailand/">Thailand Calendar</a></div></noscript><script type="text/javascript" src="http://mycalendar.org/calendar.php?group=Holiday&calendar=Thailand&widget_number=2&cp3_Hex=8F228f&cp2_Hex=FFFFF3&cp1_Hex=090909&fwdt=200&lab=1"></script></div><!-end of code-->
    </div>
    </div>
    <div class="col-right">
      <h2><?php echo HTML::image("media/fontend/images/img/tit-03.jpg")?></h2>
      <div class="introduced">
        <ul>
            <?php foreach($news as $ob): ?>
            <li><?php echo HTML::anchor("news/list/".$ob->id, $ob->title."&nbsp;")?>
                &nbsp;(&nbsp;<?php echo date("Y年m月d日",strtotime($ob->create_at));?>&nbsp;)&nbsp;
                <!--在タイ日本大使館在タイ日本大使館在タイ日本大使館在タイ日本大使館在タイ日本大使館在タイ日本大使館--></li>
            <?php endforeach;?>
          
        </ul>
      </div>
      <?php $ad = ORM::factory("ad",2);?>
      <?php if($ad->picture AND $ad->status):?>
      <a target="_blank" href="<?php echo $ad->link;?>">
        <?php echo HTML::image("upload/ad/".$ad->picture,array("width"=>$ad->width,"height"=>$ad->height))?>
      </a>
      <?php else:?>
        <?php echo HTML::image("media/fontend/images/img/banner-410x50.gif",array("class"=>"btm10"))?>
      <?php endif;?>
     
      <ul class="banner">
        <li class="r10">
      <?php $ad = ORM::factory("ad",3);?>
      <?php if($ad->picture AND $ad->status):?>
        <a target="_blank" href="<?php echo $ad->link;?>">
            <?php echo HTML::image("upload/ad/".$ad->picture,array("width"=>$ad->width,"height"=>$ad->height))?>
        </a>
      <?php else:?>
        <?php echo HTML::image("media/fontend/images/img/banner200x40.gif",array("class"=>"btm10"))?>
      <?php endif;?>
      
        </li>
        <li>
      <?php $ad = ORM::factory("ad",4);?>
      <?php if($ad->picture AND $ad->status):?>
         <a target="_blank" href="<?php echo $ad->link;?>">   
        <?php echo HTML::image("upload/ad/".$ad->picture,array("width"=>$ad->width,"height"=>$ad->height))?>
         </a>
      <?php else:?>
        <?php echo HTML::image("media/fontend/images/img/banner200x40.gif",array("class"=>"btm10"))?>
      <?php endif;?>      
      
        
        </li>
      </ul>
    </div>
<script type="text/javascript"> 
$('#Map').click(function(){ 
    //alert('ddd');
    $.openDOMWindow({ 
        loader:1, 
        loaderImagePath:'animationProcessing.gif', 
        loaderHeight:16, 
        loaderWidth:17, 
        windowSourceID:'#example8Content' 
    }); 
    return false; 
}); 
</script>

 