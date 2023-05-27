<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class MessageController extends Controller
{
   
    public function sendReplay(Request $request, $id)
{
    // Validate the reply input
    $validatedData = $request->validate([
        'reply' => 'required|string',
    ]);

    Session::flash('success', 'Reply sent successfully.');

    // Redirect back to the previous page
    $message= contacts::all();
return view("messages",['message'=>$message])->with('success', 'Reply sent successfully.');
    
}
    public function replay($id)
    {
        $m = contacts::all();
        foreach ($m as $message) {
            if ($message->id == $id) {
               
                break;
            } else {
                $message = 0;
            }
        }
        
        // Implement your logic to handle the reply functionality
        // For example, you can pass the $message object to a view for composing the reply
        return view('replay', compact('message'));
    }

    public function delete($id)
    {
        $m = contacts::all();
        foreach ($m as $message) {
            if ($message->id == $id) {
               
                break;
            } else {
                $message = 0;
            }
        }
        if ($message) {
            $message->delete();
            return redirect()->back()->with('success', 'Message deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Message not found.');
        }
    }
}
