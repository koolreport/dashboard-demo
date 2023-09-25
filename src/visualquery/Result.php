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
                $html .= "<br><pre style='white-space:pre-wrap;'><code id='result-sql' class='sql hljs language-sql'>$queryStr</code></pre>";
                $html .= "<script>
                    // hljs.configure({ ignoreUnescapedHTML: false });
                    // hljs.highlightAll();
                    // var html = hljs.highlightAuto('<h1>Hello World!</h1>').value;
                    var resultSqlEl = document.querySelector('#result-sql');
                    // console.log('before: ', resultSqlEl);
                    if (!resultSqlEl.classList.contains('hljs-highlighted')) {
                        hljs.highlightElement(resultSqlEl);
                        resultSqlEl.classList.add('hljs-highlighted');
                    }
                    // console.log('after: ', resultSqlEl);
                    // hljs.highlightElement(resultSqlEl);
                    // hljs.configure({ ignoreUnescapedHTML: true });
                    // var highlightHtml = hljs.highlight(resultSqlEl.textContent, {language: 'sql'}).value; 
                    // resultSqlEl.innerHTML = highlightHtml;
                </script>";
                // $html .= "<script>
                //     hljs.highlightAll(); 
                // </script>";
                // $value = json_encode($visualQueryDemo->value());
                // $value = htmlentities($value);
                // $html .= "<div><b>VisualQueryDemo</b> = $value</div>";
                return $html;
            })
            ->asHtml(true);
    }
}
