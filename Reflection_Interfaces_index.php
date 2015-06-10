<?php
include 'Reflection_Interfaces.php';
function findPlugins()
{
	$plugins = array();
	foreach (get_declared_classes() as $class) {
		$rClass = new ReflectionClass($class);
		if ($rClass->implementsInterface('IPlugin')) {
			$plugins[] = $rClass;
		}
	}
	return $plugins;
}
function ComputeMenu()
{
	$list = array();
	foreach (findPlugins() as $plugin) {
		if ($plugin->hasMethod('getMenuItems')) {
			$m = $plugin->getMethod('getMenuItems');
			if ($m->isStatic()) {
				$item = $m->invoke(null);
			} else {
				$obj = $plugin->newInstance();
				$item = $m->invoke($obj);
			}
		}
		$list[] = $item;
	}
	return $list;
}
$menu = ComputeMenu();
print_r($menu);
?>