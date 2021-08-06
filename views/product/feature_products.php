<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use app\models\Product;
?>

<div class="tz-2 tz-2-admin">
          <div class="tz-2-com tz-2-main">
            <h4>Choose brands for your Shop</h4> <a class="dropdown-button drop-down-meta drop-down-meta-inn" href="#" data-activates="dr-list"><i class="material-icons">more_vert</i></a>
            <ul id="dr-list" class="dropdown-content">
              <li><a href="<?=url::to(['shop/create'])?>">Add New</a> </li>
            
              <li class="divider"></li>
              
              <li><a href="<?=url::to(['shop/index'])?>"><i class="material-icons">subject</i>View All</a> </li>
              
            </ul>
            <!-- Dropdown Structure -->
            <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp ad-inn-page">
                  <div class="tab-inn ad-tab-inn">
            <div class="hom-cre-acc-left hom-cre-acc-right">
<div class="shop-index">
<?php Pjax::begin(['id'=>'reviews']); ?>   
<table class="table table-hover">
    <thead>
  
    <tr style="
    background: #253d52;
    color: white;
">
<style type="text/css">
  th , td{
    text-align: center;
  }
</style>

        <th style="color:white;">Product Name</th>
        <th style="color:white;">Brand Name</th>
        <th style="color:white;">Status</th>
        <th style="color:white;">Action</th>
      </tr>
    </thead>
    <tbody style="    border: solid 1px #44444447;">
      <?php 
      if (isset($model) && $model!=null) {
        foreach ($model as $product) {
           $bname= app\models\Brand::find()->select(['name'])->where(['id'=>$product->brand_id])->one();
      
      ?>
      <tr>
        <td><?=$product->name?></td>
		
		
        <td>
		<?php if(isset($bname->name))
		    {
				echo $bname->name;
		  }else{
           echo "Not Set";

		} ?>
		</td>
        <td><?php 
        if ($product->status==1) {
          ?>
          <label class=" label label-success" >Featured</label>
        <?php }else{ ?>
          <label class=" label label-danger" > Not Featured</label>
        <?php } ?>
        </td>
        <td><button class="btn btn-success accept" value="<?=$product->id?>" >Feature</button> <button class="btn btn-danger reject" value="<?=$product->id?>" >Reject</button></td>
      </tr>
    <?php } } ?>
      </tbody>
  </table>
  
<?php Pjax::end(); ?>
  
   
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="/js1/jquery-2.2.4.min.js"></script>
<script>
  $(".accept").on('click', function(){
    if (confirm("Do you want to feature this product!")) {
      var pid=this.value;
    $.post("accept?pid="+pid, function(res){
      var response = $.parseJSON(res);
        if(response.status == 'success'){
          //$.pjax.reload({container:"#reviews"});
          location.reload();
        }
    });
}
    
  });
  $(".reject").on('click', function(){
    if (confirm("Do you want to un-feature this product!")) {
      var pid=this.value;
    $.post("reject?pid="+pid, function(res){
      var response = $.parseJSON(res);
        if(response.status == 'success'){
          //$.pjax.reload({container:"#reviews"});
          location.reload();
        }
    });
}
    
  });
</script>
