<?php 
  include  $_SERVER['DOCUMENT_ROOT']."/db_info.php";
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
  <link rel="stylesheet" href="css/portfolio.css">

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
              Board
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item active" href="portfolio-1-col.html">공지사항</a>
              <a class="dropdown-item" href="portfolio-2-col.html">자유게시판</a>
              <a class="dropdown-item" href="portfolio-3-col.html">갤러리</a>

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
    <body>
      <table class="table table-hover">
        <thead>
          <tr>
            <th> 번호</th>
            <th> 제목</th>
            <th> 작성자</th>
            <th> 날짜</th>
          </tr>
        </thead>



        <?php
          if(isset($_GET['page']))
          {
            $page = $_GET['page'];
          }
          else
          {
            $page = 1;
          }

          $sql1 = mq("select * from board_data");
          $row_num = mysqli_num_rows($sql1); //게시판 총 레코드 수
          $list = 5; //한 페이지에 보여줄 개수
          $block_ct = 5; //블록당 보여줄 페이지 개수

          $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
          $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
          $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

          $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
          if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
          $total_block = ceil($total_page/$block_ct); //블럭 총 개수
          $start_num = ($page-1) * $list;

          $sql2 = mq("select * from board_data order by board_data_id desc limit $start_num, $list"); // board테이블에있는 idx를 기준으로 내림차순해서 5개까지 표시
          while($board_data_arr = $sql2->fetch_array())
          {
            $title= $board_data_arr['title'];
            if(strlen($title)>60)
            { 
              $title=str_replace($board_data_arr["title"],mb_substr($board_data_arr["title"],0,60,"utf-8")."...",$board_data_arr["title"]); //title이 60을 넘어서면 ...표시
            }
        ?>

        <tbody>
          <tr>
          <td><?php echo $board_data_arr['board_data_id']; ?></td> <!--게시물 인덱스-->
          <td><a href="view.php?board_data_id=<?php echo $board_data_arr["board_data_id"];?>"><?php echo $title; ?></a></td> <!--게시물 title-->
          <td><?php echo $board_data_arr['member_id']; ?></td> <!--게시물 작성자-->
          <td><?php echo $board_data_arr['date']; ?></td>  <!--게시물 작성일-->
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>



    <!-- Pagination -->
    <div id = "page_num">
    <ul class="pagination justify-content-center">
    <?php
      if($page <= 1)
        { //만약 page가 1보다 크거나 같다면
          echo "<li class='fo_re'><<</li>"; //처음이라는 글자에 빨간색 표시 
        }else{
          echo "<li><a href='?page=1'><<</a></li>"; //아니라면 처음글자에 1번페이지로 갈 수있게 링크
        }
        if($page <= 1)
        { //만약 page가 1보다 크거나 같다면 빈값
          
        }else{
        $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
          echo "<li><a href='?page=$pre'>prev</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
        }
        for($i=$block_start; $i<=$block_end; $i++){ 
          //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
          if($page == $i){ //만약 page가 $i와 같다면 
            echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
          }else{
            echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
          }
        }
        if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
        }else{
          $next = $page + 1; //next변수에 page + 1을 해준다.
          echo "<li><a href='?page=$next'>next</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
        }
        if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
          echo "<li class='fo_re'>>></li>"; //마지막 글자에 긁은 빨간색을 적용한다.
        }else{
          echo "<li><a href='?page=$total_page'>>></a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
        }
    ?>
    </ul>
  </div>
</body>
  <button class="btn btn-primary" style="float: right;margin-right: 230px; color: white;">
    <a href="writing_btn.php" style = "color:white">글작성</a>  <!--글쓰기 버튼 경로-->
  </button>

  <!-- /.container -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>





