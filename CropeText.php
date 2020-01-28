<?php
class CropeText
{
    function __construct($text=null , $q_words=20, $stop_words=null, $cropet_text=null)
    {
        $this->text = $text;
        $this->q_words = $q_words;
        $this->stop_words = $stop_words;
        $this->cropet_text = $cropet_text;
    }

    public function madeCropeText()
    {
      //убираю знаки из строки
      $text_without_tchk = preg_replace('/[^\w\s]/u', '', $this->text);
      $text_without_tchk = mb_strtolower($text_without_tchk);

      $array_words = explode(" ", $text_without_tchk);
      //обрезаю массив по количеству слов
      $output_crope_array = array_slice($array_words, 0, $this->q_words);

      $string_without_tchk = implode(" ", $output_crope_array);

      //работа с сырой строкой
      $full_array_words = explode(" ", $this->text);

      if($this->stop_words !== null){
        //где стоит стоп слово
        $keya = 0;
        $array_stopwords = explode(" ", $this->stop_words);

        $reverse_output_crope_array = array_reverse($output_crope_array);

        foreach ($array_stopwords as $stop_word) {
            $key = array_search($stop_word, $reverse_output_crope_array);
            if ($key == true) {
              if ($keya < $key) {
                $keya = $key;
              }
            }
        }
        $q_number_word = count($reverse_output_crope_array) - $keya;

        if ($keya > 0) {
          $this->q_words = $keya + 1;
        }
      } else {
        $q_number_word = $this->q_words;
      }
      //обрезаю массив по количеству слов
      $output_crope_array = array_slice($full_array_words, 0, $q_number_word);
      $string_with_tchk = implode(" ", $output_crope_array);
      $this->cropet_text = $string_with_tchk;
    }

    public function getCropeText()
    {
        if($this->text !== null)
        {
          $this->madeCropeText();
          return $this->cropet_text;
        }
    }
}

?>
