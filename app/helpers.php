<?php 

use App\Models\Amenitie;
use App\Models\BookProperty;
use Carbon\Carbon;
use App\Models\ApplicationSetting;

function gs(){
    $setting = ApplicationSetting::latest()->first();
    return $setting;
}

function formatDate($date){
    $formattedDate = Carbon::parse($date)->format('d M Y');
    return $formattedDate;
}

function getAmenitieName($id){
    $amenitie = Amenitie::find($id);
    return $amenitie->name;
}


function getPropertyTitle($bookid){
    $booking = BookProperty::with('property')->where('id',$bookid)->first();
    return $booking->property->title ?? '';
}

function formatCurrency($amount)
{
    // Assuming you always want to format the amount with 2 decimal places
    return '$' . number_format($amount, 2);
}