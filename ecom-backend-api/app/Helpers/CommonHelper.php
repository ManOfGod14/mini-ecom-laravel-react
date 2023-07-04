<?php

namespace App\Helpers;

use Illuminate\Support\HtmlString;

class CommonHelper {
    public static function getProductNotes($note, $starNbr=5) {
        $emptyStart = $starNbr - $note;
        $starElements = '';

        for($i = 0; $i < $note; $i++) {
            $starElements .= self::getHtmlElement('<div class="bi bi-star-fill"></div>');
        }

        for($i = 0; $i < $emptyStart; $i++) {
            $starElements .= self::getHtmlElement('<div class="bi bi-star"></div>');
        }
        
        echo $starElements;
    }

    public static function getHtmlElement($html) {
        echo new HtmlString($html);
    }
}