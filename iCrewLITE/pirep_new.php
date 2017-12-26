 <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    
                    <?php
                        if(isset($message))
                            echo '<div class="callout callout-danger">
                            <h4>Error</h4>
                            <p>'.$message.'</p></div>';
                    ?>
                    
                    <form action="<?php echo url('/pireps/mine');?>" method="post">
                      
                        <div class="form-group">
                            <label>Pilot</label>
                            <input type="text" class="form-control" disabled placeholder="<?php echo Auth::$userinfo->firstname . ' ' . Auth::$userinfo->lastname;?>">
                        </div>
                        <div class="form-group">
                            <label>Airline</label>
                            <select name="code" id="code" class="form-control">
                                <option value="">Select airline</option>
                                <?php
                                    foreach($allairlines as $airline)
                                    {
                                        $sel = ($_POST['code'] == $airline->code || $bid->code == $airline->code)?'selected':'';

                                        echo '<option value="'.$airline->code.'" '.$sel.'>'.$airline->code.' - '.$airline->name.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Flight Number</label>
                            <input type="text" name="flightnum" class="form-control" value="<?php if(isset($bid->flightnum)) { echo $bid->flightnum; }?><?php if(isset($_POST['flightnum'])) { echo $_POST['flightnum'];} ?>">
                        </div>
                        <div class="form-group">
                            <label>Departure Airport</label>
                            <select id="depicao" name="depicao" class="form-control">
                                <option value="">Select departure airport</option>
                                <?php
                                    foreach($allairports as $airport)
                                    {
                                        $sel = ($_POST['depicao'] == $airport->icao || $bid->depicao == $airport->icao)?'selected':'';

                                        echo '<option value="'.$airport->icao.'" '.$sel.'>'.$airport->icao . ' - '.$airport->name .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Arrival Airport</label>
                            <select name="arricao" id="arricao" class="form-control">
                                <option value="">Select arrival airport</option>
                                <?php
                                    foreach($allairports as $airport)
                                    {
                                        $sel = ($_POST['arricao'] == $airport->icao || $bid->arricao == $airport->icao)?'selected':'';

                                        echo '<option value="'.$airport->icao.'" '.$sel.'>'.$airport->icao . ' - '.$airport->name .'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Aircraft</label>
                            <select name="aircraft" id="aircraft" class="form-control">
                                <option value="">Select aircraft</option>
                                <?php
                                    foreach($allaircraft as $aircraft)
                                    {

                                        /*	Skip any aircraft which have aircraft that the pilot
                                            is not rated to fly (according to RANK) 
                                        */
                                        if(Config::Get('RESTRICT_AIRCRAFT_RANKS') === true)
                                        {
                                            /*	This means the aircraft rank level is higher than
                                                what the pilot's ranklevel, so just do "continue"
                                                and move onto the next route in the list 
                                             */
                                            if($aircraft->ranklevel > Auth::$userinfo->ranklevel)
                                            {
                                                continue;
                                            }
                                        }

                                        $sel = ($_POST['aircraft'] == $aircraft->name || $bid->registration == $aircraft->registration)?'selected':'';

                                        echo '<option value="'.$aircraft->id.'" '.$sel.'>'.$aircraft->name.' - '.$aircraft->registration.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <?php
                        // List all of the custom PIREP fields
                        if(!$pirepfields) $pirepfields = array();
                        foreach($pirepfields as $field)
                        {
                        ?>
                        <div class="form-group"></div>
                        <label><?php echo $field->title ?></label>
                        <?php

                        // Determine field by the type

                        if($field->type == '' || $field->type == 'text')
                        {
                        ?>
                            <input type="text" name="<?php echo $field->name ?>" value="<?php echo $_POST[$field->name] ?>" class="form-control" />
                        <?php
                        } 
                        elseif($field->type == 'textarea')
                        {
                            echo '<textarea name="'.$field->name.'" class="form-control">'.$field->values.'</textarea>';
                        }
                        elseif($field->type == 'dropdown')
                        {
                            $values = explode(',', $field->options);

                            echo '<select name="'.$field->name.'" class="form-control">';
                            foreach($values as $value)
                            {
                                $value = trim($value);
                                echo '<option value="'.$value.'">'.$value.'</option>';
                            }
                            echo '</select>';		
                        }
                        ?>
                        </div>
                        <?php } ?>
                        
                        <div class="form-group">
                            <label>Fuel Used</label>
                            <input type="text" name="fuelused" class="form-control" placeholder="Enter fuel used in <?php echo Config::Get('LIQUID_UNIT_NAMES', Config::Get('LiquidUnit'))?>" value="<?php echo $_POST['fuelused']; ?>" />
                            <p>This is the fuel used on this flight in <?php echo Config::Get('LIQUID_UNIT_NAMES', Config::Get('LiquidUnit'))?></p>
                        </div>
                        <div class="form-group">
                            <label>Flight Time</label>
                            <input type="text" name="flighttime" class="form-control" placeholder="Enter in format HH.MM (example 3.45 = 3 hours and 45 minutes)" value="<?php echo $_POST['flighttime'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>Route</label>
                            <textarea name="route" class="form-control" style="width: 100%" placeholder="Enter the route flown, or default will be from the schedule"><?php echo (!isset($_POST['route'])) ? $bid->route : $_POST['route']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Comments</label>
                            <textarea name="comment" class="form-control" style="width: 100%"><?php echo $_POST['comment'] ?></textarea>
                        </div>
                        <input type="hidden" name="bid" value="<?php echo $bidid ?>" />
                        <input type="submit" name="submit_pirep" value="Submit" class="btn btn-primary btn-flat pull-right" /><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
