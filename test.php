<?php
echo '<form style="display:inline;">';
echo 'GO:<select>';

for ($i = 1; $i <= 5; $i ++)
    echo "<option value ='$i'>$i</option>";

echo '</select>';
echo '</form>';