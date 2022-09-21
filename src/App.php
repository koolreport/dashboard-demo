<?php

namespace demo;


use \koolreport\dashboard\menu\Group;
use \koolreport\dashboard\pages\Login;
use \koolreport\dashboard\User;

use \koolreport\dashboard\Client;
use \koolreport\dashboard\ExportHandler;
use \koolreport\dashboard\export\ChromeHeadlessio;
use koolreport\dashboard\export\CSVEngine;
use koolreport\dashboard\export\XLSXEngine;

use koolreport\dashboard\menu\MegaMenu;
use \koolreport\dashboard\menu\MenuItem;

use koolreport\amazing\dashboard\Amazing;
use koolreport\appstack\dashboard\AppStack;
use koolreport\dashboard\Cookie;
use koolreport\dashboard\languages\DE;
use koolreport\dashboard\languages\EN;
use koolreport\dashboard\languages\FR;
use koolreport\dashboard\languages\TH;
use koolreport\dashboard\languages\VN;
use koolreport\dashboard\notifications\Alert;
use koolreport\dashboard\notifications\Note;

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

        $themeName = Cookie::themeName();
        $themeName = ($themeName!==null)?$themeName:"Amazing";
        $this->setTheme($themeName);
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

    /**
     * Provide list of languages for user to choose
     * @return array 
     */
    protected function languages()
    {
        return [
            EN::create(),
            DE::create(),
            FR::create(),
            TH::create(),
        ];
    }


    /**
     * Return list of all pages.
     * Here will have two pages: PublicPage which user can access freely
     * and MemberPage which will required user to login access
     * @return array 
     */
    protected function pages()
    {
        return [
            PublicPage::create(),
            MemberPage::create(),
        ];
    }

    /**
     * Return the top menu. By providing the method on app,
     * we will use the same top menu on every pages
     * @return array 
     */
    protected function topMenu()
    {
        return [
            "Mega Menu"=>MegaMenu::create()->sub([
                "Pages"=>Group::create()->sub([
                    "Public"=>MenuItem::create()
                        ->icon("fa fa-globe")
                        ->onClick(Client::navigate("App/PublicPage")),
                    "Member"=>MenuItem::create()
                        ->icon("fa fa-lock")
                        ->onClick(Client::navigate("App/MemberPage")),
                ]),
                "Themes"=>Group::create()->sub([
                    "Amazing"=>MenuItem::create()->onClick(Client::app()->action("changeTheme",["name"=>"Amazing"])),
                    "AppStack"=>MenuItem::create()->onClick(Client::app()->action("changeTheme",["name"=>"AppStack"])),
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

    /**
     * This action will get the user request of changing theme from client
     * it will set the theme as well as save the current theme selection
     * to cookie. Last, it will reload page to get theme changed.
     * @param mixed $request 
     * @param mixed $response 
     * @return void 
     */
    protected function actionChangeTheme($request, $response)
    {
        $themeName = $request->params("name");
        $this->setTheme($themeName);
        Cookie::themeName($themeName);
        $response->runScript("location.reload()");
    }

    /**
     * Just a function to set correct theme for App
     * from the name of theme
     * @param mixed $name 
     * @return void 
     */
    protected function setTheme($name)
    {
        switch($name) {
            case "Amazing":
                $this->theme(Amazing::create());
                break;
            case "AppStack":
                $this->theme(AppStack::create());
                break;
        }
    }

    /**
     * Account menu that will appear when user login
     * We will use the same account menu on all pages
     * @return array 
     */
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