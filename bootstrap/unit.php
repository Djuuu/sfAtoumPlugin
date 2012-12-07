<?php

if (defined('__DIR__') === false)
{
  define('__DIR__', dirname(__FILE__));
}

// configuration
require_once __DIR__.'/../../../config/ProjectConfiguration.class.php';

if (!ProjectConfiguration::hasActive())
{
  new ProjectConfiguration(__DIR__.'/../../../');
}

// autoloader
sfAutoload::register();

if (defined('\mageekguy\atoum\running') === false)
{
  if (null === $atoumPath = sfConfig::get('sf_atoum_path'))
  {
    $atoumPath = __DIR__.'/../../../lib/vendor/atoum/';
  }

  require_once $atoumPath.'/scripts/runner.php';
}
