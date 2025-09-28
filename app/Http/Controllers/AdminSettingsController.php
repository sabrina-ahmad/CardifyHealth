<?php

namespace App\Http\Controllers;

use App\Models\AdminSettings;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function index()
    {
        // Get existing setting or create new one with default value
        $adminSetting = AdminSettings::firstOrCreate([], [
            'payment_method' => 'off'
        ]);

        // Pass the current payment method to the view
        return view('admin.settings', [
            'payment_method' => $adminSetting->payment_method
        ]);
    }

    public function createOrUpdate(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'payment_method' => ['required', 'string', 'in:on,off']
        ]);

        // Convert empty string to 'off'
        $paymentMethodValue = $validatedData['payment_method'] ?? 'off';

        // Get existing record or create new one
        $adminSetting = AdminSettings::firstOrCreate([], []);
        $adminSetting->update(['payment_method' => $paymentMethodValue]);

        return back()->with('success', 'Payment method updated successfully');
    }
}
