<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class messageController extends Controller
{
    //__ index__//
    public function index(){
        $message = DB::table('messages')->orderBy('id', 'desc')->get();
        return view('admin.message.index',compact('message'));
    }

    //__ Destroy__//
    public function destroy($id){
        DB::table('messages')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted The Message');
    }

    //__View__//
    public function view($id){
        $message = DB::table('messages')->where('id',$id)->first();
        if ($message) {
            DB::table('messages')->where('id', $id)->update([
                'is_read' => 1,
                'updated_at' => now(),
            ]);
            $message->is_read = 1;
        }
        return view('admin.message.view',compact('message'));
    }

    public function reply(Request $request, $id)
    {
        $validated = $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string|max:5000',
        ]);

        $message = DB::table('messages')->where('id', $id)->first();
        if (! $message) {
            return redirect()->back()->with('error', 'Message not found.');
        }

        $replySubject = trim($validated['reply_subject']);
        $replyMessage = trim($validated['reply_message']);

        try {
            Mail::raw($replyMessage, function ($mail) use ($message, $replySubject) {
                $mail->to($message->email)
                    ->subject($replySubject);
            });
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Mail send failed. Please check MAIL settings.');
        }

        DB::table('messages')->where('id', $id)->update([
            'is_read' => 1,
            'reply_subject' => $replySubject,
            'reply_message' => $replyMessage,
            'replied_at' => now(),
            'replied_by' => Auth::id(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Reply sent to user email successfully.');
    }

    public function markAllRead()
    {
        DB::table('messages')
            ->where('is_read', 0)
            ->update([
                'is_read' => 1,
                'updated_at' => now(),
            ]);

        return redirect()->back()->with('success', 'All messages marked as read.');
    }
}
