<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
class AppointmentController extends Controller
{
    public function book(Request $request, $homeId)
    {
        // Validate input
        $request->validate([
            'date' => 'required|date',
            'time' => 'required'
        ]);

        // Save the appointment
        Appointment::create([
            'home_id' => $homeId,
            'user_id' => auth()->id(),
            'date' => $request->date,
            'time' => $request->time
        ]);

        return response()->json(['success' => true]);
    }


    public function cancel($homeId)
    {
        // Find and delete the appointment
        $appointment = Appointment::where('home_id', $homeId)
                                   ->where('user_id', auth()->id())
                                   ->first();
    
        if ($appointment) {
            $appointment->delete();
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false, 'message' => 'No appointment found']);
    }
    
    public function getBookedTimes($homeId)
    {
        $appointments = Appointment::where('home_id', $homeId)->get(['date', 'time']);
        return response()->json($appointments);
    }
    

  
    


}
