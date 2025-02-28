<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ride;
use Illuminate\Support\Facades\Hash;  
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    
    public function loginnn(Request $request)
    {
        //dd('muchai');
        $request->validate([
            'phone' => 'required|exists:users,phone',
            'password' => 'required|digits:4',
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'Invalid PIN.']);
    }

    public function registerrr(Request $request)
    {
        //dd('james mm');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mobile' => 'required|unique:users,phone|max:15',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required', 'string','max:255'],
            'county' => ['required', 'string','max:255'],
            'subcounty' => ['required', 'string','max:255'],
            'password' => ['required', 'digits:4', 'confirmed'],
        ]);
        //dd('james mm');
        User::create([
            'name' => $request->name,
            'phone' => $request->mobile,
            'email' => $request->email,
            'role' => $request->role,
            'county' => $request->county,
            'subcounty' => $request->subcounty,
            'password' => Hash::make($request->password),
        ]);
        //dd('james mm');
        return redirect()->route('login')->with('success', 'Account created successfully!');
    }

    public function dashboard(){

        $driversCount = User::where('role', 'driver')->count();
        $customersCount = User::where('role', 'customer')->count();

        return view('admin.index', compact('driversCount', 'customersCount'));
    }

    public function customersfilter(Request $request){

         // Get all customers, ordered by registration date (latest first)
         $query = User::where('role', 'customer')->orderBy('created_at', 'desc');

         // Filter by specific registration date if provided
         if ($request->has('date') && !empty($request->date)) {
             $query->whereDate('created_at', $request->date);
         }
 
         $customers = $query->paginate(10); // Paginate results
 
         return view('admin.customer', compact('customers'));

    }

    public function customer(Request $request){

        // Get all customers, ordered by registration date (latest first)
        $query = User::where('role', 'customer')->orderBy('created_at', 'desc');

        // Filter by specific registration date if provided
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('created_at', $request->date);
        }

        $customers = $query->paginate(10); // Paginate results


        return view('admin.customer', compact('customers'));
    }

    public function logout(Request $request)
    {
       
        User::where('id', Auth::user()->id)->update(['logout_time' => now()]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginnn');
    }

    public function drivers(Request $request){

         // Fetch only users with role = 'driver' and order by latest registered
         $query = User::where('role', 'driver')->orderBy('created_at', 'desc');

         // Filter by county
         if ($request->has('county') && !empty($request->county)) {
             $query->where('county', $request->county);
         }
 
         // Filter by sub-county
         if ($request->has('sub_county') && !empty($request->sub_county)) {
             $query->where('subcounty', $request->sub_county);
         }
 
         // Retrieve filtered drivers
         $drivers = $query->get();
 
         // Get distinct counties and sub-counties where role = 'driver'
         $counties = User::where('role', 'driver')->select('county')->distinct()->pluck('county');
         $subCounties = User::where('role', 'driver')->select('subcounty')->distinct()->pluck('subcounty');
         //dd($subCounties);

        return view('admin.driver', compact('drivers', 'counties', 'subCounties'));
    }

    public function driversindex(Request $request){

         // Fetch only users with role = 'driver' and order by latest registered
        $query = User::where('role', 'driver')->orderBy('created_at', 'desc');

        // Filter by county
        if ($request->has('county') && !empty($request->county)) {
            $query->where('county', $request->county);
        }

        // Filter by sub-county
        if ($request->has('sub_county') && !empty($request->sub_county)) {
            $query->where('subcounty', $request->sub_county);
        }

        // Retrieve filtered drivers
        $drivers = $query->get();

        // Get distinct counties and sub-counties where role = 'driver'
        $counties = User::where('role', 'driver')->select('county')->distinct()->pluck('county');
        $subCounties = User::where('role', 'driver')->select('subcounty')->distinct()->pluck('subcounty');

        return view('admin.driver', compact('drivers', 'counties', 'subCounties'));

    }

    public function ride(){

        $customers = User::where('role', 'customer')->select('name')->distinct()->get();
        return view('admin.ride', compact('customers'));
    }

    public function riderequest(){
        
        $rides = Ride::with('user')->get(); // Eager load the user relationship
        return view('admin.viewride', compact('rides')); 
    }

    public function storeride(Request $request){

        $request->validate([
            'customer' => 'required',
            'point' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ]);

         // Check if user selected "Other" and entered a new name
         if ($request->customer === 'other' && !empty($request->new_customer)) {
            // Check if the customer already exists in the users table
            $customer = User::where('name', $request->new_customer)->first();

            // If customer does not exist, create a new user
            if (!$customer) {
                $customer = User::create([
                    'name' => $request->new_customer,
                    'role' => 'customer', // Assuming the role column exists
                ]);
            }
        } else {
            // Retrieve the existing customer from the users table
            $customer = User::where('name', $request->customer)->first();
        }

         // Save the ride record
         Ride::create([
            'user_id' => $customer->id,
            'point' => $request->point,
            'destination' => $request->destination,
        ]);

        return redirect()->back()->with('success', 'Ride requested successfully!');
    }
}
