<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends Controller
{

    public function login(){

        return view('pages.login');
    }

    public function loginAccount(Request $request) {
        $username = $request->username;
        $password = $request->password;

        $isExist = User::where('username', $username)->whereNotNull('email_verified_at')->exists();

        if($isExist) {
            $correct_password = User::where('username', $username)->value('password');

            if(Hash::check($password, $correct_password)) {
                $details = User::with('details')->where('username', $username)->first();
                return view('pages.profile', ['user' => $details] );
            }else{
                return redirect()->back()->with('message', 'Password is wrong!');
            }
        }else {
            return redirect()->back()->with('message', 'Username doesnot exists!');
        }

    }

    public function update($id, Request $request)
    {
        UserDetails::where('id', $id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'email' => $request->email,
            'dob' => $request->dob,
        ]);

        $details = User::with('details')->where('username', $request->username)->first();

        return view('pages.profile', ['user' => $details] );
    }


    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('pages.profile');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function store(Request $request) {
 
        $password = $request->password;
        $confirm_password = $request->confirm_password;

        $otp = mt_rand(100000,999999); 

        if($password == $confirm_password)
        {
            $name = $request->name;
            $email = $request->email;
            $user_details = new UserDetails;
            $user_details->name = $name;
            $user_details->email = $email;
            $user_details->dob = $request->dob;
            $user_details->city = $request->city;
            $user_details->save();

            $user = new User;
            $user->username = $request->username;
            $user->password = bcrypt($password);
            $user->user_details_id = $user_details->id;
            $user->otp = $otp;
            $user->save();

            $this->mail_function($email, $name, $otp);

            return view('pages.verify', ['id' => $user->id]);
        }

        return redirect('/register');
    }

    public function resendotp($id) {
        $user = User::with('details')->where('id', $id)->first();

        $email = $user->details->email;
        $name = $user->details->name;
        $otp = $user->otp;
        $this->mail_function($email, $name, $otp);
        return view('pages.verify', ['id' => $id]);
    }

    public function accountVerify(Request $request) {
        $id = $request->id;
        $otp = $request->otp;
        $userQuery = User::with('details')->where('id', $id);
        $correct_otp = $userQuery->value('otp');
        if($otp == $correct_otp){
            $userQuery->update([
                'email_verified_at' => date('Y-m-d')
            ]);
            $details = $userQuery->first();
            return view('pages.profile', ['user' => $details] ); 
        }

        return view('pages.verify', ['id' => $id]); 
    }

    public function mail_function($email, $name, $otp) {

        $mail = new PHPMailer(true);

        try {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'jishkrish30@gmail.com';                     // SMTP username
            $mail->Password   = 'laravel123@';                               // SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('jishkrish30@gmail.com', 'Mailer');
            $mail->addAddress($email, $name);     // Add a recipient
            $mail->addReplyTo('jishkrish30@gmail.com', 'Information');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'OTP Confirmation';
            $mail->Body    = 'your otp is '.$otp;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // dd($mail);

            $mail->send();
            // echo 'Message has been sent';
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return ;
    }



}
