<!-- Navbar
================================================== -->
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
          <li><a href="http://roms-oceania.pagodabox.com/applicant">Applicant</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>  