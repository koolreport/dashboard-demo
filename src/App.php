<?php

namespace demo;

use \koolreport\dashboard\menu\Section;
use \koolreport\dashboard\menu\Group;
use \koolreport\dashboard\pages\Login;
use \koolreport\dashboard\User;

use \koolreport\dashboard\menu\MenuItem;
use \koolreport\dashboard\Client;
use \koolreport\dashboard\ExportHandler;
use \koolreport\dashboard\export\ChromeHeadlessio;
use koolreport\dashboard\export\CSVEngine;
use koolreport\dashboard\export\XLSXEngine;
use koolreport\dashboard\menu\MegaMenu;

class App extends \koolreport\dashboard\Application
{
    protected function onCreated()
    {
        $this->debugMode(true)
        ->footerLeft("
            <a class='btn btn-primary btn-sm' target='_blank' href='https://github.com/koolreport/dashboard-demo'>
                <i class='fab fa-github'></i> SourceCode
            </a>
            <a target='_blank' href='https://www.koolreport.com/docs/dashboard/overview/' style='margin-left:5px;' class='btn btn-warning btn-sm'>
                <i class='fa fa-file-alt'></i> Docs
            </a>
            <a target='_blank' href='https://www.koolreport.com/get-koolreport-pro' style='margin-left:5px;' class='btn btn-danger btn-sm'>
                <i class='fa fa-shopping-cart'></i> Purchase
            </a>
        ")
        ->footerRight("
            <div class='d-none d-md-block d-lg-block'>Powered by <a target='_blank' href='https://www.koolreport.com'>KoolReport</a></div>
        ")
        ->js("//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js")
        ->css("https://cdn.koolreport.com/examples/assets/theme/tomorrow.css");
    }

    protected function login()
    {
        return  Login::create()
                ->descriptionText("
                    <i style='color:#333'>
                    Please log in with <b class='text-danger'>demo</b>/<b class='text-danger'>demo</b>
                    </i>
                ")
                ->failedText("Wrong! Please use <b>demo</b> for both username and password!")
                ->authenticate(function ($username, $password) {

                    //Look for user that have username and password 
                    $users = AutoMaker::table("users")
                                ->where("username",$username)
                                ->where("password",$password)
                                ->run();
                                
                    $user = $users->get(0);//Try to get first user, get associate array contain user information

                    if($user!==null) {
                        //Found a user, return User object
                        return User::create()
                        ->id($user["id"])
                        ->name($user["displayname"])
                        ->avatar("images/8.jpg")
                        ->roles([$user["role"]]);                        
                    }

                    //Other: fail to login, return null
                    return null;
                });
    }


    protected function pages()
    {
        return [
            PublicPage::create()->loginRequired(false),
            MemberPage::create(),
        ];
    }

    protected function topMenu()
    {
        return [
            "Mega Menu"=>MegaMenu::create()->sub([
                "Page List"=>Group::create()->sub([
                    "Public Page"=>MenuItem::create()->onClick(Client::navigate("App/PublicPage")),
                    "Member Page"=>MenuItem::create()->onClick(Client::navigate("App/MemberPage")),
                ]),
                "Themes"=>Group::create()->sub([
                    "Amazing Theme"=>MenuItem::create()->onClick(Client::navigate("App/PublicPage")),
                    "AppStack Theme"=>MenuItem::create()->onClick(Client::navigate("App/PublicPage")),
                ])
            ]),
            "About"=>MenuItem::create()
                ->href("https://www.koolreport.com/packages/dashboard")
                ->target("_blank"),
            "Forums"=>MenuItem::create()
                ->href("https://www.koolreport.com/forum/topics")
                ->target("_blank"),
        ];
    }

    protected function accountMenu()
    {
        return [
            "Logout"=>MenuItem::create()
                ->icon("fa fa-lock")       
                ->onClick(Client::logout())
        ];
    }

    protected function export()
    {
        return ExportHandler::create()
                ->storage(dirname(__DIR__)."/storage")
                ->csvEngine(
                    CSVEngine::create()
                )
                ->xlsxEngine(
                    XLSXEngine::create()
                )
                ->pdfEngine(
                    ChromeHeadlessio::create()
                    ->token("716168c297fb0486d4cf24458ac2f860364f277f081630d640e16ac313aba310")
                );
    }
}