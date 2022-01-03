<?php
  /**
   * DB接続
   */
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'TsunakiDataBase_Test';

  //DBのオブジェクト生成
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  //接続失敗時のエラー表示
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  //接続成功時の表示
  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$mysqli->host_info;
  echo '<br>';
  echo 'Protocol version: '.$mysqli->protocol_version;
  echo "<br>";

  /**
   * phpmyadminからの取得情報をJsonに変換
   */
  $sql = "SELECT * FROM test";
  $result = $mysqli->query($sql);
  $userArray = [];
  $id = $_GET['id'];
  foreach($result as $row){
    echo "<br>";
    //URLのクエリパラメータの値(id)と等しいidを持つDBのレコードを取得
    if($row['id'] == $id){
      $userArray = array(
        'id'=>$row['id'],
        'name'=>$row['name'],
        'age'=>$row['age'],
        'discription'=>$row['discription']
      );
      //取得した情報を１行(レコード)ずつ貯めていく
      $userArrayResult[] = $userArray;
    }
  }
  //データをjsonに変換し出力
  $json = json_encode($userArrayResult);
  echo $json;

  //DBを閉じる
  $mysqli->close();

?>