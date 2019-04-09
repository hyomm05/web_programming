# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
- table 이름은 tableboard_shop 으로 생성
- 기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성
- 각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)
    - ex) price -> int
    - ex) name -> char or varchar
    
Note: 

    create table tableboard_shop (
    -> num int auto_increment,
    -> date date,
    -> order_id int,
    -> name char(10),
    -> price int,
    -> quantity int,
    -> primary key(num)
    );


    
## index.php 수정
1. 데이터베이스 연동
2. tableboard_shop 테이블에서 num에 해당하는 레코드 가져옴 (NUM에 대한 오름차순 정의)
3. mysql_query() 함수를 이용해서, MySQL 에 쿼리 스트링 전송
4. mysql_fetch_array() 함수를 이용해서, 전달받은 레코드를 가져옴


## board_form.php 수정
1. 데이터베이스 연동
2. tableboard_shop 테이블에서 num에 해당하는 레코드 가져옴
3. mysql_query() 함수를 이용해서, MySQL 에 쿼리 스트링 전송
4. mysql_fetch_array() 함수를 이용해서, 전달받은 레코드를 가져옴
5. update인 경우엔 입력한 정보로 표시해야함
ex. <? echo $row[date]; ?> 

## function
### insert.php 수정
1. 데이터베이스 연동
2. tableboard_shop 테이블에 있는 전체 레코드 검색
3. mysql_query() 함수를 이용해서, MySQL 에 쿼리 스트링 전송
4. mysql_fetch_array() 함수를 이용해서, 전달받은 레코드를 가져옴
5. 삽입하고 싶은 레코드의 속성값을 받아옴
입력한 데이터 순서대로 데이터가 삽입되어야 함
$sql = "insert into tableboard_shop(date, order_id, name, price, quantity) 
values ('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]',' $_POST[quantity]')";
6. 출력값이 없을 때는, 에러 메시지 출력 


### update.php 수정
1. 데이터베이스 연동
2. tableboard_shop 테이블에 있는 전체 레코드 검색
3. mysql_query() 함수를 이용해서, MySQL 에 쿼리 스트링 전송
4. mysql_fetch_array() 함수를 이용해서, 전달받은 레코드를 가져옴
5. 바꾸고 싶은 레코드의 속성값을 받아옴
해당 레코드를 눌렀을 때, 기존에 저장되어 있던 데이터를 그대로 가져와야 함
$sql = "update tableboard_shop set date='$_POST[date]', order_id=$_POST[order_id], name=$_POST[name], price=$_POST[price], quantity=$_POST[quantity] where num=$_GET[num]";
6. 출력값이 없을 때는, 에러 메시지 출력 


### delete.php 수정
1. 데이터베이스 연동
2. tableboard_shop 테이블에 있는 전체 레코드 검색
3. mysql_query() 함수를 이용해서, MySQL 에 쿼리 스트링 전송
4. mysql_fetch_array() 함수를 이용해서, 전달받은 레코드를 가져옴
5. 삭제하고 싶은 레코드의 num값을 ($_GET[num])을 받아옴
$sql = "delete from tableboard_shop where num=$_GET[num]";
6. 출력값이 없을 때는, 에러 메시지 출력 

