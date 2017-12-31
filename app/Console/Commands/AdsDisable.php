<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Advertisement;
use Carbon\Carbon;

class AdsDisable extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'ad:disable';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Disable Old Ads older than config value';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		try
		{
			Advertisement::where('is_active', 'active')
						->where( 'updated_at', '<', Carbon::now()->subDays(env("AD_AUTO_DISABLE_DAY_INTERVAL", 100)))
						->update(['is_active' => 'inactive']);
			$this->info('Ads disabled!!');
		}
		catch (Exception $ex)
		{
			$this->info('Ads disable failed - '.$ex);
		}
	}
}
