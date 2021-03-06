<?php
	include $_SERVER['DOCUMENT_ROOT']."/db_info.php"; /* db load */
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CommIT</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for thiss template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">CommIT</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item active dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Portfolio
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item active" href="portfolio-1-col.html">공지사항</a>
              <a class="dropdown-item" href="portfolio-2-col.html">자유게시판</a>
              <a class="dropdown-item" href="portfolio-3-col.html">갤러리</a>
              <a class="dropdown-item" href="portfolio-4-col.html">외주게시판</a>
              <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
              <a class="dropdown-item" href="General_Forum.html">-------</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blog
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
              <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
              <a class="dropdown-item" href="blog-post.html">Blog Post</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Pages
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="full-width.html">Full Width Page</a>
              <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
              <a class="dropdown-item" href="faq.html">FAQ</a>
              <a class="dropdown-item" href="404.html">404</a>
              <a class="dropdown-item" href="pricing.html">Pricing Table</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  
  <?php
		$bno = $_GET['board_data_id']; /* bno함수에 idx값을 받아와 넣음*/
		// $hit = mysqli_fetch_array(mq("select * from board_data where board_data_id ='".$bno."'"));
		// $hit = $hit['hit'] + 1;  //조회수
		// $fet = mq("update board set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from board_data where board_data_id='".$bno."'"); /* 받아온 idx값을 선택 */
		$board_data_arr = $sql->fetch_array();
  ?>
  

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">공지사항
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">HOME</a>
      </li>
      <li class="breadcrumb-item active">공지사항</li>
    </ol>
    </div>

    <table Width = "1100" align = "center">
      <tr>
        <td width = "0">&nbsp</td>
        <td align="left" width="1100">글번호  <?php echo $board_data_arr['board_data_id']; ?></td>
        <td width="319"></td>
        <td width="0">&nbsp;</td>
      </tr>
        <tr height="2" bgcolor="#dddddd"><td colspan="4" width="407"></td></tr>

      <tr>
        <td width="0">&nbsp;</td>
        <td align="left" width="1100">작성자  </td>
        <td width="319"></td>
        <td width="0">&nbsp;</td>
      </tr>
         <tr height="2" bgcolor="#dddddd"><td colspan="4" width="407"></td></tr>
      <tr>
        <td width="0">&nbsp;</td>
        <td align="left" width="1100">작성일  <?php echo $board_data_arr['date']; ?></td>
        <td width="319"></td>
        <td width="0">&nbsp;</td>
        </tr>
          <tr height="2" bgcolor="#dddddd"><td colspan="4" width="407"></td></tr>
      <tr>
        
        <td width="0">&nbsp;</td>
        <td align="left" width="1100">제목  <?php echo $board_data_arr['title']; ?></td>
        <td width="319"></td>
        <td width="0">&nbsp;</td>
        </tr>
          <tr height="2" bgcolor="#dddddd"><td colspan="4" width="407"></td></tr>
                    <tr>
          <td width="0">&nbsp;</td>
                       <td width="399" colspan="2" height="500">
                       <?php echo $board_data_arr['contents']; ?>
                    </tr>

        <tr height="1" bgcolor="#dddddd"><td colspan="4" width="407"></td></tr>
        <tr height="1" bgcolor="#82B5DF"><td colspan="4" width="407"></td></tr>

        <tr align="center">
              <td width="0">&nbsp;</td>
    </table>

<div class="view-btn">
  <button class="btn btn-primary" style="float: right;margin-right: 200px; color: white;">
     <a href="portfolio-1-col.php" >글목록</a>
  </button>
  <button class="btn btn-primary" style="float: right;margin-right: 1px; color: white;">
    <a href="writing_btn_modify.php?board_data_id=<?php echo $bno;?>">글수정</a>
  </button>
  <button class="btn btn-primary" style="float: right;margin-right: 1px; color: white;">
     <a href="delete_ok.php?board_data_id=<?php echo $bno;?>">글삭제</a>
  </button>
</div>


  <!-- /.container -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
