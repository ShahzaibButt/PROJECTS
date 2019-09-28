<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;


// Models
use App\Voter;
use App\Na_candidate;
use App\Pa_candidate;
use App\User;
use App\Party;

class AdminController extends Controller
{
    public function login(Request $request){

        $error = '';
        if($request->session()->get($error)){
            $error = $request->session()->get($error);
        }

        return view('login')->with('error', $error);
    }

    public function signup(Request $request){

        $username = $request->input('username');
        $password = md5($request->input('password'));

        $user = User::where('USER_NAME',$username)->first();
        
        if($user){
            $userArr = array(
                'username' => $user['USER_NAME'],
                'password' => $user['USER_PASSWORD']
            );
            
            // Creating Session
            $request->session()->put('admin', $userArr);
            
            if($userArr['username'] == $username && $userArr['password'] == $password){

                // redirection
                return redirect()->action('AdminController@dashboard');
            }
        }
        else{
            $error = 'Invalid Admin Credentials';
            $request->session()->put('error', $error);
            return redirect()->action('AdminController@login');
        }
        
    }

    public function dashboard(Request $request){

        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        return view('dashboard');
    }

    public function profile(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        return view('profile');
    }

    public function addCandidateForm(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        return view('addCandidate');
    }

    public function addCandidate(Request $request){ 
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $Na_candidate = new Na_candidate;
        $Pa_candidate = new Pa_candidate;

        $pa = $request->input('pa');
        $na = $request->input('na');

        if($pa != '' and $na != ''){

            $Na_candidate->CANDIDATE_FIRST_NAME = $request->input('first_name');
            $Na_candidate->CANDIDATE_LAST_NAME = $request->input('last_name');
            $Na_candidate->CANDIDATE_PARTY = $request->input('party');
            $Na_candidate->NA_CONSTITUENCY = $request->input('na');
            $Na_candidate->CANDIDATE_CNIC = $request->input('cnic');
            $Na_candidate->CANDIDATE_GENDER = $request->input('gender');
            $Na_candidate->PROVINCE = $request->input('state');

            $Pa_candidate->CANDIDATE_FIRST_NAME = $request->input('first_name');
            $Pa_candidate->CANDIDATE_LAST_NAME = $request->input('last_name');
            $Pa_candidate->CANDIDATE_PARTY = $request->input('party');
            $Pa_candidate->PA_CONSTITUENCY = $request->input('pa');
            $Pa_candidate->CANDIDATE_CNIC = $request->input('cnic');
            $Pa_candidate->CANDIDATE_GENDER = $request->input('gender');
            $Pa_candidate->PROVINCE = $request->input('state');

            if($Na_candidate->save() and $Pa_candidate->save()){
                return redirect()->action('AdminController@Na_candidate'); 
            }
        }
        else if($na != ''){

            $Na_candidate->CANDIDATE_FIRST_NAME = $request->input('first_name');
            $Na_candidate->CANDIDATE_LAST_NAME = $request->input('last_name');
            $Na_candidate->CANDIDATE_PARTY = $request->input('party');
            $Na_candidate->NA_CONSTITUENCY = $request->input('na');
            $Na_candidate->CANDIDATE_CNIC = $request->input('cnic');
            $Na_candidate->CANDIDATE_GENDER = $request->input('gender');
            $Na_candidate->PROVINCE = $request->input('state');

            if($Na_candidate->save()){
                return redirect()->action('AdminController@Na_candidate'); 
            }

        } 
        else if($pa != ''){
            $Pa_candidate->CANDIDATE_FIRST_NAME = $request->input('first_name');
            $Pa_candidate->CANDIDATE_LAST_NAME = $request->input('last_name');
            $Pa_candidate->CANDIDATE_PARTY = $request->input('party');
            $Pa_candidate->PA_CONSTITUENCY = $request->input('pa');
            $Pa_candidate->CANDIDATE_CNIC = $request->input('cnic');
            $Pa_candidate->CANDIDATE_GENDER = $request->input('gender');
            $Pa_candidate->PROVINCE = $request->input('state');

            if($Pa_candidate->save()){
                return redirect()->action('AdminController@Pa_candidate'); 
            }
        }        
        else{
            return 'not success';
        }
    }

    public function Na_candidate(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $Na_candidates = Na_candidate::all();

        return view('Na_candidate')->with('Na_candidates', $Na_candidates);
    }

    public function Pa_candidate(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $Pa_candidates = Pa_candidate::all();

        return view('Pa_candidate')->with('Pa_candidates', $Pa_candidates);
    }

    public function voter(Request $request){

        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $voters = Voter::all();

        return view('voter')->with('voters', $voters);
    }

    public function addVoterForm(Request $request){

        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        return view('addVoter');
    }

    public function addVoter(Request $request){

        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $voter = new Voter;

        $voter->FIRST_NAME = $request->input('first_name');
        $voter->LAST_NAME = $request->input('last_name');
        $voter->FATHER_NAME = $request->input('father_name');
        $voter->VOTER_CNIC = $request->input('cnic');
        $voter->ADDRESS = $request->input('address');
        $voter->BIRTH_DATE = $request->input('dob');
        $voter->AGE = $request->input('age');
        $voter->CITY = $request->input('city');
        $voter->PROVINCE = $request->input('state');
        $voter->NATIONALITY = $request->input('nationality');
        $voter->GENDER = $request->input('gender');
        $voter->NA_CONSTITUENCY = $request->input('na');
        $voter->PA_CONSTITUENCY = $request->input('pa');
        $voter->FINGERPRINT = $request->input('f_template');

        if($voter->save()){
            return redirect()->action('AdminController@voter'); 
        }
    }

    public function editVoter(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $id= $request->input('cnic');
        $voter = Voter::where('VOTER_CNIC', $id)->first();

        if($voter){
            
            // Generating Session 
            $userArr = array(
            'cnic' => $voter['VOTER_CNIC'],
            'firstName' => $voter['FIRST_NAME'],
            'lastName' => $voter['LAST_NAME'],
            'fatherName' => $voter['FATHER_NAME'],
            'address' => $voter['ADDRESS'],
            'birthdate' => $voter['BIRTH_DATE'],
            'age' => $voter['AGE'],
            'city' => $voter['CITY'],
            'nationality' => $voter['NATIONALITY'],
            'province' => $voter['PROVINCE'],
            'gender' => $voter['GENDER'],
            'naConst' => $voter['NA_CONSTITUENCY'],
            'psConst' => $voter['PA_CONSTITUENCY'],
            'voted' => $voter['VOTED'],
            );
            return view('editVoter')->with('voter', $userArr);
        }
        else{
            return redirect()->action('AdminController@addVoterForm');
        }

        
    }

    public function updateVoter(Request $request){

        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        try{
            $voter = Voter::where('VOTER_CNIC', $request->input('cnic'))
                        ->update(
                            [
                                'FIRST_NAME' => $request->input('first_name'),
                                'LAST_NAME' => $request->input('last_name'),
                                'FATHER_NAME' => $request->input('father_name'),
                                'VOTER_CNIC' => $request->input('cnic'),
                                'ADDRESS' => $request->input('address'),
                                'BIRTH_DATE' => $request->input('dob'),
                                'AGE' => $request->input('age'),
                                'CITY' => $request->input('city'),
                                'PROVINCE' => $request->input('state'),
                                'NATIONALITY' => $request->input('nationality'),
                                'GENDER' => $request->input('gender'),
                                'NA_CONSTITUENCY' => $request->input('na'),
                                'PA_CONSTITUENCY' => $request->input('pa')
                            ]
                        );
            return redirect()->action('AdminController@voter');
        } catch (Exception $e) {
            report($e);

            return false;
        }

    }

    public function deleteVoter(Request $request){
        
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        try{
            $voter = Voter::where('VOTER_CNIC', $request->input('cnic'))->delete();

            return redirect()->action('AdminController@voter');

        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public function editCandidate(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        $na = Na_candidate::where('CANDIDATE_CNIC', $request->input('cnic'))->first();
        $pa = Pa_candidate::where('CANDIDATE_CNIC', $request->input('cnic'))->first();

        if($na and $pa){
    
            $userArr = array(
                'firstName' => $na['CANDIDATE_FIRST_NAME'],
                'lastName' => $na['CANDIDATE_LAST_NAME'],
                'party' => $na['CANDIDATE_PARTY'],
                'gender' => $na['CANDIDATE_GENDER'],
                'cnic' => $na['CANDIDATE_CNIC'],
                'state' => $na['PROVINCE'],
                'na' => $na['NA_CONSTITUENCY'],
                'pa' => $pa['PA_CONSTITUENCY']
            );

            return view('editCandidate')->with('candidate', $userArr);
        } 
        else if($pa){
            $userArr = array(
                'firstName' => $pa['CANDIDATE_FIRST_NAME'],
                'lastName' => $pa['CANDIDATE_LAST_NAME'],
                'party' => $pa['CANDIDATE_PARTY'],
                'gender' => $pa['CANDIDATE_GENDER'],
                'cnic' => $pa['CANDIDATE_CNIC'],
                'state' => $pa['PROVINCE'],
                'pa' => $pa['PA_CONSTITUENCY'],
                'na' => $pa['NA_CONSTITUENCY']
            );
            return view('editCandidate')->with('candidate', $userArr);
        }
        else if($na){
            $userArr = array(
                'firstName' => $na['CANDIDATE_FIRST_NAME'],
                'lastName' => $na['CANDIDATE_LAST_NAME'],
                'party' => $na['CANDIDATE_PARTY'],
                'gender' => $na['CANDIDATE_GENDER'],
                'cnic' => $na['CANDIDATE_CNIC'],
                'state' => $na['PROVINCE'],
                'na' => $na['NA_CONSTITUENCY'],
                'pa' => $pa['PA_CONSTITUENCY']
            );
            return view('editCandidate')->with('candidate', $userArr);
        }
        else{
            return redirect()->action('AdminController@addCandidateForm');
        }
    }

    public function updateCandidate(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        $na = Na_candidate::where('CANDIDATE_CNIC', $request->input('cnic'))
            ->update(
                [
                'CANDIDATE_FIRST_NAME' => $request->input('firstName'),
                'CANDIDATE_LAST_NAME'  => $request->input('lastName'),
                'CANDIDATE_PARTY'      => $request->input('party'),
                'CANDIDATE_GENDER'     => $request->input('gender'),
                'CANDIDATE_CNIC'       => $request->input('cnic'),
                'PROVINCE'             => $request->input('state'),
                'NA_CONSTITUENCY'      => $request->input('na')
                ]
                );

        $pa = Pa_candidate::where('CANDIDATE_CNIC', $request->input('cnic'))
            ->update(
                [
                    'CANDIDATE_FIRST_NAME' => $request->input('firstName'),
                    'CANDIDATE_LAST_NAME'  => $request->input('lastName'),
                    'CANDIDATE_PARTY'      => $request->input('party'),
                    'CANDIDATE_GENDER'     => $request->input('gender'),
                    'CANDIDATE_CNIC'       => $request->input('cnic'),
                    'PROVINCE'             => $request->input('state'),
                    'PA_CONSTITUENCY'      => $request->input('pa')
                ]
                );
        if($na or $pa){
            if($na)
                return redirect()->action('AdminController@Na_candidate');
            else
                return redirect()->action('AdminController@Pa_candidate');
        }
        else{
            return "Error";
        }

    }

    public function deleteCandidate(Request $request){
        
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        try{
            $na = Na_candidate::where('CANDIDATE_CNIC', $request->input('cnic'))->delete();
            // delete function not working with pa
            //$pa = Pa_candidate::where('CANDIDATE_CNIC', $request->input('cnic'))->delete();

                return redirect()->action('AdminController@Na_candidate');

        } catch (Exception $e) {
            report($e);

            return false;
        }
    }

    public function result(Request $request){

        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        $partyArrName = array();
        $partyArrVotes = array();

        $parties = Party::select('PARTY_NAME', 'PARTY_VOTES')->get();
        
        foreach($parties as $party) {
            array_push($partyArrName,$party['PARTY_NAME']);
            array_push($partyArrVotes, $party['PARTY_VOTES']);
        }
        
        $data = array(
            'partyArrName' => $partyArrName,
            'partyArrVotes' => $partyArrVotes
        );
        
        return view('result')->with($data);
    }

    public function logout(Request $request){
        
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        // Destroying the session
        $request->session()->forget('admin');

        return redirect()->action('AdminController@login');
    }

    public function getBallotPaper(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        $parties = Party::all();

        return view('ballotPaper')->with('parties', $parties);
    }

    public function addBallotPaper(Request $request){
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');

        if($request->hasFile('flag') && $request->hasFile('ElectFlag')){
            // Get filename with the extension
            $FlagNameWithExt = $request->file('flag')->getClientOriginalName();
            $ElectFlagNameWithExt = $request->file('ElectFlag')->getClientOriginalName();

            // Get just filename
            $FlagName = pathinfo($FlagNameWithExt, PATHINFO_FILENAME);
            $ElectFlagName = pathinfo($ElectFlagNameWithExt, PATHINFO_FILENAME);

            // Get just ext
            $FlagExtension = $request->file('flag')->getClientOriginalExtension();
            $ElectFlagExtension = $request->file('ElectFlag')->getClientOriginalExtension();

            // Filename to store
            $flagNameToStore= $FlagName.'_'.time().'.'.$FlagExtension;
            $electFlagNameToStore= $ElectFlagName.'_'.time().'.'.$ElectFlagExtension;

            $request->file('flag');
            $request->file('ElectFlag');

            // Upload Image
            $FlagPath = $request->flag->move('public/flag_images', $flagNameToStore);
            $ElectFlagPath = $request->ElectFlag->move('public/Elect_flag_images', $electFlagNameToStore);
        }
        else{
            $flagNameToStore = 'noFile.jpg';
            $electFlagNameToStore = 'noFile.jpg';
        }

        $newParty = new Party();

        $newParty->PARTY_NAME = $request->input('partyName');
        $newParty->PARTY_ELECTORIAL_SIGN = $electFlagNameToStore;
        $newParty->PARTY_FLAG = $flagNameToStore;

        if($newParty->save()){
            return redirect()->action('AdminController@getBallotPaper');
        }
        else{
            return 'not success';
        }

    }

    public function users(Request $request){
        
        if(!$request->session()->get('admin'))
            return redirect()->action('AdminController@login');
        
        return view('user');
    }


    // public function signUp(){
    //     $user = new User;
    //     $user->USER_ID = '1';
    //     $user->USER_NAME = 'admin';
    //     $user->USER_PASSWORD = mdf('admin');
    //     $user->USER_ROLE = 'admin';
    //     $user->save();

    //     return view('login')->with('success');
        
    // }
}
