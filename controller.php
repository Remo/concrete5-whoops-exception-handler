<?php

defined('C5_EXECUTE') or die('Access Denied.');

class WhoopsExceptionHandlerPackage extends Package {

    protected $pkgHandle = 'whoops_exception_handler';
    protected $appVersionRequired = '5.6.2.1';
    protected $pkgVersion = '0.0.1';

    public function getPackageName() {
        return t("Whoops Exception Handler");
    }

    public function getPackageDescription() {
        return t("Integrates the whoops exception handler for cool kids.");
    }

    public function on_start() {
        $debugLevel = Config::get('SITE_DEBUG_LEVEL');

        if ($debugLevel) {
            Loader::library('3rdparty/Whoops/Run', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Exception/Inspector', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Exception/ErrorException', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Exception/FrameCollection', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Exception/Frame', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Handler/HandlerInterface', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Handler/Handler', $this->pkgHandle);
            Loader::library('3rdparty/Whoops/Handler/PrettyPageHandler', $this->pkgHandle);

            $run = new \Whoops\Run;

            // We want the error page to be shown by default, if this is a
            // regular request, so that's the first thing to go into the stack:
            $run->pushHandler(new \Whoops\Handler\PrettyPageHandler);

            // That's it! Register Whoops and throw a dummy exception:
            $run->register();
        }
    }

}
