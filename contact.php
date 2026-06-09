<?php
/**obrada forme je li stisnuto Pošalji poruku */
if(isset($_POST['send'])) {
/**poruka o uspješnom slanju */
    echo '<div class="contact-success">
            <b>Hvala na upitu!</b><br>
            Zaprimili smo Vašu poruku i odgovorit ćemo u najkraćem mogućem roku.
          </div>';
}
?>

<h1>Kontakt</h1>

<div class="contact-box">

    <iframe
        src="https://www.google.com/maps?q=Vrbik,Zagreb&output=embed"
        allowfullscreen>
    </iframe>

    <form method="post">

         <label>Ime <span class="required">*</span></label>
    <input type="text"
           name="firstname"
           required>

    <label>Prezime <span class="required">*</span></label>
    <input type="text"
           name="lastname"
           required>

    <label>E-mail <span class="required">*</span></label>
    <input type="email"
           name="email"
           required>

    <label>Država <span class="required">*</span></label>

    <select name="country" required>

           <option value="">-- Odaberite državu --</option>

        <option value="HR">Hrvatska</option>
        <option value="SI">Slovenija</option>
        <option value="AT">Austrija</option>
        <option value="DE">Njemačka</option>
        <option value="IT">Italija</option>
        <option value="FR">Francuska</option>
        <option value="ES">Španjolska</option>
        <option value="PT">Portugal</option>
        <option value="BE">Belgija</option>
        <option value="NL">Nizozemska</option>
        <option value="LU">Luksemburg</option>
        <option value="CZ">Češka</option>
        <option value="SK">Slovačka</option>
        <option value="PL">Poljska</option>
        <option value="HU">Mađarska</option>
        <option value="RO">Rumunjska</option>
        <option value="BG">Bugarska</option>
        <option value="GR">Grčka</option>
        <option value="SE">Švedska</option>
        <option value="NO">Norveška</option>
        <option value="FI">Finska</option>
        <option value="DK">Danska</option>
        <option value="IE">Irska</option>
        <option value="GB">Ujedinjeno Kraljevstvo</option>
        <option value="CH">Švicarska</option>

    </select>

        <label>Poruka <span class="required">*</span></label>

        <textarea name="subject"
                  rows="8"
                  required></textarea>

        <input type="submit"
               name="send"
               value="Pošalji poruku">

    </form>

</div>