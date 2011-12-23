  <h2><?php echo HTML::image("media/fontend/images/img/tit-listtop.jpg")?></h2>
  <!--<ul class="listtop">
      <?php $i=1;?>
      <?php foreach($businessType as $bt):?>
      <li class="twoline <?php if($i++%5==0){echo "last";}?>"><a href="<?php echo URL::site("companylist/list/".$bt->id);?>"><?php echo $bt->name ;?></a></li>
  <li class="twoline"><a href="#">会社設立<br />
ビザ・会計</a></li>
  <li><a href="#">法律事務所</a></li>
  <li class="twoline"><a href="#">仕入れサポート<br />
業務代行</a></li>
  <li><a href="#">翻訳・通訳</a></li>
  <li class="last"><a href="#">人材紹介</a></li>
   <li><a href="#">不動産</a></li>
  <li><a href="#">コンピュータ</a></li>
  <li><a href="#">広告・デザイン</a></li>
  <li><a href="#">印刷</a></li>
  <li class="last twoline"><a href="#">市場調査<br />
マーケティング</a></li>
   <li><a href="#">エアチケット</a></li>
  <li><a href="#">レンタカー</a></li>
  <li class="twoline"><a href="#">レンタルオ<br />フィス</a></li>
  <li class="twoline"><a href="#">工場・プラン<br />ト設計</a></li>
  <li class="last"><a href="#">リース</a></li>
   <li><a href="#">イベント・企画</a></li>
  <li><a href="#">運送・通関</a></li>
  <li><a href="#">ウェブ制作</a></li>
  <li><a href="#">オフィス内装</a></li>
  <li class="last"><a href="#">その他</a></li>
 
  <?php endforeach;?>
  </ul>-->
  <?php  $id = Request::current()->param('id');?>
  <ul class="listtop2">
   <li>
       
       <a href="<?php echo URL::site("companylist/list/2");?>">
<?php if($id == 2){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist01_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/4");?>">
           <?php if($id == 4){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist02_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/3");?>">
           <?php if($id == 3){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist03_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/1");?>">
           <?php if($id == 1){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist04_".$spic.".jpg")?>
       </a>
   </li>
   <li class="last">
       <a href="<?php echo URL::site("companylist/list/6");?>">
           <?php if($id == 6){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist05_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/7");?>">
           <?php if($id == 7){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist06_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/9");?>">
           <?php if($id == 9){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist07_".$spic.".jpg")?>
       </a>
   </li> 
   <li>
       <a href="<?php echo URL::site("companylist/list/10");?>">
           <?php if($id == 10){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist08_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/11");?>">
           <?php if($id == 11){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist09_".$spic.".jpg")?>
       </a>
   </li>
   <li class="last">
       <a href="<?php echo URL::site("companylist/list/8");?>">
           <?php if($id == 8){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist10_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/12");?>">
           <?php if($id == 12){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist11_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/13");?>">
           <?php if($id == 13){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist12_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/14");?>">
           <?php if($id == 14){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist13_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/15");?>">
           <?php if($id == 15){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist14_".$spic.".jpg")?>
       </a>
   </li>
   <li class="last">
       <a href="<?php echo URL::site("companylist/list/16");?>">
           <?php if($id == 16){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist15_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/5");?>">
           <?php if($id == 5){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist16_".$spic.".jpg")?>
       </a>
   </li>
   <li>
       <a href="<?php echo URL::site("companylist/list/17");?>">
           <?php if($id == 17){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist17_".$spic.".jpg")?>
       </a>
   </li> 
   <li>
       <a href="<?php echo URL::site("companylist/list/18");?>">
           <?php if($id == 18){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist18_".$spic.".jpg")?>
       </a></li>
   <li>
       <a href="<?php echo URL::site("companylist/list/19");?>">
           <?php if($id == 19){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist19_".$spic.".jpg")?>
       </a>
   </li>
   <li class="last">
       <a href="<?php echo URL::site("companylist/list/20");?>">
           <?php if($id == 20){$spic="son";}else{$spic="off";}?>
<?php echo HTML::image("media/fontend/images/button/btn-comlist20_".$spic.".jpg")?>
       </a>
   </li>
   </ul>
  
  <?php foreach($companies as $cs):?>
  <div class="list-corp">
  <div class="pic">
    <?php if($cs->logo):?>
      <?php echo HTML::image("upload/company/".$cs->logo,array("width"=>"110","height"=>"110"))?>
    <?php else:?>
      <?php echo HTML::image("media/images/no_image.jpg",array("width"=>"110","height"=>"110"))?>
    <?php endif;?>
  </div>
  <table width="490" border="0" cellspacing="0" cellpadding="0">
      
  <tr>
    <th width="115">会社名：</th>
    <td width="280"><?php echo $cs->name?></td>
    <td rowspan="4"><a href="<?php echo URL::site("companyprofile/company/".$cs->id); ?>">
    
    <?php echo HTML::image("media/fontend/images/button/btn-list.jpg")?></a></td>
  </tr>
   <tr>
    <th>代表者：</th>
    <td><?php echo $cs->director_name;?> </td>
  </tr>
  <tr>
    <th>設　立：</th>
    <?php $es =  explode("-",$cs->establish);?>
    <td>
    <?php 
    if(@$es[0]){
        echo @$es[0]."年";
    }
    if(@$es[1]){
       echo @$es[1]."月"; 
    }
    ?></td>
  </tr>
  
  <tr>
    <th>業務内容：</th>
    <td><?php echo $cs->msg;?></td>
  </tr>
</table>
  </div>
  <?php endforeach;?>
 
  
  
  