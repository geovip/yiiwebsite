<div id="slider">
    <h2>Add Photo</h2>
  </div>
  <div class="clr"></div>
<div class="body">
    <div class="body_resize">
      <div class="right">
        
      <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
      </div>
      <div class="left">
        <h2>Contact Details</h2>
        <div class="clr"></div>
        <p>Address:<br />
          901 12th Avenue, P.O. Box 222000<br />
          Seattle, WA 98122-1090</p>
        <div class="bg"></div>
        <p>Telephone: +1 959 603 6035<br />
          FAX: +1 504 889 9898<br />
          E-mail: mail@companyname.com<br />
          Website: www.yoursitename.com</p>
        <div class="bg"></div>
        <p>Quisque malesuada luctus dignissim bibendum a lobortis mauris placerat.</p>
        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. <br />
          Nulla consequat massa quis enim.</p>
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/r_bg.gif" alt="picture" width="293" height="8" class="floated" /></div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
