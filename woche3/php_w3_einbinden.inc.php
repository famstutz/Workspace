<?php
    function median($values)
    {
        $arguments = func_get_args();
        $num_arguments = func_num_args();
        $sum = 0;
        
        foreach($arguments as $argument)
        {
            $sum += $argument;
        }
        
        return $sum / $num_arguments;
    }
    
    function maximum($values)
    {
        $arguments = func_get_args();
        $max = 0;
        
        foreach($arguments as $argument)
        {
            if ($argument > $max)
            {
                $max = $argument;
            }
        }
        
        return $max;
    }
?>
