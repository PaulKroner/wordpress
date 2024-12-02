<?php
function postalAdress()
{
?>
  <div class="grid grid-cols-6 items-center gap-4">
    <label for="postadresse" class="col-span-2">Postadresse</label>

    <?php if (get_current_user_id() && current_user_can('administrator')) : // Check if user is authenticated and has admin role 
    ?>
      <!-- Street Input -->
      <input type="text" id="street" name="postal_data[street]" value="<?php echo esc_attr(isset($postal_data['street']) ? $postal_data['street'] : ''); ?>" class="col-span-2" placeholder="Straße" />

      <!-- House Number Input -->
      <input type="text" id="housenumber" name="postal_data[housenumber]" value="<?php echo esc_attr(isset($postal_data['housenumber']) ? $postal_data['housenumber'] : ''); ?>" class="col-span-1" placeholder="Nr." />

      <!-- Empty div for spacing -->
      <div class="col-span-2"></div>
    <?php endif; ?>

    <!-- ZIP Code Input -->
    <input type="text" id="zip" name="postal_data[zip]" value="<?php echo esc_attr(isset($postal_data['zip']) ? $postal_data['zip'] : ''); ?>" class="col-span-1" placeholder="PLZ" />

    <!-- City Input -->
    <input type="text" id="city" name="postal_data[city]" value="<?php echo esc_attr(isset($postal_data['city']) ? $postal_data['city'] : ''); ?>" class="col-span-2" placeholder="Ort" />

    <?php if (get_current_user_id() && current_user_can('administrator')) : // Check if user is authenticated and has admin role 
    ?>
      <!-- Empty div for spacing -->
      <div class="col-span-2"></div>

      <!-- Additional Input -->
      <input type="text" id="additional" name="postal_data[additional]" value="<?php echo esc_attr(isset($postal_data['additional']) ? $postal_data['additional'] : ''); ?>" class="col-span-2" placeholder="Zusatz" />
    <?php endif; ?>
  </div>
<?php
}
?>