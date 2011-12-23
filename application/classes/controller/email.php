<?php
class Controller_Email extends Controller{
    public function action_index(){
        //echo View::factory("email");
    }
    public function action_test(){
        $mailTo = array("totsaponk@gmail.com");//email,other email
        $to = implode(", ", $mailTo);

        

            // subject
            $subject = 'Birthday Reminders for August';

            // message
            $message = '
        <html>
        <head>
          <title>Birthday Reminders for August</title>
        </head>
        <body>
          <p>Here are the birthdays upcoming in August!</p>
          <table>
            <tr>
              <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
            </tr>
            <tr>
              <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
            </tr>
            <tr>
              <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
            </tr>
          </table>
        </body>
        </html>
        ';

            // To send HTML mail, the Content-type header must be set
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
            $headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
            $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
            $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

            // Mail it
            $send=@mail($to, $subject, $message, $headers);
            if(!$send){
                Request::current()->redirect("");
            }
    }
    public function action_submit() {
        
		$data = array(
			'user' => array(
				'name' => 'Tom'
			)
		);

		Mailer::factory('user')->send_welcome();
		
		//you can also pass arguments to the mailer
		Mailer::factory('user')->send_welcome($data);
		
		//you can also use instance
		Mailer::instance('user')->send_welcome($data);
		
		//you can also pass arguments in factory
		Mailer::factory('user', 'welcome', $data);
		
		//you can also send direct from the controller
		$mail=Mailer::instance()
			->to('totsaponk@gmail.com')
			->from('totsaponk@gmail.com')
			->subject('Welcome!')
			->html('Welcome!')
			->send();/**/
                print_r($mail);
    }
}
?>
