<?php namespace App\Http\Controllers;

use App\XKCDPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class XkcdPasswordController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Delete an XKCDPassword
     */
    public function destroy(Request $request)
    {
        XKCDPassword::findOrFail($request->xkcdpassword)->delete();

        return redirect('/xkcdpasswords');
    }
    /**
     * List all XKCDPasswords
     */
    public function show(Request $request)
    {
        $xkcdpasswords = XKCDPassword::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->get();

        return view('layouts.xkcd_passwords', [
            'xkcdpasswords' => $xkcdpasswords
        ]);
    }
    /**
     * List one XKCDPassword
     */
    public function show_one(Request $request)
    {
        $xkcdpassword = XKCDPassword::findOrFail($request->xkcdpassword);

        return view('layouts.xkcd_password', [
            'xkcdpassword' => $xkcdpassword
        ]);
    }
    /**
     * Update one XKCDPassword
     */
    public function update(Request $request)
    {
        $xkcdpassword = XKCDPassword::findOrFail($request->xkcdpassword);

        $xkcdpassword->password = $_POST["updated_password"];
        $xkcdpassword->save();

        return view('layouts.xkcd_password', [
            'xkcdpassword' => $xkcdpassword
        ]);
    }
    public function main(Request $request)
    {
        return view('layouts.xkcd_generator');
    }
    /**
     * Generate a password based off the guidelines of an xkcd comic
     */
	public function create(Request $request)
    {
        $v = Validator::make($request->all(),
            [
                'numWords' => 'required|integer|between:1,100',
                'numIncluded' => 'required_if:numIncludeChecked,true|integer|between:0,1000000',
                'symbolIncluded' => 'required_if:symbolIncludeChecked,true|in:!,@,#,$,%,^'
            ]
        );

        if ($v->fails()){
            echo json_encode(array("Error" => $v->errors()));
            return;
        }
        else {
            new PasswordGen($request, "data/words.txt");
        }
    }

}

class PasswordGen {
    private $base_pass = null;
    private $words = null;
    function __construct($data, $filename) {
        /**
        Read words array from file, and validate GET data upon class instantiation
         */
        # Read words into array from file
        $this->words = file($filename, FILE_IGNORE_NEW_LINES);

        # If we reach here data is deemed O.K. and we continue to make a pass.
        $this->make_password($data);
    }

    public function make_password($data){
        /**
        Public method to generate an xkcd-like password
         */
        foreach (range(1, $data['numWords']) as $i)
        {
            $rand_key = array_rand($this->words, 1);
            if ($i==1) {
                $this->base_pass = $this->base_pass . $this->words[$rand_key];
            }
            else{
                $this->base_pass = $this->base_pass . "-" . $this->words[$rand_key];
            }
        }
        $pass = $this->base_pass;
        if ($data['numIncludeChecked'] == "true") {
            $pass = $pass . $data['numIncluded'];
        }
        if ($data['symbolIncludeChecked'] == "true") {
            $pass = $pass . $data['symbolIncluded'];
        }
        $data->user()->xkcdpasswords()->create([
            'password' => $pass,
        ]);

        echo $pass;
    }
} # eoc