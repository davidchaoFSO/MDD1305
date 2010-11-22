<?php
/**
 * Fuel
 *
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package		Fuel
 * @version		1.0
 * @author		Fuel Development Team
 * @license		MIT License
 * @copyright	2010 Dan Horrigan
 * @link		http://fuelphp.com
 */

namespace Fuel;

// --------------------------------------------------------------------

/**
 * Migration Interface
 *
 * All migrations should implement this, forces up() and down() and gives
 * access to the CI super-global.
 *
 * @package		Migrations
 * @author		Phil Sturgeon
 */
abstract class Migration
{
	public abstract function up();

	public abstract function down();
}

// ------------------------------------------------------------------------

/**
 * Migrate Class
 *
 * @package		Fuel
 * @category	Migrations
 * @author		Phil Sturgeon
 */
class Migrate
{
	public static $version = 0;

	public static function _init()
	{
		Log::debug('Migrate class initialized');

		Config::load('migration', 'migration');

		DB::query('CREATE TABLE IF NOT EXISTS `migration` (`current` INT(11) NOT NULL DEFAULT "0");')->execute();

		// Check if there is a version
		$foo = DB::query('SELECT `current` FROM `migration`')->execute()->current();

		// Not set, so we are on 0
		if ( ! isset($foo['current']))
		{
			DB::query('INSERT INTO `migration` (`current`) VALUES (0)')->execute();
		}

		else
		{
			static::$version = (int) $foo['current'];
		}
	}

	/**
	 * Installs the schema up to the last version
	 *
	 * @access	public
	 * @return	void	Outputs a report of the installation
	 */
	public static function install()
	{
		if ( ! $migrations = static::find_migrations())
		{
			Log::error('no_migrations_found');
			return FALSE;
		}

		$last_migration = basename(end($migrations));

		// Calculate the last migration step from existing migration
		// filenames and procceed to the standard version migration
		$last_version = substr($last_migration, 0, 3);
		return static::version(intval($last_version, 10));
	}

	// --------------------------------------------------------------------

	/**
	 * Migrate to a schema version
	 *
	 * Calls each migration step required to get to the schema version of
	 * choice
	 *
	 * @access	public
	 * @param $version integer	Target schema version
	 * @return	mixed	TRUE if already latest, FALSE if failed, int if upgraded
	 */
	public static function version($version)
	{
		$start = static::$version;
		$stop = $version;

		if ($version > static::$version)
		{
			// Moving Up
			++$start;
			++$stop;
			$step = 1;
		}

		else
		{
			// Moving Down
			$step = -1;
		}

		$method = $step === 1 ? 'up' : 'down';
		$migrations = array();

//		Debug::dump($start, $stop);

		// We now prepare to actually DO the migrations
		// But first let's make sure that everything is the way it should be
		for ($i = $start; $i != $stop; $i += $step)
		{
			$f = glob(sprintf(Config::get('migration.path') . '%03d_*.php', $i));

			// Only one migration per step is permitted
			if (count($f) > 1)
			{
				Log::error('multiple_migrations_version');
				return FALSE;
			}

			// Migration step not found
			if (count($f) == 0)
			{
				// If trying to migrate up to a version greater than the last
				// existing one, migrate to the last one.
				if ($step == 1) break;

				// If trying to migrate down but we're missing a step,
				// something must definitely be wrong.
				Log::error('migration_not_found');
				return FALSE;
			}

			$file = basename($f[0]);
			$name = basename($f[0], '.php');

			// Filename validations
			if (preg_match('/^\d{3}_(\w+)$/', $name, $match))
			{
				$match[1] = strtolower($match[1]);

				// Cannot repeat a migration at different steps
				if (in_array($match[1], $migrations))
				{
					Log::error('multiple_migrations_name');
					return FALSE;
				}

				include $f[0];
				$class = 'Migration_' . ucfirst($match[1]);

				if ( ! class_exists($class))
				{
					Log::error('migration_class_doesnt_exist');
					return FALSE;
				}

				if ( ! is_callable(array($class, 'up')) || !is_callable(array($class, 'down')))
				{
					Log::error('wrong_migration_interface');
					return FALSE;
				}

				$migrations[] = $match[1];
			}
			else
			{
				Log::error('invalid_migration_filename');
				return FALSE;
			}
		}

		$version = $i + ($step == 1 ? -1 : 0);

		// If there is nothing to do, bitch and quit
		if ($migrations === array())
		{
			return TRUE;
		}

		// Loop through the migrations
		foreach ($migrations AS $migration)
		{
			Log::info('Migrating to: ' . static::$version + $step);

			$class = 'Migration_' . ucfirst($migration);
			call_user_func(array(new $class, $method));

			static::$version += $step;
			static::_update_schema_version(static::$version - $step, static::$version);
		}

		Log::info('Migrated to '.static::$version.' successfully.');

		return static::$version;
	}

	// --------------------------------------------------------------------

	/**
	 * Set's the schema to the latest migration
	 *
	 * @access	public
	 * @return	mixed	TRUE if already latest, FALSE if failed, int if upgraded
	 */
	public static function current()
	{
		return static::version(Config::get('migration.version'));
	}

	// --------------------------------------------------------------------

	/**
	 * Set's the schema to the latest migration
	 *
	 * @access	public
	 * @return	mixed	TRUE if already latest, FALSE if failed, int if upgraded
	 */

	protected static function find_migrations()
	{
		// Load all *_*.php files in the migrations path
		$files = glob(Config::get('migration.path') . '*_*.php');
		$file_count = count($files);

		for ($i = 0; $i < $file_count; $i++)
		{
			// Mark wrongly formatted files as FALSE for later filtering
			$name = basename($files[$i], '.php');
			if ( ! preg_match('/^\d{3}_(\w+)$/', $name))
			{
				$files[$i] = FALSE;
			}
		}

		sort($files);

		return $files;
	}

	// --------------------------------------------------------------------

	/**
	 * Stores the current schema version
	 *
	 * @access	private
	 * @param $schema_version integer	Schema version reached
	 * @return	void					Outputs a report of the migration
	 */
	private function _update_schema_version($old_version, $version)
	{
		DB::query('UPDATE `migration` SET `current` = '.(int)$version.' WHERE `current` = '.(int)$old_version)->execute();
	}
}