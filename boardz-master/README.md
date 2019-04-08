# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
[만약 추가한 파일이 있으면, 내용 추가! 없으면 이 문구 삭제!]
```

## board.php (수정)
1. MySQL 데이터베이스 연동
    $connect = mysql_connect("localhost","shm","1234"); 
    mysql_select_db("shm_db", $connect);                

2. 지정문자데이터 출력
    $sql = "select * from boardz where title like '%$_GET[search]%';";

3. MySQl에 쿼리 전송
    $result = mysql_query($sql,$connect);
 
4. 총 레코드(결과)의 개수
    $records = mysql_num_rows($result); 

ex) records의 값이 7이라고 하면
1  3  5
2  4  6
      7
위와 같은 순서로 그림이 배치되어야 한다.
$count를 폼에 배치된 그림의 개수라고 하자
DB 레코드에 담긴 데이터를 배열 형태로 무한반복하여 가져와야 한다.
reconds의 값이 1인 경우를 제외하고, 2 이상인 경우에는
무조건 <ul> </ul> 태그가 2번 이상 선언되어야 하므로
round 함수(반올림)를 이용하여 조건문을 설정한다. 

    while ($row = mysql_fetch_array($result)) {
    if($records!=1) { 
    if($count == round($records / 3) || $count == 2 * round($records/3)) {
    echo "</ul><ul>";
         }
    }

그리고 제목(title)을 설정한 경우에만 제목이 표기되어야 하므로
다음과 같은 조건문을 설정한다.

    if($row[title] != NULL){
    echo"<h1>$row[title]</h1>";
    }

또한, 그림에 대한 설명과 그림 첨부는 이와 같이 한다.
 
    $row[contents];
    echo "<img src=\"$row[image_url]\">";

(제목), (설명), 그림까지 설정된 레코드를 완성했을 시에는 
count를 1 증가시킨다.

