<!-- 구글 검색 : galley board css => CSS Only Pinterest-like Responsive Board Layout - Boardz.css | CSS ... -->
<!-- 출처 : https://www.cssscript.com/css-pinterest-like-responsive-board-layout-boardz-css/ -->
<?
    $connect = mysql_connect("localhost","shm","1234"); // DB 연결
    mysql_select_db("shm_db", $connect);                // DB 선택


    $sql = "select * from boardz where title like '%$_GET[search]%';";
    $result = mysql_query($sql,$connect);
    $records = mysql_num_rows($result); //총 레코드(결과)의 개수
?>


<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8"> 

    <title>Boardz Demo</title>
    <meta name="description" content="Create Pinterest-like boards with pure CSS, in less than 1kB.">
    <meta name="author" content="Burak Karakan">
    <meta name="viewport" content="width=device-width; initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="src/boardz.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wingcss/0.1.8/wing.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="seventyfive-percent  centered-block"> <!-- 여백조절 -->
        <!-- Sample code block -->
        <div>    
            <hr class="seperator"> <!-- 실선 -->

            <!-- Example header and explanation -->
            <div class="text-center">
                <h2>Beautiful <strong>Boardz</strong></h2> <!-- 타이틀 -->
                <div style="display: block; width: 50%; margin-right: auto; margin-left: auto; position: relative;">
                    <form class="example" action="board.php" method="get"> <!-- 돋보기버튼을 눌렀을 때 뜨는 창 -->
                        <input type="text" placeholder="Search.." name="search"> <!-- 검색창 -->
                        <button type="submit""><i class="fa fa-search"></i></button> <!-- 돋보기버튼 -->
                    </form>
                </div>
            </div>

            <!--<hr class="seperator fifty-percent">-->

            <!-- Example Boardz element. --!>



                  <div class="boardz centered-block beautiful">

                      <?PHP

                      echo "<ul>";
                      $count;
                      while ($row = mysql_fetch_array($result)) {
                          if($records!=1) {
                              if($count == round($records / 3) || $count == 2 * round($records/3)) {
                                  echo "</ul><ul>";
                              }
                      }
                          echo "<li>";
                          if($row[title] != NULL){
                              echo"<h1>$row[title]</h1>";
                          }

                          $row[contents];
                          echo "<img src=\"$row[image_url]\">";
                          echo "</li>";
                          $count++;
                      }
                      echo "</ul>";
                      ?>
                </div>
            </div>
        </div>

        <hr class="seperator">

    </div>
</body>
</html>