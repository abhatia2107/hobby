<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class calculatePayment extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'calculate:payment';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'To calculate payment of bookings done in a month.';

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
	public function fire()
	{
		$batches=Batch::where('batch_bookings','>',0)->get();
		foreach ($batches as $batch) {
			$data['payment']=$batch->batch_bookings*$batch->batch_hobbyix_price;
			$data['batch_id']=$batch->id;
			$data['batch']=$batch->batch;
			$data['bookings']=$batch->batch_bookings;
			$data['hobbyix_price']=$batch->batch_hobbyix_price;
			Account::create($data);
			$batch->batch_bookings=0;
			$batch->save();
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('example', InputArgument::REQUIRED, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
