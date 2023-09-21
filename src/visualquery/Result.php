<?php

namespace demo\visualquery;

use \koolreport\dashboard\widgets\Text;

class Result extends Text
{
    protected function onInit()
    {

        $this
            ->text(function () {
                $visualQueryDemo = $this->sibling("VisualQueryDemo");
                $qb = $visualQueryDemo->toQueryBuilder();
                $queryStr = $qb->toMySQL([
                    'newLineBeforeKeyword' => true
                ]);
                $html = "";
                // $html .= $queryStr;
                $html .= "<br><pre style='white-space:pre-wrap;'><code class='language-sql'>$queryStr</code></pre>";
                $html .= "<script>hljs.highlightAll();</script>";
                // $value = json_encode($visualQueryDemo->value());
                // $value = htmlentities($value);
                // $html .= "<div><b>VisualQueryDemo</b> = $value</div>";
                return $html;
            })
            ->asHtml(true);
    }
}
