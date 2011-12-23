
<h2><?php echo HTML::image("media/fontend/images/img/tit-06.jpg")?></h2>
    <div class="cordinator">
    <a href="<?php echo URL::site("cordinator");?>">
        <div class="pic"><?php echo HTML::image("media/fontend/images/img/img-sample02.jpg")?></div>
      <div class="detail"><span>氏名：</span>小堤一郎（おずつみいちろう）<br />
        <span>経歴：</span>タイで翻訳・ビジネスコンサルの会社を20年経営<br />
		<span>紹介：</span>適当なアドバイザーが見つからなかったり、なかなか回答が来ないときはコーディネーターまでお問合せ下さい。</div>
        </a>
    </div>
     <h2><?php echo HTML::image("media/fontend/images/img/tit-04.jpg")?></h2>
  <div class="list-regis">
      <p>
              <?php foreach($businessType as $cate):?>
    <span><a href="<?php echo URL::site("companylist/list/".$cate);?>">          
    <?php echo $cate->name; ?>(<?php echo $cate->companie->find_all()->count();?>)&nbsp;&nbsp;
    </a></span>
              <?php endforeach;?>
              <!--会社設立（11）、仕入れサポート（11）、法律（11）、会計（11）、人材紹介（11）、不動産（11）、市場調査（11）、コンピュータ（11）、翻訳・通訳（11）、デザイン・印刷（11）、エアチケット（11）、通関・運送（11）、工場・プラント設計（11）、レンタルオフィス（11）、国際電話サービス（11）、リース（11）、レンタカー（11）--></p>
  </div>
  <h2><?php echo HTML::image("media/fontend/images/img/tit-05.jpg")?></h2>
  <div class="list-regis2">
  <a href="<?php echo URL::site("companyprofile/company/".$newCompany);?>">
    <p><span class="pic">
            <?php if($newCompany->logo):?>
                <?php echo HTML::image("upload/company/".$newCompany->logo,array("width"=>"80","height"=>"80"))?>
            <?php else:?>
                <?php echo HTML::image("media/fontend/images/img/img80x80.jpg")?>
            <?php endif;?>
           
        </span><em>業種：</em><?php echo $newCompany->businesstype->name?><!--翻訳・通訳--><br />
<em>会社名：</em><?php echo $newCompany->name?><br />
<em>業務内容：</em><?php echo $newCompany->msg ;?><!--あらゆるジャンルの翻訳、通訳をします。リーズナブル格で質の高いサービスを！--></p>
</a>
  </div>
  <div class="btm10"><a href="<?php echo URL::site("apcompany");?>"><?php echo HTML::image("media/fontend/images/img/banner-right.jpg")?></a></div>
  <div class="btm10">
      <a href="#">
          <?php $ad = ORM::factory("ad",5);?>
          <?php if($ad->picture AND $ad->status):?>
                <a href="<?php echo $ad->link; ?>">
                <?php echo HTML::image("upload/ad/".$ad->picture,array("width"=>$ad->width,"height"=>$ad->height));?>
                </a>
          <?php else:?>
                <?php echo HTML::image("media/fontend/images/img/banner300x40.jpg")?>
          <?php endif;?>
          
      </a></div>
     <h2><?php echo HTML::image("media/fontend/images/img/tit-07.jpg")?></h2>
  <div class="cordinator2">
      &nbsp;&nbsp;<b><?php echo $webcontent->title; ?></b>
      <br />
      <?php echo $webcontent->content; ?>
   <!-- <p>中古オフィス家具販売<br />
日本製の新品のオフィス用品は高すぎるし、かといってタイの製品は耐久性に問題があったり、デザインがイマイチ。 それならば中古品でも日本製がいいと思うのは私一人ではないはずです。でもなぜか今までタイにはなかった商売です。今年の４月にバンコク郊外にオープンしたので、レポートしてきました。</p>-->
  </div>
  <div><a href="<?php echo URL::site("apadvisor");?>"><?php echo HTML::image("media/fontend/images/img/banner-right2.jpg")?></a></div>
