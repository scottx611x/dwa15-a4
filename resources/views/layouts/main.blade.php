
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/get.js') }}"></script>

    <div class="container">
        <h1>xkcd password generator</h1>
        <a href="https://xkcd.com/936/">
            <img class="xkcd-img" src="https://imgs.xkcd.com/comics/password_strength.png"/>
        </a>
        <br><br>
        <div class="inputs form-group">
            <label>Number of words for password generation <br><input type="number" id='numWords'/></label>
            <br>
            <label>
                Include a number: <input id='numIncludeChecked' type="checkbox" data-toggle="switch" value="true"/>

                <div id="number-input">
                    <label>Number to include in password:</label>
                    <input type="number" id='numIncluded' value="0"/>
                </div>
            </label>
            <label>
                Include a symbol: <input id='symbolIncludeChecked' type="checkbox" data-toggle="switch" value="true"/>

                <div id="symbol-input">
                    <label>Symbol to include in password:</label>
                    <select id='symbolIncluded'>
                        <option>!</option>
                        <option>@</option>
                        <option>#</option>
                        <option>$</option>
                        <option>%</option>
                        <option>^</option>
                    </select>
                </div>
            </label>
            <br>
        </div>
        <button id="submit" class="btn btn-primary">Generate Password</button>
    </div>
    <div id="generated-password" class="modal fade alert-success password-display">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Your Password is:</h4>
        </div>
        <br>
        <div id="pass-container" class="modal-body">
        </div>
    </div>

    <div id="generated-error" class="modal fade alert-danger error-display">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Something bad happened:</h4>
        </div>
        <br>
        <div id="error-container" class="modal-body">
        </div>
    </div>
