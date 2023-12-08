<?php



namespace Solenoid\Perf;



class Analyzer
{
    private Analysis $start;
    private Analysis $end;



    # Returns [self]
    public function __construct ()
    {
         
    }

    # Returns [Analyzer]
    public static function create ()
    {
        // Returning the value
        return new Analyzer();
    }



    # Returns [void]
    public function open ()
    {
        // (Making an Analysis)
        $this->start = Analysis::make();
    }

    # Returns [void]
    public function close ()
    {
        // (Creating a Analysis)
        $this->end = Analysis::make();
    }



    # Returns [assoc]
    public function get_report ()
    {
        // (Getting the values)
        $start = $this->start->to_array();
        $end   = $this->end->to_array();



        // Returning the value
        return
        [
            'time' =>
            [
                'value' =>
                [
                    'start' => $start['time'],
                    'end'   => $end['time'],

                    'delta' => $end['time'] - $start['time']
                ],
                'unit'  => 'ms'
            ],
            'memory' =>
            [
                'value' =>
                [
                    'start' => $start['memory'],
                    'end'   => $end['memory'],

                    'delta' => $end['memory'] - $start['memory']
                ],
                'unit'  => 'B'
            ],
            'processor' =>
            [
                'value' =>
                [
                    'start' => $start['processor'],
                    'end'   => $end['processor'],

                    'delta' => $end['processor'] - $start['processor']
                ],
                'unit'  => '%'
            ]
        ]
        ;
    }



    # Returns [string]
    public function summarize ()
    {
        // (Setting the value)
        $summary = [];



        // (Getting the value)
        $report = $this->get_report();

        foreach ($report as $k => $v)
        {// Processing each entry
            // (Appending the value)
            $summary[] = $k[0] . ' = ' . $v['value']['delta'] . ' ' . $v['unit'];
        }



        // (Getting the value)
        $summary = implode( ' | ', $summary );



        // Returning the value
        return $summary;
    }

    # Returns [string]
    public function __toString ()
    {
        // Returning the value
        return $this->summarize();
    }
}



?>