<?php
/**
 * Класс приложения Application
 * Mail: mail.usa.va@gmail.com
 * User: astri
 * Date: 2019-03-27
 * Time: 10:48
 */

namespace SDK;

use Jenssegers\Blade\Blade;
use SDK\Facades\Facade;
use SDK\Facades\Route;


class App {

    protected $namespace;

    private $_configDataBase = array();

    private $_configApp = array();

    private $_routes;

    private $_authObject;

    private $_requestControllerClass;

    private $_requestAction;

    private $_middleware;

    private $_postRequestData;

    private $_requestMethod;

    private $_requestUri;

    private $_uriNumberString;

    private $_response;

    public $aliases;

    public function __construct() {
        $this->_registerConfigDataBase();
        $this->_registerConfigApp();
        $this->_registerCoreContainerAliases();
        $this->_registerFacades();
        $this->_registerRoutes();
        $this->_registerAuthObject();

        $this->_setRequestMethod();
        $this->_setRequestUri();
        $this->_ifPostMethodSetRequestData();
        $this->_calculateRequestControllerClassAndAction();
        $this->_makeControllerAndRunAction ($this->_requestMethod,
            $this->_requestControllerClass,
            $this->_requestAction,
            $this->_middleware,
            $this->_postRequestData,
            $this->_uriNumberString);
    }

    public function render() {
        $response = $this->_response;
        if (get_class($response) == 'SDK\Classes\ViewObject') {
            $view = $response->viewFile;
            $variables = $response->viewVariables;
            $variables['auth'] = $this->_authObject;
        } else require '404.html';

        $blade = new Blade(ROOT . '/resources/view', ROOT . '/cache');
        echo $blade->make($view, $variables);
    }

    public function getAuthObject() {
        return $this->_authObject;
    }

    private function _makeControllerAndRunAction($requestMethod, $controllerClass, $action, $middleware, $postDataObject, $uriNumberString) {

        //если для данного маршрута есть посредник то...
        if ($middleware !== null) {

            //Если посредник пропускает, создает нужный контроллер и выполняем экшен.
            $middlewareClass = 'SDK\\Facades\\' . $middleware;
            if ($middlewareClass::handler()){
                if ($requestMethod == 'POST') {
                    $this->_response = (new $controllerClass())->$action($postDataObject);
                } else {
                    $this->_response = (new $controllerClass())->$action($uriNumberString);
                }
            }
        } else {
            //если посредником нет то просто переходим к выполнению
            if ($requestMethod == 'POST') {
                $this->_response = (new $controllerClass())->$action($postDataObject);
            } else {
                $this->_response = (new $controllerClass())->$action($uriNumberString);
            }
        }

    }

    private function _calculateRequestControllerClassAndAction() {
        $resultControllerAndMethodValue = Route::dispatch($this->_requestUri, $this->_requestMethod);

        $this->_requestControllerClass = 'Controllers\\' . $resultControllerAndMethodValue->controller;
        $this->_requestAction = $resultControllerAndMethodValue->action;
        $this->_middleware = $resultControllerAndMethodValue->middleware;
        $this->_uriNumberString = $resultControllerAndMethodValue->urlNumeric;
    }

    private function _setRequestMethod() {
        $this->_requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    private function _setRequestUri() {
        $this->_requestUri = rtrim(ltrim($_SERVER['REQUEST_URI'],'/'),'/');
    }

    private function _registerFacades() {
        Facade::setFacadeApplication($this);
    }

    private function _registerRoutes() {
        $this->_routes = require '../routes/routes.php';
    }

    private function _registerConfigDataBase() {
        $this->_configDataBase = require ROOT.'/config/DataBase.php';
    }

    private function _registerConfigApp() {
        $this->_configApp = require ROOT.'/config/app.php';
    }

    private function _registerAuthObject() {
       global $auth;

        $this->_authObject = $auth;
    }

    private function _ifPostMethodSetRequestData() {
        if ($this->_requestMethod === 'POST') {
            $requestData = array_merge($_FILES, $_POST);

            $postDataObject = new \SDK\Classes\Request();
            foreach ($requestData as $key => $value) {
                $postDataObject->addField($key, $value);
            }
            $this->_postRequestData = $postDataObject;
        }
    }

    private function _registerCoreContainerAliases() {
        $configAlias = require ROOT . '/config/app.php';
        $this->aliases = $configAlias['aliases'];
    }
}