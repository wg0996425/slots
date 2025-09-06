<?php 
    $possible_symbols = ['A', 'B', 'C'];
    $dollars = 0;
    $spins = 0;

    while($dollars < 500 && $spins < 20) {
        $symbols = [];
        for($i = 0; $i < 3; $i++) {
            $random_symbol = array_rand($possible_symbols);
            $selected_symbol = $possible_symbols[$random_symbol];
            $symbols[] = $selected_symbol;
        }
        $game_output = implode($symbols);

        $payoff = match($game_output) {
            'AAA', 'BBB', 'CCC' => 100,
            'AAB', 'ABA', 'BAA' => 50,
            'ABB', 'BBA', 'BAB' => 50,
            'BCC', 'CBC', 'CCB' => 50,
            'ACC', 'CAC', 'CCA' => 50,
            default => 0,
        };

        $output_text = ($game_output." (Payoff ".$payoff.")");
        $output_array[] = $output_text;

        $dollars += $payoff;
        $spins++;
    }

    foreach ($output_array as $output) {
        echo $output . "\n";
    }

    echo "WINNINGS: $".$dollars."!";
?>