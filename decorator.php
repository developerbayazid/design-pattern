<?php
//decorator pattern
class Article {
    private $title;
    private $time;
    function __construct($title, $time){
        $this->title = $title;
        $this->time = $time;
    }
    function getTitle(){
        return $this->title;
    }
    function getTime(){
        return $this->time;
    }
    function displayTitle(){
        $title = $this->getTitle();
        $time = date('y/m/d h:j:s', $this->getTime());
        echo "{$title} was published on {$time}";
    }
}

class ArticleTitleDecorator {
    private $article;
    function __construct(Article $article){
        $this->article = $article;
    }
    function displayTitle(){
        $title = $this->article->getTitle();
        $time = $this->timeAgo($this->article->getTime());
        echo "{$title} was published on {$time}";
    }
    private function timeAgo( $time ) { 
        //source: https://www.geeksforgeeks.org/how-to-convert-timestamp-to-time-ago-in-php/
        $diff = time() - $time; 
          
        if( $diff < 1 ) {  
            return 'less than 1 second ago';  
        } 
          
        $timeRules = array (  
                    12 * 30 * 24 * 60 * 60 => 'year', 
                    30 * 24 * 60 * 60       => 'month', 
                    24 * 60 * 60           => 'day', 
                    60 * 60                   => 'hour', 
                    60                       => 'minute', 
                    1                       => 'second'
        ); 
      
        foreach( $timeRules as $secs => $str ) { 
              
            $div = $diff / $secs; 
      
            if( $div >= 1 ) { 
                  
                $t = round( $div ); 
                return $t . ' ' . $str .  
                    ( $t > 1 ? 's' : '' ) . ' ago'; 
            } 
        } 
    } 
}

$at = new Article('Article one', time()-450000);

$articleDeco = new ArticleTitleDecorator($at);
$articleDeco->displayTitle();