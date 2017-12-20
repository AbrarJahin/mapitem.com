<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
		//DB::table('users')->where('active', 0)->delete();
		$this->info('All inactive users are deleted successfully!');
	}
}
