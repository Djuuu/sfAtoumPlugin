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
$autoload = sfSimpleAutoload::getInstance(sfConfig::get('sf_cache_dir').'/project_autoload.cache');
$autoload->loadConfiguration(sfFinder::type('file')->name('autoload.yml')->in(array(
  sfConfig::get('sf_symfony_lib_dir').'/config/config',
  sfConfig::get('sf_config_dir'),
)));
$autoload->register();

if (defined('\mageekguy\atoum\running') === false)
{
  if (null === $atoumPath = sfConfig::get('sf_atoum_path'))
  {
    $atoumPath = __DIR__.'/../../../lib/vendor/atoum/';
  }

  require_once $atoumPath.'/scripts/runner.php';
}
