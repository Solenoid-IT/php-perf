<?php



namespace Solenoid\Perf;



class Analysis
{
    public float $time;
    public int   $memory;
    public float $processor;



    # Returns [self]
    public function __construct ()
    {
        // (Getting the values)
        $this->time      = round( microtime( true ) * 1000 );
        $this->memory    = memory_get_usage();
        $this->processor = round( sys_getloadavg()[0], 2 );
    }

    // Returns [Analysis]
    public static function make ()
    {
        // Returning the value
        return new Analysis();
    }



    # Returns [assoc]
    public function to_array ()
    {
        // Returning the value
        return get_object_vars( $this );
    }

    # Returns [assoc]
    public function to_human ()
    {
        // Returning the value
        return
        [
            'time'      => $this->time . ' ms',
            'memory'    => $this->memory . ' B',
            'processor' => $this->processor . ' %'
        ]
        ;
    }
}



?>