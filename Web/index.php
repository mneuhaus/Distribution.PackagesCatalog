<?php

/*                                                                        *
 * This script belongs to the TYPO3 Flow framework.                       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

$rootPath = isset($_SERVER['FLOW_ROOTPATH']) ? $_SERVER['FLOW_ROOTPATH'] : FALSE;
if ($rootPath === FALSE && isset($_SERVER['REDIRECT_FLOW_ROOTPATH'])) {
	$rootPath = $_SERVER['REDIRECT_FLOW_ROOTPATH'];
}
if ($rootPath === FALSE) {
	$rootPath = dirname(__FILE__) . '/../';
} elseif (substr($rootPath, -1) !== '/') {
	$rootPath .= '/';
}

require($rootPath . 'Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Core/Bootstrap.php');

$context = "Development";

$hostContexts = array(
	"package-catalog.flow.famelo.com" => "Production"
);

if (isset($hostContexts[$_SERVER["HTTP_HOST"]])){
	$context = $hostContexts[$_SERVER["HTTP_HOST"]];
}

$bootstrap = new \TYPO3\Flow\Core\Bootstrap($context);
$bootstrap->run();

?>