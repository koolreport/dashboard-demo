<?php

namespace demo;

use \koolreport\dashboard\Widget;
use \koolreport\core\Utility;
use \koolreport\dashboard\containers\Html;

class CodeDemo extends Widget
{
    public function __construct($description)
    {
        parent::__construct();
        $this->description($description);
    }
    protected function onCreated()
    {
        $this->props([
            "description"=>null,
            "raw"=>false,
        ]);
    }

    protected function render()
    {
        $path = str_replace("\\","/",dirname(Utility::getClassPath($this->dashboard())));
        $files = glob($path."/*.php");
        foreach(glob($path."/*", GLOB_ONLYDIR) as $folder) {
            $files = array_merge($files,glob($folder."/*.php"));
        }
        $fileNames = array_map(
            function($file) use ($path) {
                return str_replace($path."/","",$file);
                //return substr($file,strrpos($file,"/")+1);
            },
            $files
        );

        return 
        Html::div()->class("code-demo")->sub([
            Html::hr(),
            Html::ul()->class("nav nav-tabs")->role("tablist")->sub(function() use($files,$fileNames){
                $lis = [
                    Html::li([
                        Html::a("Description")
                        ->attr([
                            "class"=>"nav-link active show",
                            "data-toggle"=>"tab",
                            "role"=>"tab",
                            "href"=>"#t".md5("Description"),
                        ])
                    ])
                ];
                foreach($fileNames as $k=>$fileName) {
                    array_push(
                        $lis,
                        Html::li([
                            Html::a([Html::i()->class("far fa-file-code")," ".$fileName])
                            ->attr([
                                "class"=>"nav-link",
                                "data-toggle"=>"tab",
                                "role"=>"tab",
                                "href"=>"#t".md5($fileName),
                            ])
                        ])->class("nav-item")
                    );
                }
                return $lis;
            }),
            Html::div()->class("tab-content")->sub(function() use($files,$fileNames){
                $divs = [
                    Html::div(Html::p($this->description())->raw($this->raw()))
                    ->id("t".md5("Description"))
                    ->class("tab-pane fade active show")
                    ->role("tabpanel")
                ];
                foreach($files as $k=>$file) {
                    array_push(
                        $divs,
                        Html::div([
                            Html::pre([
                                Html::code(file_get_contents($file))->class("php")
                            ])
                        ])
                        ->id("t".md5($fileNames[$k]))
                        ->class("tab-pane fade")
                        ->role("tabpanel")
                    );
                }
                return $divs;
            }),
            Html::style("
                div.code-demo div.tab-pane { min-height:300px;padding: 1rem; }
                div.code-demo div.tab-content { margin-top:-2px; }
                div.code-demo a.nav-link { color:#9da0a8; }
                div.code-demo a.nav-link.active { color:#1e8fc6; }
            ")->raw(true),
            Html::script("
                document.querySelectorAll('pre>code').forEach(function(el){
                    hljs.highlightElement(el);
                });
            ")->raw(true)
        ]);
    }
}