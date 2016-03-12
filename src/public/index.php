<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Off Canvas Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">
  </head>

  <body>
    <!-- Cette partie va générer dynamiquement notre menu à partir des entrées du fichier data.php-->
    <?php
      ob_start();
      require_once('data.php');
      if(isset($menuEntry) && !empty($menuEntry)){
        $html = '<nav class="navbar navbar-fixed-top navbar-inverse">
                    <div class="container">';
        foreach ($menuEntry as $keyMenu => $valueMenu) {
          if ($valueMenu == 3) {
            $html .= '<div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">';
            $html .= $keyMenu.'</a></div>';
          }else if($valueMenu == 2){
            $html .= '<div id="navbar" class="collapse navbar-collapse"><ul class="nav navbar-nav">';
            $html .= '<li class="active"><a href="#">'.$keyMenu.'</a></li>';
          }else if($valueMenu == 1){
            $html .= '<li><a href="#">'.$keyMenu.'</a></li>';
          }
        }
        $html .= '</ul></div></div></nav>';
      }
      echo $html;
      $str = ob_get_contents();
      ob_end_clean();
    ?>

    <!-- Cette partie va générer dynamiquement notre jumbotron à partir des entrées du fichier data.php-->
    <?php
      ob_start();
      require_once('data.php');
      if(isset($section1) && !empty($section1)){
        $html = '<div class="container">
                  <div class="row row-offcanvas row-offcanvas-right">
                    <div class="col-xs-12 col-sm-9">
                      <p class="pull-right visible-xs">
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                      </p>
                      <div class="jumbotron">';
        foreach ($section1 as $s1Key => $s1Value) {
          if ($s1Value == 2) {
            $html .= '<h1>'.$s1Key.'</h1>';
          }else if ($s1Value == 1){
            $html .= '<p>'.$s1Key.'</p>';
          }
        }
        $html .= '</div>';
      }
      echo $html;
      $jumbo = ob_get_contents();
      ob_end_clean();
    ?>

    <!-- Cette partie va générer dynamiquement notre panel à partir des entrées du fichier data.php-->
    <?php
      ob_start();
      require_once('data.php');
      if(isset($section2) && !empty($section2)){
        $html = '<div class="bs-example data-example-id=table-within-panel"> 
                    <div class="panel panel-default"> ';
        foreach ($section2 as $s2Key => $s2Value) {
          if ($s2Value === 2) {
            $html .= '<div class="panel-heading">'.$s2Key.'</div> ';
          }else if ($s2Value === 1){
            $html .= '<div class="panel-body"> 
                        <p>'.$s2Key.'</p></div>';
          }else if (is_array($s2Value)){
            $html .= '<table class="table"> ';
            foreach ($s2Value as $s2SubKey => $s2SubValue) {
              if($s2SubKey == 'Rowtitle'){
                $html .= '<thead><tr>';
                foreach ($s2SubValue as $s2SubSubKey => $s2SubSubValue) {
                  $html .= '<th>'.$s2SubSubKey.'</th>';
                }
                $html .= '</tr></thead><tbody>';
              }else {
                $html .= '<tr><th scope="row">'.$s2SubKey.'</th>';
                foreach ($s2SubValue as $s2SubSubKey => $s2SubSubValue) {
                  $html .= '<td>'.$s2SubSubKey.'</td>';
                }
                $html .= '</tr>';
              }
            }
            $html .= '</tbody></table>';
          }
        }
        $html .= '</div></div></div>';
      }
      echo $html;
      $table = ob_get_contents();
      ob_end_clean();
    ?>

    <!-- Cette partie va générer dynamiquement notre paneau de droite à partir des entrées du fichier data.php-->
    <?php
      ob_start();
      require_once('data.php');
      if(isset($section3) && !empty($section3)){
        $html = '<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                  <ul class="list-group">';
        foreach ($section3 as $s3Key => $s3Value) {
          if($s3Key == 'Link 1'){
            $html .= '<li href="#" class="list-group-item active">'.$s3Key.'<span class="badge">'
            .$s3Value.'</span></li>';
          }else {
            $html .= '<li href="#" class="list-group-item">'.$s3Key.'<span class="badge">'
            .$s3Value.'</span></li>';
          }
        }
      }
      echo $html;
      $link = ob_get_contents();
      ob_end_clean();
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <?php 
      echo $str; 
      echo $jumbo;
      echo $table;
      echo $link;
    ?>

  </body>
</html>
