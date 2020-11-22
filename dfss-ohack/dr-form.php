<?php // Silence is golden
//$logo = plugin_dir_url( __FILE__ ) . 'assets/dfs-san-jose.jpg'

if(isset($_POST['udr_donor_name'])) {
    global $unique_id;
?>
    <div style="text-align: center">
        <h3>Donation Tag: <?php echo $unique_id; ?></h3>
        <h4>Thank you! Your record is submitted. Please drop the donations at Dress for Success with this tag. We'll notify you once your receipt is available to download.</h4>
        <hr />
        <button onClick="window.location.reload(); class="btn btn-primary btn-lg">Donate again</button>
    </style>
<?php
} else {
?>

<form method="post">
    <div class="form-group">
        <label for="inputDName">Donor Name</label>
        <input name="udr_donor_name" type="text" class="form-control" required id="inputDName" placeholder="Name">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input name="udr_donor_email" type="email" class="form-control" required id="inputEmail" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone</label>
      <input name="udr_donor_phone" type="tel" class="form-control" required id="inputPhone" placeholder="Phone">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input name="udr_donor_address_street" type="text" class="form-control" required id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">City</label>
      <input name="udr_donor_address_city" type="text" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">State</label>
      <select name="udr_donor_address_state" class="form-control" required id="inputState" style=" height: 2.6em; font-size: 1em; ">
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
        <option value="AZ">Arizona</option>
        <option value="AR">Arkansas</option>
        <option value="CA" selected>California</option>
        <option value="CO">Colorado</option>
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="DC">District Of Columbia</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="HI">Hawaii</option>
        <option value="ID">Idaho</option>
        <option value="IL">Illinois</option>
        <option value="IN">Indiana</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="MN">Minnesota</option>
        <option value="MS">Mississippi</option>
        <option value="MO">Missouri</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NV">Nevada</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NM">New Mexico</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="ND">North Dakota</option>
        <option value="OH">Ohio</option>
        <option value="OK">Oklahoma</option>
        <option value="OR">Oregon</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="SD">South Dakota</option>
        <option value="TN">Tennessee</option>
        <option value="TX">Texas</option>
        <option value="UT">Utah</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WA">Washington</option>
        <option value="WV">West Virginia</option>
        <option value="WI">Wisconsin</option>
        <option value="WY">Wyoming</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input name="udr_donor_address_zip" type="text" class="form-control" id="inputZip">
    </div>
  </div>
  <div class="form-row">
    <b>With your donations of:</b>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Suits</label>
      <input name="udr_donor_donation_suits" type="text" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Separates (blouse, pants, blazers, etc.)</label>
      <input name="udr_donor_donation_separates" type="text" class="form-control" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Shoes</label>
      <input name="udr_donor_donation_shoes" type="text" class="form-control" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputCity">Other</label>
      <input name="udr_donor_donation_other" type="text" class="form-control" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group">
        <label for="inputWorth">Estimated Worth:</label>
        <input name="udr_donor_donation_worth" type="text" class="form-control" required id="inputWorth" placeholder="$$">
    </div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
<hr/>
<div class="form-row">
    <p>Donations that are deemed inappropriate, or those that are considered excess inventory, may be re-donated to
    other non- profit organizations. Donations maybe consigned to fundriase for program support.</p>
</div>
  
  
</form>
<?php
}
?>