<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mails;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventeeMail;
use App\User;
use Mailgun\Mailgun;
use App\Event;
use App\UserSubtype;
use Illuminate\Support\Facades\Auth;


class MailController extends Controller
{
    //
    public function index($id){
        $mails = Mails::where('event_id',$id)->orderBy('id','desc')->paginate(5);
        return view('eventee.mails.index',compact('id','mails'));
    }
    public function create($id){
        $usersAttendee = User::where('event_id',$id)->where('type','attendee')->get();
        $usersExibitor = User::where('event_id',$id)->where('type','exhibiter')->get();
        $usersDelegate = User::where('event_id',$id)->where('type','delegate')->get();
        $subtypes = UserSubtype::where('event_id',$id)->get();
        return view('eventee.mails.create',compact('id','usersAttendee','usersExibitor','usersDelegate','subtypes'));

    }

    public function send(Request $req,$id){
        if(empty($req->subject)){
            flash("Subject Field Cannot Be Empty")->error();
            return redirect()->back();
        }
        elseif(empty($req->message)){
            flash("Message Field Cannot Be Empty")->error();
            return redirect()->back();
        }
        $first_type = $req->sent_to_type;
        $subject = $req->subject;
        $message = $req->message;
        $event = Event::findOrFail($id);
        if($first_type == 0){
            $users = User::where('event_id',$id)->get();

            foreach($users as $user){
                // return view("emails.eventee")->with(['event'=>$event->name,'subject'=>$subject,'message'=>$message,'user'=>$user]);
                // return new EventeeMail($event->name,$subject,$message);
               Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
            }
            $mail = new Mails;
            $mail->event_id = $id;
            $mail->sender_id = Auth::id();
            $mail->sent_to = 'All';
            $mail->subject = $subject;
            $mail->message = $message;
            $mail->save();
            flash("Mail Sent To ALL")->success();
            return redirect()->route('eventee.mail',$id);
        }
        elseif($first_type == 1){
             if($req->sent_to_type_specific == 0){
                $users = $req->sent_to_type_exibitor;
                $names = [];
                for($i = 0; $i < count($users); $i++){
                    $user = User::findOrFail($users[$i]);
                    array_push($names,$user->name);
                    Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
                }
                $mail = new Mails;
                $mail->event_id = $id;
                $mail->sender_id = Auth::id();
                $mail->sent_to = implode(',',$names);
                $mail->subject = $subject;
                $mail->message = $message;
                $mail->save();
                flash("Mail Sent To Exibitors")->success();
                return redirect()->route('eventee.mail',$id);
             }
             elseif($req->sent_to_type_specific == 1){
                $users = $req->sent_to_type_delegate;
                $names = [];
                for($i = 0; $i < count($users); $i++){
                    $user = User::findOrFail($users[$i]);
                    array_push($names,$user->name);
                    Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
                }
                $mail = new Mails;
                $mail->event_id = $id;
                $mail->sender_id = Auth::id();
                $mail->sent_to = implode(',',$names);
                $mail->subject = $subject;
                $mail->message = $message;
                $mail->save();
                flash("Mail Sent To Delegates")->success();
                return redirect()->route('eventee.mail',$id);
             }
             elseif($req->sent_to_type_specific == 2) {
                $users = $req->sent_to_type_attendee;
                $names = [];
                for($i = 0; $i < count($users); $i++){
                    $user = User::findOrFail($users[$i]);
                    array_push($names,$user->name);
                    Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
                }
                $mail = new Mails;
                $mail->event_id = $id;
                $mail->sender_id = Auth::id();
                $mail->sent_to = implode(',',$names);
                $mail->subject = $subject;
                $mail->message = $message;
                $mail->save();
                flash("Mail Sent To Attendees")->success();
                return redirect()->route('eventee.mail',$id);
                
             }
             elseif($req->sent_to_type_specific == 3) {
                $subtypes = $req->sent_to_type_subtype;
                for($i = 0; $i < count($subtypes); $i++){
                    $users = User::where('subtype',$subtypes)->where('event_id',$id)->get();
                    if(count($users)>0){
                        foreach($users as $user){
                            Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
                        }
                    }
                    
                   
                }
                flash("Mail Sent To All Selcted Sub Types")->success();
                return redirect()->route('eventee.mail',$id);
                
             }
        }
        elseif($first_type == 2){
            $users = User::where('event_id',$id)->where('type','exhibiter')->get();

            foreach($users as $user){
                // return view("emails.eventee")->with(['event'=>$event->name,'subject'=>$subject,'message'=>$message,'user'=>$user]);
                // return new EventeeMail($event->name,$subject,$message);
               Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
            }
            $mail = new Mails;
            $mail->event_id = $id;
            $mail->sender_id = Auth::id();
            $mail->sent_to = 'All Exibiter';
            $mail->subject = $subject;
            $mail->message = $message;
            $mail->save();
            flash("Mail Sent To ALL")->success();
            return redirect()->route('eventee.mail',$id);
        }
        elseif($first_type == 3){
            $users = User::where('event_id',$id)->where('type','delegate')->get();

            foreach($users as $user){
                // return view("emails.eventee")->with(['event'=>$event->name,'subject'=>$subject,'message'=>$message,'user'=>$user]);
                // return new EventeeMail($event->name,$subject,$message);
               Mail::to($user->email)->send(new EventeeMail($event->name,$subject,$message,$user));
            }
            $mail = new Mails;
            $mail->event_id = $id;
            $mail->sender_id = Auth::id();
            $mail->sent_to = 'All Delegate';
            $mail->subject = $subject;
            $mail->message = $message;
            $mail->save();
            flash("Mail Sent To ALL")->success();
            return redirect()->route('eventee.mail',$id);
        }
        elseif($first_type == 4){
            $users = User::where('event_id',$id)->where('type','attendee')->get();

            foreach($users as $user){
                // return view("emails.eventee")->with(['event'=>$event->name,'subject'=>$subject,'message'=>$message,'user'=>$user]);
                // return new EventeeMail($event->name,$subject,$message);
               Mail::to($user->email)->send(new EventeeMail($event,$subject,$message,$user));
            }
            $mail = new Mails;
            $mail->event_id = $id;
            $mail->sender_id = Auth::id();
            $mail->sent_to = 'All Attendee';
            $mail->subject = $subject;
            $mail->message = $message;
            $mail->save();
            flash("Mail Sent To ALL")->success();
            return redirect()->route('eventee.mail',$id);
        }
    }
}
