<?php

/**
 * ClickHeat - Clicks' heatmap
 *
 * @link http://www.dugwood.com/clickheat/index.html
 * @license http://www.gnu.org/licenses/gpl-3.0.html Gpl v3 or later
 * @version $Id$
 *
 * @package Piwik\Plugins\ClickHeat
 */

namespace Piwik\Plugins\ClickHeat;

use Piwik\Plugins\ClickHeat\Model\MysqlModel;

class ClickHeat extends \Piwik\Plugin
{
	public function install()
	{
		/** Create main cache paths */
		$dir = PIWIK_INCLUDE_PATH.'/tmp/cache/clickheat/';
		if (!is_dir($dir.'logs'))
		{
			mkdir($dir.'logs', 0755, true);
		}
		if (!is_dir($dir.'cache'))
		{
			mkdir($dir.'cache', 0755, true);
		}
		$htaccess = PIWIK_INCLUDE_PATH.'/plugins/ClickHeat/dot_htaccess';
		if (file_exists($htaccess)) {
			copy($htaccess, PIWIK_INCLUDE_PATH.'/plugins/ClickHeat/.htaccess');
		}
        MysqlModel::install();
	}

    public function uninstall()
    {
        MysqlModel::uninstall();
    }
}
