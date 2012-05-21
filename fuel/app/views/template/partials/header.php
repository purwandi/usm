<!-- Navbar
================================================== -->
<?php if (Auth::is_secure()):?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <?php echo Html::anchor('','USM Fakultas', array('class'=>'brand'));?>
      <div class="nav-collapse">
        <ul class="nav">

          <li><?php echo Html::anchor('dashboard','Dashboard');?></li>

<?php if (Auth::data('group_id') == '1'):?>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Member <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?php echo Html::anchor('member/index/administrator','Administrator');?></li>
              <li><?php echo Html::anchor('member/index/tata-usaha','Tata Usaha');?></li>
              <li><?php echo Html::anchor('member/index/dosen','Dosen');?></li>
              <li><?php echo Html::anchor('member/index/mahasiswa','Mahasiswa');?></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Master Data <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><?php echo Html::anchor('topic','Topic');?></li>
              <li><?php echo Html::anchor('education','Levels of education');?></li>
              <li><?php echo Html::anchor('question','Question');?></li>
            </ul>
          </li>
<?php elseif (Auth::data('group_id') == '2'):?>

<?php elseif (Auth::data('group_id') == '3'):?>
<?php elseif (Auth::data('group_id') == '4'):?>
            <li><?php echo Html::anchor('caba/mulai','Mulai Ujian');?></li>
            <li><?php echo Html::anchor('caba/hasil','Hasil Ujian');?></li>
<?php else:?>
<?php endif;?>
          <li><?php echo Html::anchor('caba/logout','Log Out');?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php endif;?>