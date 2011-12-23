  
  <div class="advisorall">
  <h2><?php echo HTML::image("media/fontend/images/img/tit-advisorall.jpg")?></h2>
  <p>アドバイザーへの質問もしくは調査依頼は、その内容とできるだけ合っている専門の方を選んでください。もし該当するアドバイザーが見つからなかったり、わからない場合はコーディネーターへお問合せください。</p>
<p>なおご質問にはなるべく早く答えるようにしますが、皆様それぞれ正業を持っているので時間がかかる場合もあります。そんなときもコーディネーターにご連絡ください。<br>
なお質問によって調査を要する場合もありますが、そのときは調査費という形でお見積もりをお出しする場合もあります。質問する方も受ける方もマナーを持ってこのサイトを利用されるようにお願いします。</p>

 <table class="list-advisor" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th width="124">専門</th>
    <th width="92">氏名</th>
     <th width="63">&nbsp;</th>
      <th width="280">紹介</th>
      <th width="73">&nbsp;</th>
  </tr>
<?php $i=0;?>
<?php $count=count($advisors);?>
<?php foreach($advisors as $ad):?>
<?php $i++;?>
  <tr>
    <td class="<?php if($count == $i){echo "center last";}else{echo "center";}?>"><?php echo $ad->category->name;?><!--翻訳、通訳--></td>
    <td class="<?php if($count == $i){echo "last";}else{echo "";}?>"><?php echo $ad->name;?><!--小堤　一郎--></td>
    <td class="<?php if($count == $i){echo "last";}else{echo "center";}?>">
    <?php if($ad->picture):?>
      <?php echo HTML::image("upload/advisor/".$ad->picture,array("width"=>"50"))?>
    <?php else:?>
      <?php echo HTML::image("media/images/no_image.jpg",array("width"=>"50"))?>
    <?php endif;?>
    
    
    </td>
    <td class="<?php if($count == $i){echo "last";}else{echo "";}?>"><?php echo $ad->introduce?><!--東京工業大学化学工学卒。日揮（株）原子力事業本部。タイで翻訳、通訳会社経営。1994年タイ商務省からビジネスマンオブザイヤー受賞。--></td>
    <td class="<?php if($count == $i){echo "center last";}else{echo "center";}?>"><?php echo HTML::anchor("advisorprofile/advisor/".$ad->id,"詳　細");?></td>
  </tr>
<?php endforeach;?>
  <!--<tr>
  <td>翻訳、通訳</td>
    <td>小堤　一郎</td>
    <td class="center"><?php echo HTML::image("media/fontend/images/img/img-sample05.jpg")?></td>
    <td>東京工業大学化学工学卒。日揮（株）原子力事業本部。タイで翻訳、通訳会社経営。1994年タイ商務省からビジネスマンオブザイヤー受賞。</td>
    <td class="center"><?php echo HTML::anchor("advisorprofile","詳　細");?></td>
  </tr>-->
   <!-- <tr>
        <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
  </tr>
      <tr>
        <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
        <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
  </tr>
      <tr>
        <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
   <tr>
        <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
  </tr>
      <tr>
        <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
      <tr>
        <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
    <td class="grey"></td>
  </tr>
<tr>
<td class="last"></td>    
    <td class="last"></td>    
    <td class="last"></td>
    <td class="last"></td>
    <td class="last"></td>
  </tr>-->
</table>

  
 </div>
 