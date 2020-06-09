<?php
require('functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Przelew</title>
</head>
<body>
<form action="transfer_confirm.php" method="post">
    <?php
    $id=$_SESSION['id'];
    require_once('connect.php');
    $sql = "SELECT * FROM `produkty_klienci` where id_klienta=$id AND id_produktu=1";
    $result = mysqli_query($conn,$sql);
    echo "<select name=\"number\">";
        while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        echo "<option value='" . $row['numer_rachunku'] . "'>" . $row['numer_rachunku']." - dostępne środki:".dostepne_srodki($row['numer_rachunku']) ."zł"." </option>";
        }
        echo "</select>";
    ?>
    <?php
    if(isset($_POST['number'])){
        $account =  $_POST['number'];
        $_SESSION['number'] = $account;
    }
    $sender=$_SESSION['username'];
    ?>
    <div>
        <label for="credit-card">Numer konta odbiorcy</label>
        <input id="credit-card" name="credit-card" type="text" autocomplete="off" />
    </div>
    Kwota
    <input type="number" name="amount" min="0.00" step="0.01" id="amount"required/>
    <br/>
    Nazwa odbiorcy
    <input type="text" name="receiver_name" id="amount"required/>
    <br/>
    Tytuł przelewu
    <input type="text" name="title" min="0.00" step="0.01" id="amount"required/>
    <br/>
    Data wykonania przelewu
    <input id="datefield" type='date' name='date' min='2020-06-01' max='2020-12-31'></input>
    <script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }
        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("datefield").setAttribute("min", today);
     </script>
    <br/>
    <button type="submit" name="submit" value="submit">Przejdź do podsumowania</button>
</form>
</body>
<script type="text/javascript">
    input_credit_card = function(input) {
        var format_and_pos = function(char, backspace) {
            var start = 0;
            var end = 0;
            var pos = 0;
            var separator = " ";
            var value = input.value;

            if (char !== false) {
                start = input.selectionStart;
                end = input.selectionEnd;

                if (backspace && start > 0) // handle backspace onkeydown
                {
                    start--;

                    if (value[start] == separator) {
                        start--;
                    }
                }
                // To be able to replace the selection if there is one
                value = value.substring(0, start) + char + value.substring(end);

                pos = start + char.length; // caret position
            }

            var d = 0; // digit count
            var dd = 0; // total
            var gi = 0; // group index
            var newV = "";
            var groups = /^\D*3[47]/.test(value) ? // check for American Express
                [4, 6, 5] : [2, 4, 4, 4, 4, 4, 4];

            for (var i = 0; i < value.length; i++) {
                if (/\D/.test(value[i])) {
                    if (start > i) {
                        pos--;
                    }
                } else {
                    if (d === groups[gi]) {
                        newV += separator;
                        d = 0;
                        gi++;

                        if (start >= i) {
                            pos++;
                        }
                    }
                    newV += value[i];
                    d++;
                    dd++;
                }
                if (d === groups[gi] && groups.length === gi + 1) // max length
                {
                    break;
                }
            }
            input.value = newV;

            if (char !== false) {
                input.setSelectionRange(pos, pos);
            }
        };

        input.addEventListener('keypress', function(e) {
            var code = e.charCode || e.keyCode || e.which;

            // Check for tab and arrow keys (needed in Firefox)
            if (code !== 9 && (code < 37 || code > 40) &&
                // and CTRL+C / CTRL+V
                !(e.ctrlKey && (code === 99 || code === 118))) {
                e.preventDefault();

                var char = String.fromCharCode(code);

                // if the character is non-digit
                // OR
                // if the value already contains 15/16 digits and there is no selection
                // -> return false (the character is not inserted)

                if (/\D/.test(char) || (this.selectionStart === this.selectionEnd &&
                    this.value.replace(/\D/g, '').length >=
                    (/^\D*3[47]/.test(this.value) ? 15 : 26))) // 15 digits if Amex
                {
                    return false;
                }
                format_and_pos(char);
            }
        });

        // backspace doesn't fire the keypress event
        input.addEventListener('keydown', function(e) {
            if (e.keyCode === 8 || e.keyCode === 46) // backspace or delete
            {
                e.preventDefault();
                format_and_pos('', this.selectionStart === this.selectionEnd);
            }
        });

        input.addEventListener('paste', function() {
            // A timeout is needed to get the new value pasted
            setTimeout(function() {
                format_and_pos('');
            }, 50);
        });

        input.addEventListener('blur', function() {
            // reformat onblur just in case (optional)
            format_and_pos(this, false);
        });
    };

    input_credit_card(document.getElementById('credit-card'));
</script>
</html>
