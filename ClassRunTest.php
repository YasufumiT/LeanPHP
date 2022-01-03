<?php
  /**
   * クラスの動作確認
   */
  echo Test::CONST_NUM;
  echo Test::$staticValue;
  $Num = 1;
  $arr = array(1, 2, 3, 4);
  foreach ($arr as $value) {
    $value = $value * 2;
    echo $value;
    $testarry[] = $value;

  }
  unset($value);
  var_dump($testarry);

  $extendTest = new ExtendTest;
  $ExtendNum = $extendTest->$ExtendNum;
  print $extendTest->testPlus($ExtendNum);
  print $extendTest->testMinus($ExtendNum);

  $test = new Test;
  print $test->testEcho();

  class Test
  {
    public $Num = 1;
    const CONST_NUM = 2;
    static $staticValue = 3;

    public function testPlus($Num)
    {
      return 1 + $Num;
    }

    public function testEcho()
    {
      echo "iii";
    }

  }

  class ExtendTest extends Test
  {
    public $ExtendNum;

    function testPlus($ExtendNum)
    {
      echo $ExtendNum;
      $ExtendNum = 5;
      return 1 + $ExtendNum;
    }

    function testMinus($ExtendNum)
    {
      echo $ExtendNum;
    }

    





  }

?>