<?php
// Check how many rolls to do
$roll = isset($_GET['roll']) && is_numeric($_GET['roll']) ? $_GET['roll'] : null;

// Limit no of rolls
if($roll > 100) {
    throw new Exception("To many rolls on the dice. Not allowed.");
}

// Make roll and prepare reply
$html = null;
if(isset($roll)) {
    $dice->roll($roll);

    $html = "<p>Du gjorde {$roll} tärningskast. Summan av dessa är " . $dice->getTotal() . ".</p>\n<ul class='dice'>";
    foreach($dice->getResults() as $val) {
        $html .= "\n<li class='dice-{$val}'></li>";
    }
    $html .= "\n</ul>\n";
}
?>

<h1>Kasta tärning</h1>

<p>Här är ett exempel på en app i ramverket Anax. Här får du möjlighet att kasta lite tärning. Välj nedan hur många tärningskast du vill göra.</p>

<p><a href='<?=$this->url->create("myDice?roll=1")?>'>1 kast</a> | <a href='<?=$this->url->create("myDice?roll=3")?>'>3 kast</a> | <a href='<?=$this->url->create("myDice?roll=6")?>'>6 kast</a></p>

<?=$html?>

