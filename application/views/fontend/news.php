<div>
    <h2 class="btm20"><?php echo HTML::image("media/fontend/images/img/tit-list-news.jpg")?></h2>
   <?php $news;?>
    <h3><?php echo $news->title;?></h3><br/>
    <p><?php echo $news->content;?></p>
</div>
<?php
$newsOb = ORM::factory('news')->order_by("create_at","desc")->find_all();
?>
<br/>
<div class="list-news">
        <ul>
            <?php foreach($newsOb as $ob): ?>
            <li><?php echo HTML::anchor("news/list/".$ob->id, $ob->title."&nbsp;")?>
                &nbsp;(&nbsp;<?php echo date("Y年m月d日 ",strtotime($ob->create_at));?>&nbsp;)
                <!--在タイ日本大使館在タイ日本大使館在タイ日本大使館在タイ日本大使館在タイ日本大使館在タイ日本大使館--></li>
            <?php endforeach;?>
          
        </ul>
      </div>