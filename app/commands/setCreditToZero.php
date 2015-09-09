<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class setCreditToZero extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'set:zero';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'To set the user\'s credit as zero and setting valid date as null.';

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
		$base = new BaseController;
		$date=date('Y-m-d');
		$membership_price = $base->membershipVal['payment'];
		// $this->booking(2);
		// exit();
		// $this->info($membership_price);
		$users=User::where('user_credits_expiry','<',$date)->get();
		foreach ($users as $user) {
			// $this->info($user->user_credits_expiry);
			$credit['user_id']=$user->id;
			$credit['credits_expired']=$user->user_credits_left;
			Credit::create($credit);
			$user->user_credits_left=0;
			$user->user_credits_expiry=null;
			$this->booking($user->id);
			$user->save();
			$name = $user->user_name;
            $email = $user->email;
            $data = [
            	'id'=>$user->id,
            	'name'=>$name,
            	'email'=>$email,
                'user_wallet' => $user->user_wallet,
                'expiry_date' => $user->user_credits_expiry
            ];
            if($user->user_wallet > $membership_price)
            	$data['final_price'] = 0;
            else
            	$data['final_price'] = $membership_price - $user->user_wallet;
            /*Confirmation mail is to be send to the user for pending referral*/
            $subject = Lang::get('user.user_membership_expired', array("name"=>$name));
            // $this->info($subject);
            Mail::queue('Emails.user.membership_expired', $data, function ($message) use ($email, $name, $subject) {
                $message->bcc("abhishek.bhatia@hobbyix.com","Abhishek Bhatia")->to($email, $name)->subject($subject);
            });
		}
        // $this->info('Successfully set credits to zero and mail sent');
	}

	public function booking($user_id)
	{
		$account = new Account;
		$accountDetails = $account->getBatchesForUser($user_id);
		// $this->info(print_r($accountDetails));
	}
	// Name of studio, type of activity, no of classes at an activity, calories per activity.

	protected function caloriesCalculator($booking)
	{
		
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
